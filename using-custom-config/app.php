#!/usr/bin/env php
<?php

declare(strict_types=1);

use App\CustomConfigExample\Facade as CustomConfigExampleFacade;
use Gacela\Framework\Config;
use Gacela\Framework\Config\ConfigReaderInterface;

require __DIR__ . '/vendor/autoload.php';

/*
 * This is an example of how can you create your own config reader.
 * The key 'custom' in the ConfigReaders is linked to that type in gacela.json:
 * {
 *   "type": "custom",
 *   "path": "config/*.custom"
 * }
 */
Config::setConfigReaders([
    'custom' => new class() implements ConfigReaderInterface {
        public function read(string $absolutePath): array
        {
            $config = [];
            $lines = file($absolutePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                [$name, $value] = explode('=', $line, 2);
                $config[trim($name)] = trim($value);
            }

            return $config;
        }

        public function canRead(string $absolutePath): bool
        {
            return false !== mb_strpos($absolutePath, '.custom');
        }
    },
]);

# script usage: `bin/add 1 2 3 4 5`
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





