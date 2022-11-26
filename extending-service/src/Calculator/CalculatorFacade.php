<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator;

use Gacela\Framework\AbstractFacade;

/**
 * @method CalculatorFactory getFactory()
 */
final class CalculatorFacade extends AbstractFacade
{
    public function applyOperations(float ...$numbers): float
    {
        return $this->getFactory()
            ->createCalculator()
            ->operate(...$numbers);
    }
}
