<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator\Domain;

final class Calculator
{
    /**
     * @var iterable<OperationInterface>
     */
    private iterable $operations;

    /**
     * @param iterable<OperationInterface> $operations
     */
    public function __construct(iterable $operations)
    {
        $this->operations = $operations;
    }

    public function operate(float ...$numbers): float
    {
        $result = 0.0;
        foreach ($this->operations as $operation) {
            $result = $operation->apply($result, ...$numbers);
        }

        return $result;
    }
}
