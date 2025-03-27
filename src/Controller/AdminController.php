<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin_films', name: 'app_admin_films')]
    public function Film(): Response
    {
        return $this->render('admin/admin_films.html.twig');
    }

    #[Route('/admin_users', name: 'app_admin_users')]
    public function Users(): Response
    {
        return $this->render('admin/admin_users.html.twig');
    }

    #[Route('/admin_add_film', name: 'app_admin_add_film')]
    public function AddFilm(): Response
    {
        return $this->render('admin/admin_add_films_users.html.twig');
    }
}
