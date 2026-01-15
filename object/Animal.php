<?php
// 継承を学ぶ
// 基になるクラス（ここでは親クラス呼び）の機能を引き継ぎながら、新機能の追加や元の機能の一部を修正する仕組み
// 差分プログラミング

/**
 * 親クラス
 * - 生き物として共通の性質・ふるまいを持つクラス
 */
class Animal
{
    /**
     * PHP8以降で使える省略形式
     */
    public function __construct(
            protected string $name,
            protected int $energy
    ) {}

    /**
     * 移動メソッド
     * 移動すると体力が１減る
     *
     * @return int
     */
    public function move(): int
    {
        if ($this->enery === 0) return 0;
        return --$this->energy;
    }

    /**
     * 鳴く動作を表すメソッド
     *
     * @return string
     */
    public function speak(): string
    {
        return '鳴く';
    }
}
