<?php
declare(strict_types=1);

const GU = '0';
const CHOKI = '1';
const PA = '2';

// じゃんけんの手を配列に格納
$hands = [
    GU => 'グー',
    CHOKI => 'チョキ',
    PA => 'パー',
];
// ゲームの継続を管理する
$is_game_continue = true;

echo "じゃんけんをしましょう！\n";
while ($is_game_continue) {

    echo "0: グー, 1: チョキ, 2: パー\n";
    echo "あなたの手を数字で入力してください:\n";

    // ユーザーの入力値を取得
    $player_input = trim(fgets(STDIN));

    // 入力値のエラーチェック
    if (array_key_exists($player_input, $hands) === false) {
        echo "無効な入力です。0〜2の数字を入力してください:\n";
        continue;
    }

    $player_hand = (int)$player_input;
    echo '貴方の手：' . $hands[$player_hand] ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = mt_rand(0, 2);
    echo 'コンピューターの手:' . $hands[$computer_hand] . "\n";

    // 勝敗判定
    if ($player_hand === $computer_hand) {
        echo "あいこです！\n";
    } elseif ($player_hand === GU && $computer_hand === CHOKI) {
        echo "あなたの勝ちです！\n";
    } elseif ($player_hand === CHOKI && $computer_hand === PA) {
        echo "あなたの勝ちです！\n";
    } elseif ($player_hand === PA && $computer_hand === GU) {
        echo "あなたの勝ちです！\n";
    } else {
        echo "あなたの負けです！\n";
    }

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if ($answer === 'y' || $answer === 'Y') {
       $is_game_continue = true;
    } else {
       $is_game_continue = false;
    }
}
