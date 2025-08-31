<?php
require_once __DIR__ . '/../enum/Hands.php';
require_once __DIR__ . '/../enum/Result.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Enum\Hands;
use Enum\Result;

/**
 * Enum/Handsで作成したメソッドのテスト
 *
 * @covers Enum\Hands
 */
class HandsTest extends TestCase
{
    /**
     * getHandTextメソッドの正常系テスト
     *
     * @dataProvider handsProvider
     * @covers Enum\Hands::getHandText
     */
    #[DataProvider('handsProvider')]
    public function testGetResultText(Hands $hand, string $expected): void
    {
        $this->assertSame($expected, $hand->getHandText());
    }

    /**
     * getHandTextメソッドの入力データ
     *
     * @return array<Hands,string>
     */
    public static function handsProvider(): array
    {
        return [
            [Hands::GU, 'グー'],
            [Hands::CHOKI, 'チョキ'],
            [Hands::PA, 'パー'],
        ];
    }

    /**
     * winHandsメソッドの正常系テスト
     *
     * @dataProvider winHandsProvider
     * @covers Enum\Hands::winHands
     */
    #[DataProvider('winHandsProvider')]
    public function testWinHands(Hands $hand, Hands $expected): void
    {
        $this->assertSame($expected, $hand->winHands());
    }

    /**
     * winHandsProviderメソッドの入力データ
     *
     * @return array<Hands,Hands>
     */
    public static function winHandsProvider(): array
    {
        return [
            [Hands::GU, Hands::CHOKI],
            [Hands::CHOKI, Hands::PA],
            [Hands::PA, Hands::GU],
        ];
    }

    /**
     * judgeメソッドであいこになった場合のテスト
     *
     * @covers Enum\Hands::winHands
     */
    public function testJudgeDraw(): void
    {
        foreach (Hands::cases() as $hand) {
            $this->assertSame(Result::Draw, $hand->judge($hand));
        }
    }

    /**
     * judgeメソッドでユーザーが勝った場合のテスト
     *
     * @dataProvider judgeWinProvider
     * @covers Enum\Hands::winHands
     */
    #[DataProvider('judgeWinProvider')]
    public function testJudgeWin(Hands $player_hands, Hands $computer_hands, Result $expected): void
    {
        $this->assertSame($expected, $player_hands->judge($computer_hands));
    }

    /**
     * judgeメソッドでユーザーが勝った場合の入力データ
     *
     * @return array<Hands,Hands,Result>
     */
    public static function judgeWinProvider(): array
    {
        return [
            [Hands::GU, Hands::CHOKI, Result::Win],
            [Hands::CHOKI, Hands::PA, Result::Win],
            [Hands::PA, Hands::GU, Result::Win],
        ];
    }

    /**
     * judgeメソッドでユーザーが負けた場合のテスト
     *
     * @dataProvider judgeLoseProvider
     * @covers Enum\Hands::winHands
     */
    #[DataProvider('judgeLoseProvider')]
    public function testJudgeLose(Hands $player_hands, Hands $computer_hands, Result $expected): void
    {
        $this->assertSame($expected, $player_hands->judge($computer_hands));
    }

    /**
     * judgeメソッドでユーザーが負けた場合の入力データ
     *
     * @return array<Hands,Hands,Result>
     */
    public static function judgeLoseProvider(): array
    {
        return [
            [Hands::GU, Hands::PA, Result::Lose],
            [Hands::CHOKI, Hands::GU, Result::Lose],
            [Hands::PA, Hands::CHOKI, Result::Lose],
        ];
    }
}
