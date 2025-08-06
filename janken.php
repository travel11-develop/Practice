<?php
declare(strict_types=1);

enum Result
{
    case Draw;
    case Win;
    case Lose;

    /**
    * 勝敗結果のテキストを返す
    *
    * @return string
    */
    public function getResultText():string
    {
        return match($this) {
            self::Draw => 'あいこです！',
            self::Win => 'あなたの勝ちです！',
            self::Lose => 'あなたの負けです！',
        };
    }
}

enum Hands: string
{
    case GU = '0';
    case CHOKI = '1';
    case PA = '2';

    /**
     * じゃんけんの手を文字列で返す
     *
     * @return string
     */
    public function getHandText(): string
    {
        return match($this) {
            self::GU => 'グー',
            self::CHOKI => 'チョキ',
            self::PA => 'パー',
        };
    }
}

/**
 * 入力値のエラーチェック
 *
 * @param string $input
 * @return bool Return check input value result
 */
function isValidInputValue(string $input): bool
{
    return Hands::tryFrom($input) !== null;
}

/**
 * 勝敗判定
 *
 * @param string $player_hand
 * @param string $computer_hand
 * @return object Return judgement draw or win or lose
 */
function judgeWinOrLose(string $player_hand, string $computer_hand): object
{
    if ($player_hand === $computer_hand) {
        return Result::Draw;
    } elseif (
        ($player_hand === Hands::GU->value && $computer_hand === Hands::CHOKI->value) ||
        ($player_hand === Hands::CHOKI->value && $computer_hand === Hands::PA->value) ||
        ($player_hand === Hands::PA->value && $computer_hand === Hands::GU->value)
    ) {
        return Result::Win;
    } else {
        return Result::Lose;
    }
}

echo "じゃんけんをしましょう！\n";

// breakするまでじゃんけん処理をループ
while (true) {
    echo "0: グー, 1: チョキ, 2: パー\n";
    echo "あなたの手を数字で入力してください:\n";

    // ユーザーの入力値を取得
    $player_hand = trim(fgets(STDIN));

    // 入力値のエラーチェック
    if (isValidInputValue($player_hand) === false) {
        echo "無効な入力です。0〜2の数字を入力してください:\n";
        continue;
    }

    echo '貴方の手：' . Hands::tryFrom($player_hand)->getHandText() ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = (string)random_int(0, 2);
    echo 'コンピューターの手:' . Hands::tryFrom($computer_hand)->getHandText() . "\n";

    // 勝敗判定
    $result = judgeWinOrLose($player_hand, $computer_hand);
    echo $result->getResultText() . "\n";

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if (strtolower($answer) !== 'y') {
       break;
    }
}
