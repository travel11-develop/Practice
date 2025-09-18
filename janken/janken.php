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
    private function getHand($hand)
    {
        return Hands::tryFrom($hand);
    } 

    /**
     * ユーザーのじゃんけんの手を取得
     *
     * @return string
     */
    public function getUserHand()
    {
        return $this->getHand(trim(fgets(STDIN)));
    }

    /**
     * コンピュータの手をランダムで選択
     *
     * @return string
     */
    public function getPcHand()
    {
        $computer_hand = random_int(0, 2);
        return $this->getHand((string)$computer_hand);
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
     */
    public function getResultText($player_hand, $computer_hand)
    {
        return $player_hand->judge($computer_hand)->getResultText() . "\n";
    }

    /**
     * ループ処理判定の入力値をチェック
     */
    public function isCheckAnswer()
    {
        $answer =  trim(fgets(STDIN));
        if (strtolower($answer) !== 'y') {
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
    $player_hand =  $janken->getUserHand();

    // 入力値のエラーチェック
    if ($janken->isCheckInput($player_hand) === false) continue;

    echo '貴方の手：' . $player_hand->getHandText() ."\n";

    // コンピュータの手をランダムで選択
    $computer_hand = $janken->getPcHand();
    echo 'コンピューターの手:' . $computer_hand->getHandText() . "\n";

    // 勝敗判定
    echo $janken->getResultText($player_hand, $computer_hand) . "\n";

    echo "もう一度やりますか？ (y/n):\n";

    // 入力値をチェック
    if ($janken->isCheckAnswer() === false) break;
}
