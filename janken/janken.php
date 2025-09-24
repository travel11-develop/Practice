<?php
declare(strict_types=1);
require_once __DIR__ . '/enum/Hands.php';

use Enum\Hands;

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
