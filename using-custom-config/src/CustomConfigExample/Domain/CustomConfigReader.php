<?php

declare(strict_types=1);

namespace App\CustomConfigExample\Domain;

use Gacela\Framework\Config\ConfigReaderInterface;

final class CustomConfigReader implements ConfigReaderInterface
{
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
}