<?php
declare(strict_types=1);

require_once __DIR__ . '/enum/Hands.php';
require_once __DIR__ . '/enum/Result.php';

use Enum\Hands;
use Enum\Result;

class Janken {
    /**
     * じゃんけんの手を取得
     *
     * @param string
     * @return string
     */
    public function getHand($input)
    {
        return Hands::tryFrom($input);
    }

    /**
     * ユーザーの入力値をチェック
     *
     * @param Hands
     * @return bool
     */
    public function isCheckInput($player_hand)
    {
        if ($player_hand === null) {
            echo "無効な入力です。0〜2の数字を入力してください:\n";
            return false;
        }
        return true;
    }

    /**
     * 勝敗判定
     *
     * @param Hands
     * @param Hands
     * @return string
     */
    public function getResultText($player_hand, $computer_hand)
    {
        return $player_hand->judge($computer_hand)->getResultText();
    }

    /**
     * ループ処理判定の入力値をチェック
     */
    public function isCheckAnswer($input)
    {
        if (strtolower($input) !== 'y') {
            return false;
        }
        return true;
    }
}

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
