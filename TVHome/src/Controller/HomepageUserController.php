<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageUserController extends AbstractController
{
    #[Route('/user', name: 'app_homepage_user')]
    public function index(): Response
    {
        return $this->render('homepage_user/index.html.twig', [
            'controller_name' => 'HomepageUserController',
        ]);
    }
}
