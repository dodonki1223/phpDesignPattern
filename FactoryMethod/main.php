<?php

require_once('framework.php');
require_once('idCard.php');

$factory = new IDCardFactory();

// IDCardの作成
echo PHP_EOL . '<IDCardの作成>' . PHP_EOL;
$card1 = $factory->create('結城浩');
$card2 = $factory->create('とむら');
$card3 = $factory->create('佐藤花子');

// IDCardを使用する
echo PHP_EOL . '<IDCardの使用>' . PHP_EOL;
$card1->use();
$card2->use();
$card3->use();

// IDCardの所有者の一覧を表示
echo PHP_EOL . '<所有者の一覧>' . PHP_EOL;
foreach ($factory->getOwners() as $index => $owner) {
    echo $index . '：' .$owner . PHP_EOL;
}
