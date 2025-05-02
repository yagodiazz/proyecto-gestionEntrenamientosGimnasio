<?php

namespace App\Controller;

use App\Entity\DetalleRutina;
use App\Entity\Ejercicio;
use App\Entity\GrupoMuscular;
use App\Entity\Maquina;
use App\Entity\Rutina;
use App\Entity\User;
use App\Repository\DetalleRutinaRepository;
use App\Repository\EjercicioRepository;
use App\Repository\GrupoMuscularRepository;
use App\Repository\MaquinaRepository;
use App\Repository\RutinaRepository;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GymAppController extends AbstractController
{
    #[Route('/app_gym/{userName}', name: 'app_gym')]
    public function index($userName, GrupoMuscularRepository $grupoMuscularRepository, UserRepository $userRepository): Response
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }
        $grupos = $grupoMuscularRepository->findAll();
        return $this->render('gym_app/index.html.twig', [
            'grupos' => $grupos,
            'userName' => $userName,
            'isAdmin' => $isAdmin,
        ]);
    }

    #[Route('/seleccionarEjercicio/{nombre}/{userName}', name: 'seleccionarEjercicio')]
    public function seleccionarEjercicio($nombre, $userName, EjercicioRepository $ejercicioRepository, GrupoMuscularRepository $grupoMuscularRepository, UserRepository $userRepository): Response
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }
        $musculo = $grupoMuscularRepository->getGrupoByName($nombre);
        $ejercicios = $ejercicioRepository->getEjercicioByGrupoMuscular($musculo);
        return $this->render('gym_app/ejercicios.html.twig', [
            'ejercicios' => $ejercicios,
            'userName' => $userName,
            'isAdmin' => $isAdmin,
        ]);
    }

    #[Route('/addEjercicioRutina/{nombre}/{userName}', name: 'addEjercicioRutina')]
    public function addEjercicioRutina($nombre, $userName, EjercicioRepository $ejercicioRepository, Request $request, UserRepository $userRepository, DetalleRutinaRepository $detalleRutinaRepository): Response
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }
        $ejercicio = $ejercicioRepository->getEjercicioByName($nombre);

        //Sacar última información sobre ejrcicio

        $ejercicios = $detalleRutinaRepository->findExercises($ejercicio);
        $ultimoPeso = 0;
        $ultimasSeries = 0;
        $ultimasRepes = 0;
        foreach ($ejercicios as $ej) {
            if ($ej->getRutina()->getUsuario()->getId() == $user->getId()) {
                $ultimoPeso = $ej->getPeso();
                $ultimasSeries = $ej->getSeries();
                $ultimasRepes = $ej->getRepeticionesPorSerie();
            }
        }



        //Crear formulario

        $form = $this->createFormBuilder()
            ->add('peso', IntegerType::class)
            ->add('series', IntegerType::class)
            ->add('repSerie', IntegerType::class)
            ->add('findBtn', SubmitType::class, [
                'label' => 'Confirmar',
                'attr' => [
                    'class' => 'btn',
                    'style' => 'background-color: white;font-weight:bold;'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            return $this->redirectToRoute("rutinaActual", ['peso' => $data["peso"], "series" => $data["series"], "repeticionesPorSerie" => $data["repSerie"], "nombreEjercicio" => $ejercicio->getNombreEjercicio(), "userName" => $userName]);
        }

        return $this->render('gym_app/addEjercicioRutina.html.twig', [
            "ejercicio" => $ejercicio,
            "form" => $form,
            'userName' => $userName,
            'isAdmin' => $isAdmin,
            'ultimoPeso' => $ultimoPeso,
            'ultimasSeries' => $ultimasSeries,
            'ultimasRepes' => $ultimasRepes,
        ]);
    }

    #[Route('/rutinaActual/{peso}/{series}/{repeticionesPorSerie}/{nombreEjercicio}/{userName}', name: 'rutinaActual')]
    public function rutinaActual($peso, $series, $repeticionesPorSerie, $nombreEjercicio, $userName, EjercicioRepository $ejercicioRepository, DetalleRutinaRepository $detalleRutinaRepository, RutinaRepository $rutinaRepository, EntityManagerInterface $entityManager, UserRepository $userRepository, Request $request, SessionInterface $session, ): Response
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }
        $session->start();
        $fechaActual = new DateTimeImmutable();
        $user = $userRepository->getUserByEmail($userName);
        $miSession2 = $session->get('formValue');
        if ($miSession2 == null) {
            $session->set('formValue', 'false');
            $rutina = new Rutina();
            $rutina->setUsuario($user);
            $rutina->setFechaCreacion($fechaActual);
            $entityManager->persist($rutina);
            $entityManager->flush();
            $session->set('formValue', 'true');
        } elseif ($miSession2 === 'false') {
            $rutina = new Rutina();
            $rutina->setUsuario($user);
            $rutina->setFechaCreacion($fechaActual);
            $entityManager->persist($rutina);
            $entityManager->flush();
            $session->set('formValue', 'true');
        }

        $ejerciciosRutina = $session->get('RutinaActual');
        if ($ejerciciosRutina === "") {
            $ejerciciosRutina = [];
        }
        ;
        $detalleRutina = new DetalleRutina();
        $rutina = $rutinaRepository->findOneByDate($fechaActual);
        $ejercicio = $ejercicioRepository->getEjercicioByName($nombreEjercicio);
        $detalleRutina->setRutina($rutina);
        $detalleRutina->setEjercicio($ejercicio);
        $detalleRutina->setPeso($peso);
        $detalleRutina->setSeries($series);
        $detalleRutina->setRepeticionesPorSerie($repeticionesPorSerie);
        $entityManager->persist($detalleRutina);
        $entityManager->flush();
        $ejerciciosRutina[] = $detalleRutina;
        $session->set('RutinaActual', $ejerciciosRutina);

        return $this->render('gym_app/rutinaActual.html.twig', [
            "ejercicios" => $ejerciciosRutina,
            "fecha" => $fechaActual,
            "userName" => $userName,
            'isAdmin' => $isAdmin,
        ]);
    }

    #[Route("/mostrarRutinaActual/{userName}", name: "mostrarRutinaActual")]
    function mostrarRutinaActual($userName, SessionInterface $session, UserRepository $userRepository)
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }
        $session->start();
        $ejercicios = $session->get('RutinaActual', []);

        $fechaActual = new DateTimeImmutable();
        return $this->render('gym_app/rutinaActual.html.twig', [
            "ejercicios" => $ejercicios,
            "fecha" => $fechaActual,
            "userName" => $userName,
            'isAdmin' => $isAdmin
        ]);
    }

    #[Route("/administrarUsuarios/{userName}", name: "administrarUsuarios")]
    function administrarUsuarios($userName, UserRepository $userRepository, RutinaRepository $rutinaRepository, Request $request, UserPasswordHasherInterface $passwordEncoder, EntityManagerInterface $entityManager, DetalleRutinaRepository $detalleRutinaRepository)
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }

        $form1 = $this->createFormBuilder()
            ->add('email')
            ->add('deleteBtn', SubmitType::class, [
                'label' => 'Eliminar',
                'attr' => [
                    'class' => 'finalizarRutina',
                    'style' => 'background-color: white; padding: 5px; margin-top: 10px; font-weight: bold; border-radius: 7px; color: #000; border: none;'
                ]
            ])
            ->getForm();

        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid() && $form1->get('deleteBtn')->isClicked()) {
            $data = implode(",", $form1->getData());
            $existingUser = $userRepository->findOneBy(['email' => $data]);
            if ($existingUser != null) {
                //Borro el usuario introducido, las rutinas asociadas a ese usuario y los detalles rutinas también
                $usuario = $userRepository->getUserByEmail($data);
                $rutinas = $rutinaRepository->findByUser($usuario);
                foreach ($rutinas as $r) {
                    $detalles = $detalleRutinaRepository->findByRutina($r);
                    foreach ($detalles as $d) {
                        $detalleRutinaRepository->remove($d);
                    }
                    $rutinaRepository->remove($r);
                }
                $user = $userRepository->getUserByEmail($data);
                $userRepository->remove($user);
                $this->addFlash('correct', 'Borraste el usuario');
                return $this->redirectToRoute("administrarUsuarios", ["userName" => $userName]);
            }
            $this->addFlash('incorrect', 'El usuario que has introducido no existe');
            return $this->redirectToRoute("administrarUsuarios", ["userName" => $userName]);
        }

        $user = new User();
        $form2 = $this->createFormBuilder($user)
            ->add('email')
            ->add(
                'roles',
                ChoiceType::class,
                array(
                    'choices' => [
                        'Role user' => 'ROLE_USER',
                        'Role admin' => 'ROLE_ADMIN',
                    ],
                    'expanded' => true,
                    'multiple' => true,
                )
            )
            ->add('password', PasswordType::class)
            ->add('update', SubmitType::class, [
                'label' => 'Modificar',
                'attr' => [
                    'class' => 'finalizarRutina',
                    'style' => 'background-color: white; padding: 5px; margin-top: 10px; font-weight: bold; border-radius: 7px; color: #000; border: none;'
                ]
            ])
            ->getForm();

        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid() && $form2->get('update')->isClicked()) {
            $user = $form2->getData();

            // Verificar si el usuario ya existe en la base de datos
            $existingUser = $userRepository->findOneBy(['email' => $user->getEmail()]);
            if (!$existingUser) {
                $this->addFlash('incorrect', 'El usuario no existe.');
                return $this->redirectToRoute("administrarUsuarios", ["userName" => $userName]);
            }

            // Codificar la contraseña si se proporciona una nueva
            if ($user->getPassword()) {
                $encodedPassword = $passwordEncoder->hashPassword($user, $user->getPassword());
                $existingUser->setPassword($encodedPassword);
            }

            // Asignar los roles seleccionados en el formulario
            $existingUser->setRoles($user->getRoles());

            $entityManager->flush(); // Guardar los cambios en la base de datos

            $this->addFlash('correct', 'Usuario actualizado correctamente');
            return $this->redirectToRoute("administrarUsuarios", ["userName" => $userName]);
        }

        return $this->render('gym_app/administrarUsuarios.html.twig', [
            "form1" => $form1,
            "form2" => $form2,
            "userName" => $userName,
            'isAdmin' => $isAdmin
        ]);
    }

    #[Route("/administrarMaterial/{userName}", name: "administrarMaterial")]
    function administrarMaterial($userName, UserRepository $userRepository, Request $request, EntityManagerInterface $entityManager, EjercicioRepository $ejercicioRepository, MaquinaRepository $maquinaRepository, Filesystem $fileSystem, GrupoMuscularRepository $grupoMuscularRepository)
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }

        $ejercicio = new Ejercicio();
        $musculos = [];
        foreach ($grupoMuscularRepository->findAll() as $gM) {
            $musculos[$gM->getNombre()] = $gM;
        }
        $maquinas = [];
        foreach ($maquinaRepository->findAll() as $m) {
            $maquinas[$m->getNombre()] = $m;
        }
        $form1 = $this->createFormBuilder($ejercicio)
            ->add('nombreEjercicio')
            ->add('descripcion')
            ->add(
                'maquina',
                ChoiceType::class,
                array(
                    'choices' => $maquinas
                )
            )
            ->add(
                'grupoMuscular',
                ChoiceType::class,
                array(
                    'choices' => $musculos
                )
            )
            ->add('addEjercicio', SubmitType::class, [
                'label' => 'Añadir',
                "attr" => [
                    "class" => "btn",
                    'style' => 'background-color: white; padding: 5px; margin-top: 15px; font-weight: bold; border-radius: 7px; color: #000; border: none;width: calc(100% - 22px);'
                ]
            ], )
            ->getForm();

        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid() && $form1->get('addEjercicio')->isClicked()) {
            $data = $form1->getData();
            if ($data != null) {
                $ejercicioRepository->add($data);
                $this->addFlash('correct', 'Añadiste con éxito');
                return $this->redirectToRoute("administrarMaterial", ["userName" => $userName]);
            }
            $this->addFlash('incorrect', 'No se ha podido añadir');
            return $this->redirectToRoute("administrarMaterial", ["userName" => $userName]);
        }

        $maquina = new Maquina();
        $form2 = $this->createFormBuilder($maquina)->add("nombre")->add("marca")
            ->add('nombre')
            ->add('marca')
            ->add('imagen', FileType::class, [
                "required" => false,
                "data_class" => null,
                "constraints" => [
                    new File([
                        "maxSize" => "1024k",
                        "mimeTypes" => [
                            "image/jpeg",
                            "image/png",
                            "image/jpg"
                        ],
                        "mimeTypesMessage" => "Please upload a vlid image (jpg,png or jpeg)"
                    ])
                ],
            ])
            ->add('addMaquina', SubmitType::class, [
                'label' => 'Añadir',
                "attr" => [
                    "class" => "btn",
                    'style' => 'background-color: white; padding: 5px; margin-top: 15px; font-weight: bold; border-radius: 7px; color: #000; border: none;width: calc(100% - 22px);'
                ]
            ])
            ->getForm();

        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid() && $form2->get('addMaquina')->isClicked()) {
            $data = $form2->getData();
            if ($data != null) {
                $image = $form2->get("imagen")->getData();
                $imageName = $image ? $image->getClientOriginalName() : "default.jpg";
                $data->setImagen($imageName);
                $image ? ($fileSystem->rename($image->getPathName(), './img/' . $imageName)) : null;
                $maquinaRepository->add($data);
                $this->addFlash('correct', 'Máquina añadida con éxito');
                return $this->redirectToRoute("administrarMaterial", ["userName" => $userName]);
            }

            $this->addFlash('incorrect', 'La máquina no ha podido ser añadida');
            return $this->redirectToRoute("administrarMaterial", ["userName" => $userName]);
        }

        return $this->render('gym_app/administrarMaterial.html.twig', [
            "form1" => $form1,
            "form2" => $form2,
            "userName" => $userName,
            'isAdmin' => $isAdmin
        ]);
    }

    #[Route("/visualizarRutinas/{userName}", name: "visualizarRutinas")]
    public function visualizarRutinas($userName, UserRepository $userRepository, RutinaRepository $rutinaRepository, DetalleRutinaRepository $detalleRutinaRepository, EjercicioRepository $ejercicioRepository, GrupoMuscularRepository $grupoMuscularRepository, MaquinaRepository $maquinaRepository)
    {
        //Saber si el usuario es o no administrador
        $user = $userRepository->getUserByEmail($userName);
        $roles = $user->getRoles();
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }

        //Select filtrado maquinas
        $musculos = [];
        foreach ($grupoMuscularRepository->findAll() as $gM) {
            $musculos[$gM->getNombre()] = $gM;
        }
        $maquinas = [];
        foreach ($maquinaRepository->findAll() as $m) {
            $maquinas[$m->getNombre()] = $m;
        }

        $form1 = $this->createFormBuilder()
            ->add(
                'grupoMuscular',
                ChoiceType::class,
                array(
                    'choices' => $musculos
                )
            )->getForm();

        $form2 = $this->createFormBuilder()
            ->add(
                'maquina',
                ChoiceType::class,
                array(
                    'choices' => $maquinas
                )
            )->getForm();


        $rutinas = $rutinaRepository->findByUser($user);
        $detallesRutina = [];
        foreach ($rutinas as $r) {
            $detallesRutina[] = $detalleRutinaRepository->findByRutina($r);
        }
        return $this->render('gym_app/visualizarRutinas.html.twig', [
            "userName" => $userName,
            "rutinas" => $rutinas,
            'isAdmin' => $isAdmin,
            "detallesRutina" => $detallesRutina,
            "form1" => $form1,
            "form2" => $form2,
        ]);
    }

    public function actualizarDatosSesion(Request $request)
    {
        $requestData = json_decode($request->getContent(), true);

        $session = $request->getSession();
        dd($session);

        foreach ($requestData as $key => $value) {
            $session->set($key, $value);
        }

        return new JsonResponse(['success' => true]);
    }

}
