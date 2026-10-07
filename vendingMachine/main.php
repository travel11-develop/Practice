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

    // お釣り計算（コーラ 150円 を購入）
    $change = $vm->calculateChange('コーラ');
    echo "お釣りは {$change} 円です。"; // 出力: お釣りは 50 円です。

} catch (Exception $e) {
    echo "エラー: " . $e->getMessage();
}
