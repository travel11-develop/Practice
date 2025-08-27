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
    public function testGetResultText(Hands $hand, string $expected)
    {
        $this->assertSame($expected, $hand->getHandText());
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
    public function testWinHands(Hands $hand, Hands $expected)
    {
        $this->assertSame($expected, $hand->winHands());
    }

    public static function winHandsProvider(): array
    {
        return [
            [Hands::GU, Hands::CHOKI],
            [Hands::CHOKI, Hands::PA],
            [Hands::PA, Hands::GU],
        ];
    }

    public function testJudgeDraw()
    {
        foreach (Hands::cases() as $hand) {
            $this->assertSame(Result::Draw, $hand->judge($hand));
        }
    }

    #[DataProvider('judgeWinProvider')]
    public function testJudgeWin(Hands $player_hands, Hands $computer_hands, Result $expected)
    {
        $this->assertSame($expected, $player_hands->judge($computer_hands));
    }

    public static function judgeWinProvider(): array
    {
        return [
            [Hands::GU, Hands::CHOKI, Result::Win],
            [Hands::CHOKI, Hands::PA, Result::Win],
            [Hands::PA, Hands::GU, Result::Win],
        ];
    }

    #[DataProvider('judgeLoseProvider')]
    public function testJudgeLose(Hands $player_hands, Hands $computer_hands, Result $expected)
    {
        $this->assertSame($expected, $player_hands->judge($computer_hands));
    }

    public static function judgeLoseProvider(): array
    {
        return [
            [Hands::GU, Hands::PA, Result::Lose],
            [Hands::CHOKI, Hands::GU, Result::Lose],
            [Hands::PA, Hands::CHOKI, Result::Lose],
        ];
    }
}
