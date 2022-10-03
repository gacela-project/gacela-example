#!/usr/bin/env php
<?php

declare(strict_types = 1);

use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Gacela;
use GacelaModuleExample\Customer\CustomerFacade;
use GacelaModuleExample\Shared\CustomerName;

require __DIR__ . '/vendor/autoload.php';

Gacela::bootstrap(__DIR__, static function (GacelaConfig $config) {
    $config->addAppConfig('config/default.php');
    $config->setProjectNamespaces([
        'ResolveDifferentNamespaces',
    ]);
});

$customerFacade = new CustomerFacade();
$nickname = $customerFacade->generateNickname(new CustomerName('first', 'last'));
dump($nickname);
assert('fake and overridden :)' === $nickname);
