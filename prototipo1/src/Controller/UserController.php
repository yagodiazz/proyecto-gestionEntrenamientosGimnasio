<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route("/signup", name: "signup")]
    public function addNewUser(UserRepository $userRepository, Request $request, UserPasswordHasherInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('email')
            ->add('password', PasswordType::class)
            ->add(
                'roles',
                ChoiceType::class,
                array(
                    'choices' => [
                        '0' => ["Role user" => "ROLE_USER"],
                        '1' => ["Role admin" => "ROLE_ADMIN"],
                    ],
                    'expanded' => true,
                    'multiple' => true,
                )
            )
            ->add('submit', SubmitType::class, [
                'label' => 'Registrate',
                'attr' => [
                    'class' => 'buttonLogin col-12'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            // Codificar la contraseña
            $encodedPassword = $passwordEncoder->hashPassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);

            // Asignar el rol
            $userRoles = $user->getRoles();
            $user->setRoles($userRoles);
            //$user->setRoles(['ROLE_USER']);

            $userRepository->add($user);

            $this->addFlash('success', '¡Usuario registrado exitosamente!');
            return $this->redirectToRoute("login");
        }

        return $this->render('/login/signup.html.twig', [
            "form" => $form->createView(),
        ]);
    }
}