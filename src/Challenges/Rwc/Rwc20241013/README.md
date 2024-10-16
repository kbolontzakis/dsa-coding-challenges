# Interview question of the week

## Question

([Link to original email](https://buttondown.com/cassidoo/archive/dont-block-your-blessings-jennifer-hudson/))

> **Write a function that generates a valid SVG string for a circle
> given its radius, center position, and color.**
>
> Examples:
>
> ```
> generateCircle(radius = 50, center = (100, 100), color = "blue")
> "<svg width='200' height='200'><circle cx='100' cy='100' r='50' fill='blue'/></svg>"
>
> generateCircle(radius = 30, center = (75, 50), color = "red")
> "<svg width='150' height='100'><circle cx='75' cy='50' r='30' fill='red'/></svg>"
> ```

## Solution

The width and height of the SVG is double the x-axis and y-axis coordinate of the center of the circle.

```php
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
```

```php
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
```