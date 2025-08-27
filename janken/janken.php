<?php
declare(strict_types=1);

require_once __DIR__ . '/enum/Hands.php';
require_once __DIR__ . '/enum/Result.php';

use Enum\Hands;
use Enum\Result;

echo "じゃんけんをしましょう！\n";

// breakするまでじゃんけん処理をループ
while (true) {
    echo "0: グー, 1: チョキ, 2: パー\n";
    echo "あなたの手を数字で入力してください:\n";

    // ユーザーの入力値を取得
    $player_hand = Hands::tryFrom(trim(fgets(STDIN)));

    // 入力値のエラーチェック
    if ($player_hand === null) {
        echo "無効な入力です。0〜2の数字を入力してください:\n";
        continue;
    }

    echo '貴方の手：' . $player_hand->getHandText() ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = Hands::tryFrom((string)random_int(0, 2));
    echo 'コンピューターの手:' . $computer_hand->getHandText() . "\n";

    // 勝敗判定
    echo $player_hand->judge($computer_hand)->getResultText() . "\n";

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if (strtolower($answer) !== 'y') {
       break;
    }
}
