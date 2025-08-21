<?php
require_once __DIR__ . '/../enum/Result.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Enum\Result;

class ResultTest extends TestCase
{
    #[DataProvider('resultProvider')]
    public function testGetResultText(Result $result, string $expected)
    {
        $this->assertSame($expected, $result->getResultText());
    }

    public static function resultProvider(): array
    {
        return [
            [Result::Draw, 'あいこです！'],
            [Result::Win, 'あなたの勝ちです！'],
            [Result::Lose, 'あなたの負けです！'],
        ];
    }
}
