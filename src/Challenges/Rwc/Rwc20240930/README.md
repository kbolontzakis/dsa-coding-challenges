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
>
> str.split('');
> ["T", "h", "i", "s", " ", "i", "s", " ", "s", "o", ",", " ", "s", "o", " ", "s", "i", "l", "l", "y", "!"]
>
> str.split(',');
> ["This is so", " so silly!"] 
> ```

## Solution

Split function in PHP.

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