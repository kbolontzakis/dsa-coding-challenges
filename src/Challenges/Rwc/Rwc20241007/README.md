# Interview question of the week

## Question

([Link to original email](https://buttondown.com/cassidoo/archive/its-very-easy-to-be-judgmental-until-you-know/))

> **Given a list of ingredients needed for a recipe, represented as
> strings, and a list of ingredients you have in your pantry, write
> a function to return the minimum number of additional ingredients
> you need to buy to make the recipe.** If you want to do some extra
> credit, add expiration dates to the pantry items, and only account
> for food that isn't expired.
>
> Example:
>
> ```
> Input:
> recipe = ["eggs", "flour", "sugar", "butter"]
> pantry = ["sugar", "butter", "milk"]  
>
> Output:
> 2
> ```

## Solution

1. Create a list of the current ingredients at our pantry, excluding the expired ones.
2. Go through the recipe ingredients and create a list of unique missing ingredients.
3. Count the missing ingredients.

```php
<?php

declare(strict_types=1);

namespace App\Challenges\Rwc\Rwc20241007;

class GroceryList
{
    public function __construct(
        private array $recipe,
        private array $pantryItems
    ) {
    }

    public function getMissingPantryIngredients(): array
    {
        $index = [];

        foreach ($this->pantryItems as $pantryItem) {
            if (!$pantryItem->isExpired()) {
                $index[$pantryItem->getIngredient()] = true;
            }
        }

        $missingItems = [];

        foreach ($this->recipe as $recipeIngredient) {
            if (!isset($index[$recipeIngredient]) && !in_array($recipeIngredient, $missingItems)) {
                $missingItems[] = $recipeIngredient;
            }
        }

        return $missingItems;
    }
}
```

```php
<?php

declare(strict_types=1);

use App\Challenges\Rwc\Rwc20241007\GroceryList;
use App\Challenges\Rwc\Rwc20241007\PantryItem;
use PHPUnit\Framework\TestCase;

class GroceryListTest extends TestCase
{
    public function testCountMissingPantryItems(): void
    {
        $recipe = ['eggs', 'flour', 'sugar', 'butter'];

        $groceryList = new GroceryList($recipe, [
            new PantryItem(1, 'sugar', new DateTime('+5 days')),
            new PantryItem(2, 'butter', new DateTime('+5 days')),
            new PantryItem(3, 'milk', new DateTime('+5 days'))
        ]);

        $this->assertCount(
            2, 
            $groceryList->getMissingPantryIngredients(),
            'Count of missing ingredients should be the expected, if all ingredients have not expired yet.'
        );

        $groceryList = new GroceryList($recipe, [
            new PantryItem(1, 'sugar', new DateTime('+5 days')),
            new PantryItem(2, 'butter', new DateTime('-5 days')),
            new PantryItem(3, 'milk', new DateTime('+5 days'))
        ]);

        $this->assertCount(
            3, 
            $groceryList->getMissingPantryIngredients(),
            'Count of missing ingredients should be the expected, if one ingredient has expired.'
        );
    }
}
```