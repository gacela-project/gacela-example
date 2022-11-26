<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator\Domain;

final class SumOperation implements OperationInterface
{
    public function apply(float $current, float ...$numbers): float
    {
        return $current + array_sum($numbers);
    }
}
