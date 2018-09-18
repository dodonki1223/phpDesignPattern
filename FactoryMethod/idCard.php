<?php

require_once('framework.php');

class IDCard extends Product
{

    private $owner;

    public function __construct($owner)
    {

        echo $owner . "のカードを作ります。" . PHP_EOL;
        $this->owner = $owner;

    }

    public function use()
    {

        echo $this->owner . "のカードを使います。" . PHP_EOL;

    }

    public function getOwner() 
    {

        return $this->$owner;

    }

}

class IDCardFactory extends Factory
{

    private $owners;

    public function createProduct(string $owner): Product
    {

        return new IDCard($owner);

    }

    public function registerProduct(Product $product)
    {

        $this->$owners[] = $product->getOwner(); 

    }

    public function getOwners()
    {

        $this->owners;

    }

}