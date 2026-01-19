<?php

// ポリモーフィズムを学ぶ
// 同名のメソッドで異なる挙動を実現する（機能の目的は同じ）

// 共通支払処理の抽象化クラス
abstract class PaymentAbstract
{
    /**
     * コンストラクタ定義
     */
    public function __construct(
            protected float $rate = 0.1,
    ) {}

    /**
     * 抽象メソッド
     * 子クラスで必ずオーバーライドされるメソッド
     * 中身の処理を親クラスで定義できない
     *
     * 最終支払い金額を返すメソッド
     *
     * @param int
     * @return int
     */
    public abstract function pay(int $amount): int;

}
