#!/usr/local/bin/php
<?php

declare(strict_types=1);

use App\Config\CustomConfigReader;
use App\ExampleModule\Facade;
use Gacela\Framework\Config;
use Gacela\Framework\Config\ConfigReader\PhpConfigReader;

require dirname(__DIR__) . '/vendor/autoload.php';

/*
 * This is an example of how can you create your own config reader.
 * The key 'custom' in the ConfigReaders will parse the files found
 * by the gacela.json config:
 * {
 *   "type": "custom",
 *   "path": "config/*.custom"
 * }
 */
Config::setConfigReaders([
    'php' => new PhpConfigReader(),
    'custom' => new CustomConfigReader(),
]);

$facade = new Facade();
$sum = $facade->add(1, 2, 3);

print "The sum: {$sum}" . PHP_EOL;
