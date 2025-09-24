<?php
declare(strict_types=1);
require_once __DIR__ . '/janken.php';

$janken = new Janken();

echo "じゃんけんをしましょう！\n";

// breakするまでじゃんけん処理をループ
while (true) {
    echo "0: グー, 1: チョキ, 2: パー\n";
    echo "あなたの手を数字で入力してください:\n";

    // ユーザーの入力値を取得
    $player_hand =  $janken->getHand(trim(fgets(STDIN)));

    // 入力値のエラーチェック
    if ($janken->isCheckInput($player_hand) === false) continue;

    echo '貴方の手：' . $player_hand->getHandText() ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = $janken->getHand((string)random_int(0, 2));
    echo 'コンピューターの手:' . $computer_hand->getHandText() . "\n";

    // 勝敗判定
    echo $janken->getResultText($player_hand, $computer_hand) . "\n";

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    if ($janken->isCheckAnswer(trim(fgets(STDIN))) === false) break;
}
