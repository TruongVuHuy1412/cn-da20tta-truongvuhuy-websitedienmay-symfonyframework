<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddToCartType;
use App\Manager\CartManager;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    #[Route('{_locale<%app.supported_locales%>}')]
    #[Route('/', name: 'homepage')]
    public function index(ProductRepository $productRepository, Request $request): Response
    {
        return $this->render('homepage/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
    
}
