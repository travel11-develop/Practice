<?php
require_once 'src/VendingMachine.php';
require_once 'src/Drink.php';

try {
    $vm = new VendingMachine();

    // 商品を自販機にセット
    $vm->addDrink(new Drink('コーラ', 150));
    $vm->addDrink(new Drink('お茶', 110));

    // お金を投入（100円 + 100円 = 200円）
    $vm->sumInsertMoney(100);
    $vm->sumInsertMoney(100);

    // 購入結果
    $drink = $vm->buy('コーラ');
    echo "{$drink->getName()}を購入しました。";

    // お釣りを算出
    $change = $vm->refund();
    echo "お釣りは {$change} 円です。"; // 出力: お釣りは 50 円です。

} catch (Exception $e) {
    echo "エラー: " . $e->getMessage();
}
