<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator\Domain;

interface OperationInterface
{
    public function apply(float $current, float ...$numbers): float;
}
