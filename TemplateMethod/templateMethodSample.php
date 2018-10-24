<?php

/**
 * 表示抽象クラス
 *   文字列を出力する時の抽象クラス
 *
 * @abstract
 */
abstract class AbstractDisplay
{

    /**
     * 文字列を表示する時に最初に出力するためのメソッド
     *
     * @abstract
     */
    abstract public function open();

    /**
     * 文字列を表示する時に真ん中に出力するためのメソッド
     *
     * @abstract
     */
    abstract public function print();

    /**
     * 文字列を表示する時に最後に出力するためのメソッド
     *
     * @abstract
     */
    abstract public function close();

    /**
     * 文字列を表示するためのメソッド
     *   open,print x 5,closeの順番でメソッドを実行する
     *
     * @final
     */
    final public function display()
    {

        $this->open();
        
        // 5回printメソッドを実行する
        for ($i = 1; $i <= 5; $i++) {
            $this->print();
        }
        
        $this->close();

    }
}

/**
 * キャラ文字列表示クラス
 *   表示抽象クラスを継承したキャラ文字列表示クラスです
 *
 */
class CharDisplay extends AbstractDisplay
{

    /**
     * 真ん中に表示する文字列
     * 
     * @var string
     */
    private $displayChar; 

   /**
    * コンストラクタ
    *
    * @param string $char 表示対象文字列
    */
    public function __construct($char)
    {

        $this->displayChar = $char;

    }

    /**
     * 文字列を表示する時に最初に出力するためのメソッド
     * 
     */
    public function open()
    {

        echo '<<';

    }

    /**
     * 文字列を表示する時に真ん中に出力するためのメソッド
     * 
     */
    public function print()
    {

        echo $this->displayChar;

    }

    /**
     * 文字列を表示する時に最後に出力するためのメソッド
     * 
     */
    public function close()
    {

        echo '>>' . PHP_EOL;

    }

}

/**
 * 文字列表示クラス
 *   表示抽象クラスを継承した文字列表示クラスです
 *
 */
class StringDisplay extends AbstractDisplay
{
   
    /**
     * 真ん中に表示する文字列
     * 
     * @var string
     */
    private $string;

    /**
     * コンストラクタで渡された文字列のバイト数
     * 
     * @var integer
     */
    private $width = 0;

   /**
    * コンストラクタ
    *
    * @param string $String 表示対象文字列
    */
    public function __construct($String)
    {

        // 引数で渡ってきた文字列のバイト数をセット
        $this->string = $String;
        $this->width  = strlen($String);

    }

    /**
     * 文字列を表示する時に最初に出力するためのメソッド
     * 
     */
    public function open()
    {

        $this->printLine();

    }

    /**
     * 文字列を表示する時に真ん中に出力するためのメソッド
     * 
     */
    public function print()
    {

        echo '|' . $this->string . '|' . PHP_EOL;

    }

    /**
     * 文字列を表示する時に最後に出力するためのメソッド
     * 
     */
    public function close()
    {

        $this->printLine();

    }

    /**
     * コンストラクタで渡された文字列のバイト数分のヘッダとフッタを出力する
     * 
     */
    private function printLine()
    {

        echo '+';

        // コンストラクタで渡された文字列のバイト数分繰り返す
        for ($i = 0 ; $i < $this->width; $i++) {
            echo '-';
        }

        echo '+' . PHP_EOL;

    }
   
}

$d1 = new CharDisplay('H');
$d2 = new StringDisplay('Hello, world');
$d3 = new StringDisplay('こんにちは。');

$d1->display();
echo PHP_EOL;
$d2->display();
echo PHP_EOL;
$d3->display();
