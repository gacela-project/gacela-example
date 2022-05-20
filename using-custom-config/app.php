#!/usr/bin/env php
<?php

declare(strict_types=1);

use App\CustomConfigExample\Facade as CustomConfigExampleFacade;
use Gacela\Framework\Gacela;

require __DIR__ . '/vendor/autoload.php';

# OPTION A: with gacela.php
Gacela::bootstrap(__DIR__);

# OPTION B: without gacela.php
//$configFn = static function (GacelaConfig $config): void {
//  $config->addAppConfig('config/*.custom', '', CustomConfigReader::class);
//};
//Gacela::bootstrap(__DIR__, $configFn);

# script usage: `app.php 1 2 3 4 5`
# It will start adding from the number specified in the config "base-adder-number = NNN"
# You're using a custom config reader. See above: Config::setConfigReaders(...)

$numbers = getNumbersFromInput($argv);
$facade = new CustomConfigExampleFacade();
$sum = $facade->add(...$numbers);

print "The sum: {$sum}" . PHP_EOL;

/** @return list<int> */
function getNumbersFromInput(array $input): array
{
    array_shift($input);

    return array_map(
        static fn(string $n): int => (int)$n,
        array_values($input)
    );
}





