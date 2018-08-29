# Template Methodパターン

### Template Method パターン（テンプレート・メソッド・パターン）とは、GoF(Gang of Four; 4人のギャングたち)によって定義されたデザインパターンの1つである。「振る舞いに関するパターン」に属する。Template Method パターンの目的は、ある処理のおおまかなアルゴリズムをあらかじめ決めておいて、そのアルゴリズムの具体的な設計をサブクラスに任せることである。そのため、システムのフレームワークを構築するための手段としてよく活用される。([Wikipediaより](https://ja.wikipedia.org/wiki/Template_Method_%E3%83%91%E3%82%BF%E3%83%BC%E3%83%B3))

- メリット
    - 出力形式を変えたい時、テンプレートを変えるだけで良い
        - AbstractDisplayクラスのdisplayメソッドだけを変更するだけでよい（修正箇所が少なくて良い）
        - AbstractDisplayクラスに新しいnewDisplayメソッドなどを作成するだけで継承したCharDisplay,StringDisplayクラスの修正をする必要はない（修正箇所が少なくて良い）
    - 処理に順番をもたせることができる
        - open() → print() → close()

<br>

- デメリット
    - abstractなメソッドが増えると使いにくい
        - 今回は３つだけのメソッドだがこれが100個とかだと大変
    - abstractなメソッドを必ず使わなくてはいけない
        - abstractなメソッドを１部だけ減らしたいなどができない

<br>

- その他
    - なぜAbstractなのか？Interfaceではダメなのか？
        - Abstractにすることで処理の流れを固定化出来る
            - open() → print() → close()
        - Interfaceだと継承先で実装する必要があるため処理の固定化ができない

<br>

- 出力結果

```
$ php templateMethodSample.php
<<HHHHH>>

+------------+
|Hello, world|
|Hello, world|
|Hello, world|
|Hello, world|
|Hello, world|
+------------+

+------------------+
|こんにちは。|
|こんにちは。|
|こんにちは。|
|こんにちは。|
|こんにちは。|
+------------------+
```
