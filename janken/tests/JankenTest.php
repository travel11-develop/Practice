<?php
require_once __DIR__ . '/../janken.php';
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
class JankenTest extends TestCase
{
    /**
     * getHandメソッドのテスト
     *
     * @dataProvider getHandsProvider
     * @covers Janken::getHand
     */
    #[DataProvider('getHandsProvider')]
    public function testGetHand(string $input, Hands $expected): void
    {
        $janken = new Janken();
        $result = $janken->getHand($input);
        $this->assertSame($expected, $result);
    }

    /**
     * getHandメソッドの入力データ
     *
     * @return array
     */
    public static function getHandsProvider(): array
    {
        return [
            ['0', Hands::GU],
            ['1', Hands::CHOKI],
            ['2', Hands::PA],
        ];
    }

    /**
     * isCheckInputメソッドのテスト
     *
     * @dataProvider isCheckInputProvider
     * @covers Janken::isCheckInput
     */
    #[DataProvider('isCheckInputProvider')]
    public function testIsCheckInput(string $input, bool $expected): void
    {
        ob_start();

        $janken = new Janken();
        $result = $janken->isCheckInput($janken->getHand($input));
        $this->assertSame($expected, $result);

        ob_get_clean();
    }

    /**
     * getHandメソッドの入力データ
     *
     * @return array
     */
    public static function isCheckInputProvider(): array
    {
        return [
            ['0', true],
            ['1', true],
            ['2', true],
            ['-1', false],
            ['3', false],
            ['test', false],
        ];
    }

    /**
     * getResultTextメソッドのテスト
     *
     * @dataProvider getResultTextProvider
     * @covers Janken::getResultText
     */
    #[DataProvider('getResultTextProvider')]
    public function testGetResultText(
        Hands $player_hands,
        Hands $computer_hands,
        string $expected
    ) {
        $janken = new Janken();
        $result = $janken->getResultText($player_hands, $computer_hands);
        $this->assertSame($expected, $result);
    }

    /**
     * getResultTextメソッドの入力データ
     *
     * @return array
     */
    public static function getResultTextProvider(): array
    {
        return [
            [Hands::GU, Hands::GU, 'あいこです！'],
            [Hands::CHOKI, Hands::CHOKI, 'あいこです！'],
            [Hands::PA, Hands::PA, 'あいこです！'],
            [Hands::GU, Hands::CHOKI, 'あなたの勝ちです！'],
            [Hands::CHOKI, Hands::PA, 'あなたの勝ちです！'],
            [Hands::PA, Hands::GU, 'あなたの勝ちです！'],
            [Hands::GU, Hands::PA, 'あなたの負けです！'],
            [Hands::CHOKI, Hands::GU, 'あなたの負けです！'],
            [Hands::PA, Hands::CHOKI, 'あなたの負けです！'],
        ];
    }

    /**
     * isCheckAnswerメソッドのテスト
     *
     * @dataProvider isCheckAnswerProvider
     * @covers Janken::isCheckAnswer
     */
    #[DataProvider('isCheckAnswerProvider')]
    public function testIsCheckAnswer(string $input, bool $expected): void
    {
        $janken = new Janken();
        $result = $janken->isCheckAnswer($input);
        $this->assertSame($expected, $result);
    }

    /**
     * isCheckAnswerメソッドの入力データ
     *
     * @return array
     */
    public static function isCheckAnswerProvider(): array
    {
        return [
            ['y', true],
            ['Y', true],
            ['n', false],
            ['N', false],
        ];
    }
}
