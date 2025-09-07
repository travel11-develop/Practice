<?php
declare(strict_types=1);

namespace Enum;

require_once __DIR__ . '/Result.php';

use Enum\Result;

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
    public function winHands(): Hands
    {
        return match($this) {
            self::GU => self::CHOKI,
            self::CHOKI => self::PA,
            self::PA => self::GU,
        };
    }

    /**
     * 勝敗判定
     *
     * @param Hands コンピュータの手
     * @return Result じゃんけんの勝敗
     */
    public function judge(Hands $hands): Result
    {
        // 上から条件式を評価し、最初に引数で指定したtrueと一致する条件式の右辺を返す
        return match(true) {
            $this === $hands => Result::Draw,
            $this->winHands() === $hands => Result::Win,
            default => Result::Lose,
        };
    }
}
