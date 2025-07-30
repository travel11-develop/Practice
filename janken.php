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

/**
 * 入力値のエラーチェック
 * @param string $input
 * @param array $hands
 * @return bool
 */
function checkInputValue(string $input, array $hands)
{
    return array_key_exists($input, $hands);
}

/**
 * 勝敗判定
 * @param string $player_hand
 * @param string $computer_hand
 */
function judgeWinOrLose(string $player_hand, string $computer_hand)
{
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
}

echo "じゃんけんをしましょう！\n";

// breakするまでじゃんけん処理をループ
while (true) {

    echo "0: グー, 1: チョキ, 2: パー\n";
    echo "あなたの手を数字で入力してください:\n";

    // ユーザーの入力値を取得
    $player_input = trim(fgets(STDIN));

    // 入力値のエラーチェック
    if (checkInputValue($player_input, $hands) === false) {
        echo "無効な入力です。0〜2の数字を入力してください:\n";
        continue;
    }

    $player_hand = (string)$player_input;
    echo '貴方の手：' . $hands[$player_hand] ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = (string)random_int(0, 2);
    echo 'コンピューターの手:' . $hands[$computer_hand] . "\n";

    // 勝敗判定
    judgeWinOrLose($player_hand, $computer_hand);

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if (strtolower($answer) !== 'y') {
       break;
    }
}
