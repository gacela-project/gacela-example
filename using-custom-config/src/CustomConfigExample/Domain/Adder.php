<?php

declare(strict_types=1);

namespace App\CustomConfigExample\Domain;

final class Adder
{
    private int $baseAdderNumber;

    public function __construct(int $baseAdderNumber = 0)
    {
        $this->baseAdderNumber = $baseAdderNumber;
    }

    public function add(int ...$numbers): int
    {
        return $this->baseAdderNumber + array_sum($numbers);
    }
}
