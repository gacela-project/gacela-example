#!/usr/bin/env php
<?php

declare(strict_types=1);

use Gacela\Framework\Gacela;

require __DIR__ . '/vendor/autoload.php';

Gacela::bootstrap(__DIR__);

exec('bin/console prices:check', $output, $resultCode);
if ($resultCode !== 0) {
    die('RESULT_CODE !== 0: ' . $resultCode);
}

dump($output);
