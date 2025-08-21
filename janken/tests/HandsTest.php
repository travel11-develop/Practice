<?php
require_once __DIR__ . '/../enum/Hands.php';
require_once __DIR__ . '/../enum/Result.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Enum\Hands;
use Enum\Result;

class HandsTest extends TestCase
{
    #[DataProvider('handsProvider')]
    public function testGetResultText(Hands $result, string $expected)
    {
        $this->assertSame($expected, $result->getHandText());
    }

    public static function handsProvider(): array
    {
        return [
            [Hands::GU, 'グー'],
            [Hands::CHOKI, 'チョキ'],
            [Hands::PA, 'パー'],
        ];
    }

    #[DataProvider('winHandsProvider')]
    public function testWinHands(Hands $result, Hands $expected)
    {
        $this->assertSame($expected, $result->winHans());
    }

    public static function winHandsProvider(): array
    {
        return [
            [Hands::GU, Hands::CHOKI],
            [Hands::CHOKI, Hands::PA],
            [Hands::PA, Hands::GU],
        ];
    }

    #[DataProvider('judgeDrawProvider')]
    public function testJudgeDraw(Hands $hands, Result $expected)
    {
        $this->assertSame($expected, $hands->judge($hands));
    }

    public static function judgeDrawProvider(): array
    {
        return [
            [Hands::GU, Result::Draw],
            [Hands::CHOKI, Result::Draw],
            [Hands::PA, Result::Draw],
        ];
    }
}
