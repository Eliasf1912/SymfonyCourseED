<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthController extends AbstractController
{
    #[Route('/Login', name: 'app_login')]
    public function Login(): Response
    {
        return $this->render('auth/login.html.twig');
    }

    #[Route('/Register', name: 'app_register')]
    public function Register(): Response
    {
        return $this->render('auth/register.html.twig');
    }

    #[Route('/Reset', name: 'app_reset')]
    public function Reset(): Response
    {
        return $this->render('auth/reset.html.twig');
    }

    #[Route('/Comfirm', name: 'app_confirm')]
    public function Confirm(): Response
    {
        return $this->render('auth/confirm.html.twig');
    }

    #[Route('/Forgot', name: 'app_forgot')]
    public function Forgot(): Response
    {
        return $this->render('auth/forgot.html.twig');
    }
}
