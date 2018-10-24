<?php

/**
 * シングルトンクラス
 *   デザインパターンのシングルトンを実装したクラスになります。
 *   インスタンスの生成はこのSingletonクラス内で行います。このSingletonクラス
 *   にアクセスする場合はgetInstanceメソッドを通じで使用します。
 */
class Singleton
{

    private static $instance;

   /**
    * コンストラクタ
    *   privateにしているので外部からインスタンスを生成することができません
    */
    private function __construct()
    {

        echo 'インスタンスを生成しました' . PHP_EOL;

    }

   /**
    * インスタンスを取得する
    *   staticなインスタンス変数がnullの場合はインスタンスを生成して返す、nullで無
    *   い場合（インスタンスが既に存在する）はそのまま返す
    */
    public static function getInstance()
    {

        // インスタンス変数がnullの場合はインスタンスを生成
        if (self::$instance === null) self::$instance = new Singleton();

        return self::$instance;

    }

}

echo 'Start.' . PHP_EOL;

// インスタンスの生成処理
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();

// 生成したobj1とobj2が同じものかチェック
if ($obj1 === $obj2) {
    echo 'obj1とobj2は同じインスタンスです' . PHP_EOL;
} else {
    echo 'obj1とobj2は違うインスタンスです' . PHP_EOL;
}

echo 'End.' . PHP_EOL;
