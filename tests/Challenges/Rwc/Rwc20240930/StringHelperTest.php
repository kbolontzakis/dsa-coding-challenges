<?php

declare(strict_types=1);

use App\Challenges\Rwc\Rwc20240930\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    public function testSplit(): void
    {
        $string = 'This is so, so silly!';
        $this->assertSame(['This', 'is', 'so,', 'so', 'silly!'], StringHelper::split($string, ' '));
        $this->assertSame(['T', 'h', 'i', 's', ' ', 'i', 's', ' ', 's', 'o', ',', ' ', 's', 'o', ' ', 's', 'i', 'l', 'l', 'y', '!'], StringHelper::split($string, ''));
        $this->assertSame(['This is so', ' so silly!'], StringHelper::split($string, ','));
    }
}
