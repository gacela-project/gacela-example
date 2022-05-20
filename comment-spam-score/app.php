#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Comment\CommentFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;

$configFn = static function (GacelaConfig $config): void {
    $config->addAppConfig('config/*.php', 'config/local.php');
};
Gacela::bootstrap(__DIR__, $configFn);

$facade = new CommentFacade();
$score = $facade->getSpamScore('Lorem ipsum!');

echo sprintf('Spam Score: %d', $score) . PHP_EOL;
