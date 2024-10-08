<?php

declare(strict_types=1);

namespace App\Challenges\Rwc\Rwc20241007;

use DateTime;

class PantryItem
{
    public function __construct(
        private int $id,
        private string $ingredient,
        private DateTime $expirationDate
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIngredient(): string
    {
        return $this->ingredient;
    }

    public function isExpired(): bool
    {
        return $this->expirationDate < new DateTime();
    }
}
