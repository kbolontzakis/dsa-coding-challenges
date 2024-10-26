# Interview question of the week

## Question

([Link to original email](https://buttondown.com/cassidoo/archive/whatever-the-problem-be-part-of-the-solution-tina/))

> **Write a function that takes in an RSS feed URL, and returns the title of and link to the the original feed source.**
>
> Examples:
>
> ```
> getRSS('https://cassidoo.co/rss.xml')
> "Cassidy Williams, https://cassidoo.co/"
>
> getRSS("https://feed.syntax.fm/")
> "Syntax - Tasty Web Development Treats, https://syntax.fm"
> ```

## Solution

- Get the content of the feed
- Interpret the string of XML as an object
- Pick the channel title and URL

```php
<?php

declare(strict_types=1);

namespace App\Challenges\Rwc\Rwc20241021;

class FeedHelper
{
    public static function getRss(string $url): string
    {
        $xmlData = file_get_contents($url);
        $xml = simplexml_load_string($xmlData);
        return implode(', ', [$xml->channel->title, $xml->channel->link]);
    }
}
```

```php
<?php

declare(strict_types=1);

use App\Challenges\Rwc\Rwc20241021\FeedHelper;
use PHPUnit\Framework\TestCase;

class FeedHelperTest extends TestCase
{
    public function testGetRss(): void
    {
        $this->assertSame(
            'Cassidy Williams, https://cassidoo.co/', 
            FeedHelper::getRss('https://cassidoo.co/rss.xml'),
            'The returned string should be the expected.'
        );

        $this->assertSame(
            'Syntax - Tasty Web Development Treats, https://syntax.fm', 
            FeedHelper::getRss('https://feed.syntax.fm/'),
            'The returned string should be the expected.'
        );
    }
}
```