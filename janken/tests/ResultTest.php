<?php
require_once __DIR__ . '/../enum/Result.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Enum\Result;

/**
 * Enum/Resultで作成したメソッドのテスト
 *
 * @covers Enum\Result
 */
class ResultTest extends TestCase
{
    /**
     * getResultTextメソッドの正常系テスト
     *
     * @dataProvider resultProvider
     * @covers Enum\Result::getResultText
     */
    #[DataProvider('resultProvider')]
    public function testGetResultText(Result $result, string $expected): void
    {
        $this->assertSame($expected, $result->getResultText());
    }

    /**
     * getResultTextメソッドの入力データ
     *
     * @return array<Result,string>
     */
    public static function resultProvider(): array
    {
        return [
            [Result::Draw, 'あいこです！'],
            [Result::Win, 'あなたの勝ちです！'],
            [Result::Lose, 'あなたの負けです！'],
        ];
    }
}
