#!/usr/local/bin/php
<?php

declare(strict_types=1);

use App\Adder\Facade;
use App\Config\CustomConfigReader;
use Gacela\Framework\Config;

require dirname(__DIR__) . '/vendor/autoload.php';

/*
 * This is an example of how can you create your own config reader.
 * The key 'custom' in the ConfigReaders is linked to that type in gacela.json:
 * {
 *   "type": "custom",
 *   "path": "config/*.custom"
 * }
 */
Config::setConfigReaders([
    'custom' => new CustomConfigReader(),
]);

# script usage: `php example/adder.php 1 2 3 4 5`

array_shift($argv);
$numbers = array_map(
    static fn (string $n): int => (int)$n,
    array_values($argv)
);

$facade = new Facade();
$sum = $facade->add(...$numbers);

print "The sum: {$sum}" . PHP_EOL;
