<?php

declare(strict_types=1);

namespace App\Challenges\Rwc\Rwc20240930;

class StringHelper
{
    public static function split(string $string, string $separator): array
    {
        $index = 0;
        $result = [];

        // Iterate over each character in the string
        for ($i = 0; $i < strlen($string); $i++) {
            // New placeholder
            if (!isset($result[$index])) {
                $result[$index] = '';
            }

            // Special case: If separator empty string, each character on their own
            if ($separator === '') {
                $result[$index] .= $string[$i];
                $index++;
                continue;
            }

            // If not separator, concatenate to the existing placeholder
            if ($string[$i] !== $separator) {
                $result[$index] .= $string[$i];
                continue;
            }

            // If separator, do not concatenate
            // and the next character will go to a new placeholder
            $index++;
        }

        return $result;
    }
}
