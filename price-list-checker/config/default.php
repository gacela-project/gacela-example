<?php

declare(strict_types=1);

use App\Shared\Database\DbCredentials;
use App\Shared\SharedConfig;

return [
    SharedConfig::DB_CREDENTIALS => DbCredentials::fromArray([
        'connection' => '',
        'username' => '',
        'password' => '',
        'characterset' => '',
        'clientId' => 1,
    ]),
];
