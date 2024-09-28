<?php

declare(strict_types=1);

use App\Challenges\Rwc\Rwc20240922\LaundrySorter;
use PHPUnit\Framework\TestCase;

class LaundrySorterTest extends TestCase
{
    public function testMinLaundryLoads(): void
    {
        $load1 = [
            ["red", "normal"],
            ["blue", "normal"],
            ["red", "delicate"],
            ["blue", "heavy"]
        ];

        $load2 = [
            ["white", "normal"],
            ["white", "delicate"],
            ["white", "normal"],
            ["white", "heavy"]
        ];

        $this->assertSame(3, LaundrySorter::minLaundryLoads($load1));
        $this->assertSame(2, LaundrySorter::minLaundryLoads($load2));
    }
}
