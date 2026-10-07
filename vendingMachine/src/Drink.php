<?php

// 名前と価格を保持するクラス
class Drink
{

    private string $name;
    private int $price;

    // プロパティ値を初期化
    public function __construct(string $name, int $price)
    {
       $this->name = $name;
       $this->price = $price;
    }

    // プロパティの値を取得する
    public function getName(): string
    {
       return $this->name;
    }

    public function getPrice(): int
    {
       return $this->price;
    }
}
