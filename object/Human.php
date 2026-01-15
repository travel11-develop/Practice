<?php
require_once __DIR__ . '/Animal.php';

/**
 * Animalクラスを親にもつ子クラス
 */
class Human extends Animal
{
    /**
     * 自己紹介メソッド
     *
     * @return string
     */
    public function introduction():string
    {
        return '私の名前は' . $this->name . 'です。';
    }

    /**
     * 鳴くメソッド（オーバーライドする）
     * ＝＞オーバーライドするメソッドは、引数・戻り値を一致させる
     *
     * @return string
     */
    public function speak():string
    {
        return '話す';
    }
}

// インスタンスを作成する際に、親クラスのコンストラクタを実行している
// 子クラスでコンストラクタ定義している場合は、親クラスのコンストラクタは実行されない
$human = new Human('太郎', 10);

// 自己紹介（親クラスのプロパティを呼ぶ）
echo $human->introduction();

// 移動する（親クラスのメソッドをそのまま使う例）
echo '体力：' . $human->move();
echo '体力：' . $human->move();

// 話す(親クラスをオーバーライド)
echo $human->speak();
