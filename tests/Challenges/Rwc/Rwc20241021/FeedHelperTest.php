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
