<?php

class ClientShop
{
    function addProductToBasket($product)
    {
        $product = $this->setProductDetails($product);
        if ($product->isAGift()) {
            $this->addNicePaper();
        }
        $this->saveProduct($product);
    }

    function setProductDetails($product)
    {
        if ($this->isChristmas())
        {
            $price = $this->getDiscount() * $product->getPrice();
            $product->setNewPrice($product, $price);
        }
    }
}

class Product implements GenericProduct
{
    public function getPrice()
}

class NicePaper implements GenericProduct

class ChristmasDiscount implements Discount

class Basket
{
    public function add(Product $product, Discount $discount)
}


