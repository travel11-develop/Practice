<?php
declare(strict_types=1);

/**
 * じゃんけんの勝敗結果を表す列挙型
 *
 * Draw: 引き分け
 * Win: 勝ち
 * Lose: 負け
 */
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

/**
 * じゃんけんの手を表す列挙型
 *
 * GU: グー
 * CHOKI: チョキ
 * PA: パー
 */
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

    /**
     * じゃんけんで勝つ手を返す
     *
     * @return Hands
     */
    public function winHans(): Hands
    {
        return match($this) {
            self::GU => self::CHOKI,
            self::CHOKI => self::PA,
            self::PA => self::GU,
        };
    }
}

/**
 * 勝敗判定
 *
 * @param Hands $player_hand
 * @param Hands $computer_hand
 * @return string Return judgement draw or win or lose
 */
function judgeWinOrLose(Hands $player_hand, Hands $computer_hand): string
{
    if ($player_hand === $computer_hand) {
        return Result::Draw->getResultText();
    } elseif ($player_hand->winHans() === $computer_hand) {
        return Result::Win->getResultText();
    } else {
        return Result::Lose->getResultText();
    }
}

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
    echo judgeWinOrLose($player_hand, $computer_hand) . "\n";

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    $answer = trim(fgets(STDIN));
    if (strtolower($answer) !== 'y') {
       break;
    }
}
