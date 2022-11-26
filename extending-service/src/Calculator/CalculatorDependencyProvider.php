<?php

declare(strict_types = 1);

namespace ExtendingService\Calculator;

use ExtendingService\Calculator\Domain\SumOperation;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class CalculatorDependencyProvider extends AbstractDependencyProvider
{
    public const OPERATIONS = 'OPERATIONS';

    public function provideModuleDependencies(Container $container): void
    {
        $container->set(self::OPERATIONS, fn() => [
            new SumOperation(),
        ]);
    }
}
