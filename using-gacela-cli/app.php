#!/usr/bin/env php
<?php

declare(strict_types = 1);

use Gacela\Framework\Gacela;

$cwd = __DIR__;
if (!file_exists($autoloadPath = $cwd . '/vendor/autoload.php')) {
    exit("Cannot load composer's autoload file: " . $autoloadPath);
}

require $autoloadPath;

Gacela::bootstrap($cwd);

exec('vendor/bin/gacela make:module    App/FullNameCustomModule', $output);
exec('vendor/bin/gacela make:module -s App/SortNameModule', $output);
dump($output);
