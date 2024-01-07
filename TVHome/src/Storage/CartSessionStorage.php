<?php

namespace App\Storage;

use App\Entity\OrderCart;
use App\Repository\OrderCartRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartSessionStorage
{
    /**
     * The request stack.
     *
     * @var RequestStack
     */
    private $requestStack;

    /**
     * The cart repository.
     *
     * @var OrderCartRepository
     */
    private $cartRepository;

    /**
     * @var string
     */
    const CART_KEY_NAME = 'cart_id';

    /**
     * CartSessionStorage constructor.
     *
     * @param RequestStack $requestStack
     * @param OrderCartRepository $cartRepository
     */
    public function __construct(RequestStack $requestStack, OrderCartRepository $cartRepository)
    {
        $this->requestStack = $requestStack;
        $this->cartRepository = $cartRepository;
    }

    /**
     * Gets the cart in session.
     *
     * @return OrderCart|null
     */
    public function getCart(): ?OrderCart
    {
        return $this->cartRepository->findOneBy([
            'id' => $this->getCartId(),
            //'status' => OrderCart::STATUS_CART
        ]);
    }

    /**
     * Sets the cart in session.
     *
     * @param OrderCart $cart
     */
    public function setCart(OrderCart $cart): void
    {
        $this->getSession()->set(self::CART_KEY_NAME, $cart->getId());
    }

    /**
     * Returns the cart id.
     *
     * @return int|null
     */
    private function getCartId(): ?int
    {
        return $this->getSession()->get(self::CART_KEY_NAME);
    }

    private function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }

    public function clear(): void
    {
        $this->getSession()->remove(self::CART_KEY_NAME);
    }
}