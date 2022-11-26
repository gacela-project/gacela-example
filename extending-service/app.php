#!/usr/bin/env php
<?php

declare(strict_types = 1);

use ExtendingService\Calculator\CalculatorDependencyProvider;
use ExtendingService\Calculator\CalculatorFacade;
use ExtendingService\Calculator\Domain\ProductOperation;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;

require __DIR__ . '/vendor/autoload.php';

Gacela::bootstrap(__DIR__, static function (GacelaConfig $config) {
    $config->extendService(
        CalculatorDependencyProvider::OPERATIONS,
        static function (array &$arrayObject): void {
            $arrayObject[] = new ProductOperation();
        }
    );
});

$facade = new CalculatorFacade();
$result = $facade->applyOperations(5, 5);
dump($result);
/**
 * It applies:
 * - SumOperation     [defined in CalculatorDependencyProvider class]
 * - ProductOperation [defined in extendService() method ☝️line 18]
 *
 * 5+5(=10) * 5*5(=25) = 250
 */
assert($result === 250.0);
