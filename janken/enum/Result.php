<?php
declare(strict_types=1);

namespace Enum;

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
