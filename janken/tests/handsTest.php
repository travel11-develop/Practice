<?php
require_once __DIR__ . '/../enum/Hands.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Enum\Hands;

class HandsTest extends TestCase
{
    #[DataProvider('handsProvider')]
    public function testgetHandText(Hands $hands, string $expected)
    {
        $this->assertSame($expected, $hands->getHandText());
    }

    public static function handsProvider(): array
    {
        return [
            [Hands::GU, 'グー'],
            [Hands::CHOKI, 'チョキ'],
            [Hands::PA, 'パー'],
        ];
    }
}
