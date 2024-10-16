<?php

declare(strict_types=1);

use App\Challenges\Rwc\Rwc20241013\SvgHelper;
use PHPUnit\Framework\TestCase;

class SvgHelperTest extends TestCase
{
    public function testGenerateCircle(): void
    {
        $this->assertSame(
            "<svg width='200' height='200'><circle cx='100' cy='100' r='50' fill='blue'/></svg>", 
            SvgHelper::generateCircle(50, [100, 100], 'blue'),
            'The returned string should be the expected.'
        );
        $this->assertSame(
            "<svg width='150' height='100'><circle cx='75' cy='50' r='30' fill='red'/></svg>", 
            SvgHelper::generateCircle(30, [75, 50], 'red'),
            'The returned string should be the expected.'
        );
    }
}
