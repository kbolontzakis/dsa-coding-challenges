<?php

declare(strict_types=1);

namespace App\Challenges\Rwc\Rwc20240922;

class LaundrySorter
{
    public static function minLaundryLoads($clothes): int
    {
        // Step 1: Group clothes by color and fabric type
        $colorGroups = [];

        foreach ($clothes as $item) {
            [$color, $fabric] = $item;

            if (!isset($colorGroups[$color])) {
                $colorGroups[$color] = ['normalHeavy' => 0, 'delicate' => 0];
            }

            if ($fabric === 'delicate') {
                $colorGroups[$color]['delicate']++;
            } else {
                $colorGroups[$color]['normalHeavy']++;
            }
        }

        // Step 2: Count the number of loads
        $loads = 0;

        foreach ($colorGroups as $fabrics) {
            if ($fabrics['delicate'] > 0) {
                $loads++; // One load for delicate
            }
            if ($fabrics['normalHeavy'] > 0) {
                $loads++; // One load for normal + heavy
            }
        }

        return $loads;
    }
}
