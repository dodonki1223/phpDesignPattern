<?php

abstract class Factory 
{

    final public function create($owner): Product
    {

        $product = $this->createProduct($owner);

        $this->registerProduct($product);

        return $product;

    }

    abstract public function createProduct(string $owner): Product;

    abstract public function registerProduct(Product $product);

}

abstract class Product 
{

    abstract public function use();

}

