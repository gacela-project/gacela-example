<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator\Domain;

final class ProductOperation implements OperationInterface
{
    public function apply(float $current, float ...$numbers): float
    {
        return $current * array_product($numbers);
    }
}
