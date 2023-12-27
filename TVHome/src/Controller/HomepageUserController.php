<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageUserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('homepage_user/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
}
