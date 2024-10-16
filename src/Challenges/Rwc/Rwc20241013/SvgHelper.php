<?php

declare(strict_types=1);

namespace App\Challenges\Rwc\Rwc20241013;

class SvgHelper
{
    public static function generateCircle(int $radius, array $center, $color): string
    {
        $svgWidth = $center[0] * 2;
        $svgHeight = $center[1] * 2;
        return "<svg width='$svgWidth' height='$svgHeight'>" .
            "<circle cx='{$center[0]}' cy='{$center[1]}' r='$radius' fill='$color'/>" .
            "</svg>";
    }
}
