<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator;

use ExtendingService\Calculator\Domain\Calculator;
use Gacela\Framework\AbstractFactory;

final class CalculatorFactory extends AbstractFactory
{
    public function createCalculator(): Calculator
    {
        return new Calculator(
            $this->getProvidedDependency(CalculatorDependencyProvider::OPERATIONS)
        );
    }
}
