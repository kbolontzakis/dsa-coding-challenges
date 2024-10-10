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

        $this->assertSame(
            2, 
            $groceryList->countMissingPantryIngredients(),
            'Count of missing ingredients should be the expected, if all ingredients have not expired yet.'
        );

        $groceryList = new GroceryList($recipe, [
            new PantryItem(1, 'sugar', new DateTime('+5 days')),
            new PantryItem(2, 'butter', new DateTime('-5 days')),
            new PantryItem(3, 'milk', new DateTime('+5 days'))
        ]);

        $this->assertSame(
            3, 
            $groceryList->countMissingPantryIngredients(),
            'Count of missing ingredients should be the expected, if one ingredient has expired.'
        );
    }
}
