<?php
require_once 'Drink.php';

// ドリンクの在庫管理・購入処理・売上管理を行うクラス
class VendingMachine
{
    private int $insert_money = 0;

    // ドリンクをセットする
    private array $drinks = [];

    // 商品を追加する
    public function addDrink(Drink $drink): void
    {
        $this->drinks[] = $drink;
    }

    // お金を投入
    public function sumInsertMoney(int $money): void
    {
        if ($money < 0) {
            throw new Exception('投入金額は1円以上を入れてください');
        }

        // 投入金額を加算する
        $this->insert_money += $money;
    }

    // 商品の金額を取得
    private function getPrice(string $name): int
    {
        foreach($this->drinks as $drink) {
            // 商品名が一致するか
            if ($drink->getName() === $name) {
                return $drink->getPrice();
            }
        }

        throw new Exception('該当の商品が見つかりません');
    }

    // おつり計算
    public function calculateChange(string $name): int
    {
        $price = $this->getPrice($name);

        if($price > $this->insert_money) {
            throw new Exception('投入金額が足りません');
        }

        return $this->insert_money - $price;
    }

}
