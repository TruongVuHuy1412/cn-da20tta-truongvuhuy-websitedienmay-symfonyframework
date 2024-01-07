<?php

namespace App\Factory;

use App\Entity\OrderCart;
use App\Entity\OrderItem;
use App\Entity\Product;

/**
 * Class OrderFactory
 * @package App\Factory
 */
class OrderFactory
{
    /**
     * Creates an order.
     *
     * @return OrderCart
     */
    public function create(): OrderCart
    {
        $order = new OrderCart();
        $order
            //->setStatus(OrderCart::STATUS_CART)
            ->setCreateAt(new \DateTimeImmutable())
            ->setUpdateAt(new \DateTimeImmutable());

        return $order;
    }

    /**
     * Creates an item for a product.
     *
     * @param Product $product
     *
     * @return OrderItem
     */
    public function createItem(Product $product): OrderItem
    {
        $item = new OrderItem();
        $item->setProduct($product);
        $item->setQuantity(1);

        return $item;
    }
}