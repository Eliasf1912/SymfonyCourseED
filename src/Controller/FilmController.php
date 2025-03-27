<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FilmController extends AbstractController
{
    #[Route('/Category', name: 'app_category')]
    public function Category(): Response
    {
        return $this->render('Film/category.html.twig');
    }

    #[Route('/Detail_serie', name: 'app_detail_serie')]
    public function Detail_serie(): Response
    {
        return $this->render('Film/detail_serie.html.twig');
    }

    #[Route('/Detail', name: 'app_detail')]
    public function Detail(): Response
    {
        return $this->render('Film/detail.html.twig');
    }

    #[Route('/Discover', name: 'app_discover')]
    public function Discover(): Response
    {
        return $this->render('Film/discover.html.twig');
    }

    #[Route('/List', name: 'app_list')]
    public function List(): Response
    {
        return $this->render('Film/List.html.twig');
    }

    #[Route('/Subscriptions', name: 'app_subscriptions')]
    public function Subscription(): Response
    {
        return $this->render('Film/subscription.html.twig');
    }

    #[Route('/Upload', name: 'app_upload')]
    public function Upload(): Response
    {
        return $this->render('Film/upload.html.twig');
    }
}
