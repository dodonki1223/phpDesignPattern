<?php

require_once('framework.php');


/**
 * IDカードクラス
 *   IDカードの機能を提供する
 *
 */
class IDCard extends Product
{

    /**
     * 所有者名を保持する変数
     * 
     * @var string
     */
    private $owner;

   /**
    * コンストラクタ
    *   「所有者名のカードを作ります。」形式の文字列をコンソールに標示
    *
    * @param string $owner 所有者名
    */
    public function __construct($owner)
    {

        echo $owner . "のカードを作ります。" . PHP_EOL;
        $this->owner = $owner;

    }

    /**
     * 使用する
     *   「所有者名のカードを使います。」形式の文字列をコンソールに標示
     *
     */
    public function use()
    {

        echo $this->owner . "のカードを使います。" . PHP_EOL;

    }

    /**
     * 所有者を取得
     *   コンストラクタでセットされた所有者名を返す
     *
     */
    public function getOwner() 
    {

        return $this->owner;

    }

}

/**
 * IDカードファクトリークラス
 *   IDカードを作成する機能を提供する
 *
 */
class IDCardFactory extends Factory
{

    /**
     * 所有者名を保持する変数
     * 
     * @var string
     */
    private $owners;

    /**
     * IDCardを作成する
     *
     * @param  string  $owner IDCardの所有者名
     * @return Product IDCard（Productクラス）
     */
    public function createProduct(string $owner): Product
    {

        return new IDCard($owner);

    }

    /**
     * 所有者を登録するメソッド
     *
     * @param Product $product Productクラス
     */
    public function registerProduct(Product $product)
    {

        // 所有者名を追加する
        $this->owners[] = $product->getOwner();

    }

    /**
     * 所有者を登録するメソッド
     *
     * @return array 所有者名
     */
    public function getOwners()
    {

        return $this->owners;

    }

}