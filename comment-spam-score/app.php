#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Comment\CommentFacade;
use Gacela\Framework\Config\GacelaConfigBuilder\ConfigBuilder;
use Gacela\Framework\Gacela;
use Gacela\Framework\Setup\SetupGacela;

$setup = (new SetupGacela())
    ->setConfig(function (ConfigBuilder $configBuilder): void {
        $configBuilder->add('config/*.php', 'config/local.php');
    });

Gacela::bootstrap(__DIR__, $setup);

$facade = new CommentFacade();
$score = $facade->getSpamScore('Lorem ipsum!');

echo sprintf('Spam Score: %d', $score) . PHP_EOL;
