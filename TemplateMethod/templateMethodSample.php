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

        echo PHP_EOL . 'CharDisplayの出力を開始します……' . PHP_EOL . PHP_EOL ;
        echo '|' . $this->getCharLengthAsterisk($this->displayChar) . '|' . PHP_EOL;

    }

    /**
     * 文字列を表示する時に真ん中に出力するためのメソッド
     * 
     */
    public function print()
    {

        echo '|' . $this->displayChar . '|' . PHP_EOL;

    }

    /**
     * 文字列を表示する時に最後に出力するためのメソッド
     * 
     */
    public function close()
    {

        echo '|' . $this->getCharLengthAsterisk($this->displayChar) . '|' . PHP_EOL;

    }

   /**
    * 文字列をアスタリスクに変換する
    *   引数の文字列をバイト数に変換しそのバイト数分のアスタリスクを作成する
    *
    * @param  string $char 文字列
    * @return string 引数の文字列のバイト数分のアスタリスク
    */
    private function getCharLengthAsterisk($char)
    {

        $result = '';

        // 引数で指定された文字列の長さを取得
        $charLength = strlen($char);

        // 引数で指定された文字列分繰り返す
        for ($i = 1 ; $i <= $charLength; $i++) {

            $result .= '*';

        }

        return $result;
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
    private $displayString; 

   /**
    * コンストラクタ
    *
    * @param string $String 表示対象文字列
    */
    public function __construct($String)
    {

        $this->displayString = $String;

    }

    /**
     * 文字列を表示する時に最初に出力するためのメソッド
     * 
     */
    public function open()
    {

        echo PHP_EOL . 'StringDisplayの出力を開始します……' . PHP_EOL . PHP_EOL ;
        echo '|---------------------------------' . PHP_EOL;

    }

    /**
     * 文字列を表示する時に真ん中に出力するためのメソッド
     * 
     */
    public function print()
    {

        echo '|' . $this->displayString . PHP_EOL;

    }

    /**
     * 文字列を表示する時に最後に出力するためのメソッド
     * 
     */
    public function close()
    {

        echo '|---------------------------------' . PHP_EOL;

    }
   

}

// キャラ文字列表示
$char   = new CharDisplay('Yahaaaa!!');
$char->display();

// 文字列表示
$string = new StringDisplay('Banana');
$string->display();
