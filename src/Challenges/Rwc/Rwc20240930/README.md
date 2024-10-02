# Interview question of the week

## Question

([Link to original email](https://buttondown.com/cassidoo/archive/happiness-makes-up-in-height-for-what-it-lacks-in/))

> **Implement your own String** split() function in your preferred programming language.
>
> Example usage:
>
> ```js
> const str = 'This is so, so silly!';
>
> str.split(' ');
> ["This", "is", "so,", "so", "silly!"]

> str.split('');
> ["T", "h", "i", "s", " ", "i", "s", " ", "s", "o", ",", " ", "s", "o", " ", "s", "i", "l", "l", "y", "!"]

> str.split(',');
> ["This is so", " so silly!"] 
> ```

## Solution

1. Group by color: Since different colors cannot be mixed together, we need to first separate the clothing items based on their color.
2. Separate fabric types: Within each color group, separate out delicate items because they cannot be mixed with any other fabric type. Normal and heavy fabrics can be combined.
3. Count the loads: For each color, you will have:
    * One load for delicate items (if there are any).
    * One load for normal + heavy items (combined into one if they exist).

```php
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
```