<?php
require_once __DIR__ . '/../numberGuess.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * numberGuess.phpのテスト
 *
 * @covers 
 */
class numberGuessTest extends TestCase
{
    protected function setUp(): void
    {
        $this->numberGuess = new numberGuess(25, 5);
    }

    /**
     * guessメソッドのテスト
     *
     * @param int
     * @param string
     */
    #[DataProvider('guessProvider')]
    public function testGuess(int $num, string $expected): void
    {
        $this->assertSame($expected, $this->numberGuess->guess($num));
    }

    /**
     * guessメソッドの入力データ
     * ユーザーの入力値を設定する
     *
     * @return array<int,string>
     */
    public static function guessProvider(): array
    {
        return [
            [25, numberGuess::CORRECT_ANSWER],
            [0,  numberGuess::SMALLER_THAN_ANSWER],
            [50, numberGuess::GREATER_THAN_ANSWER],
        ];
    }

    /**
     * hasTriesLeftメソッドのテスト
     *
     * @param int
     * @param bool
     */
    #[DataProvider('maxTriesProvider')]
    public function testHasTriesLeft(int $maxTries, bool $expected): void
    {
        $numberGuess = new numberGuess(25, $maxTries);
        $this->assertSame($expected, $numberGuess->hasTriesLeft());
    }

    /**
     * hasTriesLeftメソッドの入力データ
     * 最大試行回数を設定
     *
     * @return array<int,bool>
     */
    public static function maxTriesProvider(): array
    {
        return [
            [0, false],
            [5, true],
        ];
    }

    /**
     * isCorrectメソッドのテスト
     *
     * @param int
     * @param bool
     */
    #[DataProvider('isCorrectProvider')]
    public function testIsCorrect(int $userInput, bool $expected): void
    {
        $this->assertSame($expected, $this->numberGuess->isCorrect($userInput));
    }

    /**
     * isCorrectメソッドの入力データ
     * ユーザーの入力値を設定
     *
     * @return array<int,bool>
     */
    public static function isCorrectProvider(): array
    {
        return [
            [25, true],
            [0,  false],
            [50, false],
        ];
    }

    /**
     * getAnswerメソッドのテスト
     */
    public function testGetAnswer(): void
    {
        $this->assertSame(25, $this->numberGuess->getAnswer());
    }
}
