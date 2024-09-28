# Interview question of the week

## Question

([Link to original email](https://buttondown.com/cassidoo/archive/show-me-your-friends-and-ill-show-you-your-future/))

> **You're designing a smart laundry sorting system. You have a list of clothing
> items, each with a color and a fabric type. Sort these items into the minimum
> number of loads n and return n, where items of the same color can be washed
> together, and some different fabric types cannot be mixed together.** "Normal"
> fabric types can be mixed with "heavy", but "delicate" cannot be mixed with
> anything.
>
> Example:
>
> ```js
> let load1 = [
> 	['red', 'normal'],
> 	['blue', 'normal'],
> 	['red', 'delicate'],
> 	['blue', 'heavy'],
> ];
>
> let load2 = [
> 	['white', 'normal'],
> 	['white', 'delicate'],
> 	['white', 'normal'],
> 	['white', 'heavy'],
> ];
>
> minLaundryLoads(load1); // 3; one delicate red, one normal red, and one with the blues
> minLaundryLoads(load2); // 2; one delicate white, one with everything else
> ```

## Solution

1. Group by color: Since different colors cannot be mixed together, we need to first separate the clothing items based on their color.
2. Separate fabric types: Within each color group, separate out delicate items because they cannot be mixed with any other fabric type. Normal and heavy fabrics can be combined.
3. Count the loads: For each color, you will have:
    * One load for delicate items (if there are any).
    * One load for normal + heavy items (combined into one if they exist).

```php
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
```