<?php

/**
 * Productクラスを返す（ファクトリー）抽象クラス
 *   Productクラスを作成・登録しProductクラスを返す機能を提供する
 *
 * @abstract
 */
abstract class Factory 
{

    /**
     * Productクラスを作成するメソッド
     *
     * @abstract
     * @param  string  $owner Product名
     * @return Product Productクラス
     */
    abstract public function createProduct(string $owner): Product;

    /**
     * Productクラスを登録するメソッド
     *
     * @abstract
     * @param Product $product Productクラス
     */
    abstract public function registerProduct(Product $product);

    /**
     * Productクラスを返す
     *   createProduct,registerProductの順番でメソッドを実行し
     *   Productクラスを返す
     *
     * @final
     * @param  string  $owner Product名
     * @return Product Productクラス
     */
    final public function create($owner): Product
    {

        // Productクラスを作成する
        $product = $this->createProduct($owner);

        // Productクラスを登録する
        $this->registerProduct($product);

        return $product;

    }

}

/**
 * Product抽象クラス
 *   Productの機能を提供する
 *
 * @abstract
 */
abstract class Product 
{

    /**
     * 使用する
     *
     * @abstract
     */
    abstract public function use();

}

