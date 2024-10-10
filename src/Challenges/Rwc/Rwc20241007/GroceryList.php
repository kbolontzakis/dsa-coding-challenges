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

    public function countMissingPantryIngredients(): int
    {
        // Create index of existing (not-expired) pantry items
        $index = [];

        foreach ($this->pantryItems as $pantryItem) {
            if (!$pantryItem->isExpired()) {
                $index[$pantryItem->getIngredient()] = true;
            }
        }

        $missingPantryIngredients = [];

        foreach ($this->recipe as $recipeIngredient) {
            if (
                // Existing pantry item, ready to be used
                isset($index[$recipeIngredient]) ||
                // Already in the grocery list
                in_array($recipeIngredient, $missingPantryIngredients)
            ) {
                continue;
            }

            $missingPantryIngredients[] = $recipeIngredient;
        }

        return count($missingPantryIngredients);
    }
}
