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
 *
 * @param string $input
 * @param array $hands
 * @return bool Return check input value result
 */
function isValidInputValue(string $input, array $hands): bool
{
    return array_key_exists($input, $hands);
}

/**
 * 勝敗判定
 *
 * @param string $player_hand
 * @param string $computer_hand
 * @return string Return judgement draw or win or lose
 */
function judgeWinOrLose(string $player_hand, string $computer_hand): string
{
    if ($player_hand === $computer_hand) {
        return 'draw';
    } elseif (
        ($player_hand === GU && $computer_hand === CHOKI) ||
        ($player_hand === CHOKI && $computer_hand === PA) ||
        ($player_hand === PA && $computer_hand === GU)
    ) {
        return 'win';
    } else {
        return 'lose';
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
    if (isValidInputValue($player_input, $hands) === false) {
        echo "無効な入力です。0〜2の数字を入力してください:\n";
        continue;
    }

    $player_hand = (string)$player_input;
    echo '貴方の手：' . $hands[$player_hand] ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = (string)random_int(0, 2);
    echo 'コンピューターの手:' . $hands[$computer_hand] . "\n";

    // 勝敗判定
    $result = judgeWinOrLose($player_hand, $computer_hand);
    if ($result === 'draw') {
        echo "あいこです！\n";
    } elseif ($result === 'win') {
        echo "あなたの勝ちです！\n";
    } else {
        echo "あなたの負けです！\n";
    }

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if (strtolower($answer) !== 'y') {
       break;
    }
}
