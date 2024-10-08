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
