#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

exec('bin/console prices:check', $output, $resultCode);
if ($resultCode !== 0) {
    echo 'RESULT_CODE !== 0: ' . $resultCode;
    die;
}

dump($output);
