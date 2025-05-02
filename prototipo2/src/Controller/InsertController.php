<?php
namespace App\Controller;

use App\Entity\Ejercicio;
use App\Entity\GrupoMuscular;
use App\Entity\Maquina;
use App\Entity\User;
use App\Entity\Usuario;
use App\Repository\GrupoMuscularRepository;
use App\Repository\MaquinaRepository;
use App\Services\EjercicioService;
use App\Services\GrupoMuscularService;
use App\Services\MaquinaService;
use App\Services\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InsertController extends AbstractController
{
    #[Route('/insertUsuarios')]
    public function insertUsuarios(EntityManagerInterface $entityManager, UserService $userService)
    {
        $array = $userService->getArray();
        foreach ($array as $user) {
            $usuario = new User();
            $usuario->setEmail($user["email"]);
            $usuario->setPassword($user["password"]);
            $usuario->setRoles($user["roles"]);
            $entityManager->persist($usuario);
            $entityManager->flush();
        }
        return new Response("Data insert");
    }

    #[Route('/insertEjercicios')]
    public function insertEjercicios(EntityManagerInterface $entityManager, MaquinaRepository $maquinaRepository, GrupoMuscularRepository $grupoMuscularRepository, EjercicioService $ejercicioService)
    {
        $array = $ejercicioService->getArray();
        foreach ($array as $ejercicio) {
            $ej = new Ejercicio();
            $ej->setNombreEjercicio($ejercicio["nombreEjercicio"]);
            $ej->setDescripcion($ejercicio["descripcion"]);
            $ej->setMaquina($maquinaRepository->getMaquinaById($ejercicio["maquina"]));
            $ej->setGrupoMuscular($grupoMuscularRepository->getGrupoById($ejercicio["grupoMuscular"]));
            $entityManager->persist($ej);
            $entityManager->flush();
        }
        return new Response("Data insert");
    }

    #[Route('/insertGrupoMuscular')]
    public function insertGrupoMuscular(EntityManagerInterface $entityManager, GrupoMuscularService $grupoMuscularService)
    {
        $array = $grupoMuscularService->getArray();
        foreach ($array as $grupos) {
            $grupoMuscular = new GrupoMuscular();
            $grupoMuscular->setNombre($grupos["nombre"]);
            $grupoMuscular->setDescripcion($grupos["descripcion"]);
            $grupoMuscular->setImagen($grupos["imagen"]);
            $entityManager->persist($grupoMuscular);
            $entityManager->flush();
        }
        return new Response("Data insert");
    }

    #[Route('/insertMaquinas')]
    public function insertMaquinas(EntityManagerInterface $entityManager, MaquinaService $maquinaService)
    {
        $array = $maquinaService->getArray();
        foreach ($array as $maquinas) {
            $maquina = new Maquina();
            $maquina->setNombre($maquinas["nombre"]);
            $maquina->setMarca($maquinas["marca"]);
            $maquina->setImagen($maquinas["imagen"]);
            $entityManager->persist($maquina);
            $entityManager->flush();
        }
        return new Response("Data insert");
    }
}