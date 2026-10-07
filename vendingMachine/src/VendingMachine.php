<?php
require_once 'Drink.php';

// ドリンクの在庫管理・購入処理・売上管理を行うクラス
class VendingMachine
{
    private int $insert_money = 0;

    // ドリンクをセットする
    private array $drinks = [];

    /**
     * 商品を追加する
     *
     * @param Drink
     */
    public function addDrink(Drink $drink): void
    {
        $this->drinks[] = $drink;
    }

    /**
     * 投入金額を集計する
     *
     * @param int $money
     */
    public function sumInsertMoney(int $money): void
    {
        if ($money <= 0) {
            throw new Exception('投入金額は1円以上を入れてください');
        }

        // 投入金額を加算する
        $this->insert_money += $money;
    }

    /**
     * 商品オブジェクトを取得
     *
     * @param string $name 商品名
     * @return int
     */
    private function getDrinkIndex(string $name): int
    {
        foreach($this->drinks as $index => $drink) {
            // 商品名が一致するか
            if ($drink->getName() === $name) {
                return $index;
            }
        }

        throw new Exception('在庫切れ、または商品が存在しません');
    }

    /**
     * おつり計算
     *
     * @param int $price 商品の金額
     * @return int
     */
    private function calculateChange(int $price): int
    {
        if($price > $this->insert_money) {
            throw new Exception('投入金額が足りません');
        }

        return $this->insert_money - $price;
    }

    /**
     * 商品を購入する処理
     *
     * @param string $name 商品名
     * @return Drink
     */
    public function buy(string $name): Drink
    {
        // 商品が存在するかチェック
        $index = $this->getDrinkIndex($name);
        $drink = $this->drinks[$index];

        // おつりを計算する
        $this->insert_money = $this->calculateChange($drink->getPrice());

        // 在庫を減らす
        array_splice($this->drinks, $index, 1);

        // 購入した商品を返す
        return $drink;
    }

    /**
     * おつりを返却する
     *
     * @return int
     */
    public function refund(): int
    {
        $change = $this->insert_money;
        $this->insert_money = 0;

        return $change;
    }
}
