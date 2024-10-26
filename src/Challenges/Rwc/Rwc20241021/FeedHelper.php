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
