<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();
        return $this->render('login/login.html.twig', [
            'error' => $error,
            'lastUser' => $lastUserName,
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout()
    {
        #throw new \Exception('logout() should never be reached');
        return $this->redirectToRoute("login");
    }
}
