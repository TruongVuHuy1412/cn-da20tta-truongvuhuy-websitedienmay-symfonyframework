<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use App\Manager\CartManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class OrderController extends AbstractController
{
    #[Route('/order', name: 'order')]
    public function index(CartManager $cartManager, Request $request, EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $cart = $cartManager->getCurrentCart();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order->setFullName($form->get('fullname')->getData());
            $order->setPhoneNumber($form->get('phonenumber')->getData());
            $order->setAddress($form->get('address')->getData());
            $order->setMessage($form->get('message')->getData());
            $order->setCreateAt(new \DateTimeImmutable());

            $cart->setCreateAt(new \DateTimeImmutable());

            $cartManager->save($cart);
            $entityManager->persist($order);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('order/index.html.twig', [
            'order' => $form->createView(),
        ]);
    }
}
