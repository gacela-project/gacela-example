<?php

use App\Shared\Database\DbConnectionInterface;
use App\Shared\Database\FakeConnection;
use Gacela\Framework\Bootstrap\GacelaConfig;

return static function (GacelaConfig $config): void {
    $config->addBinding(DbConnectionInterface::class, FakeConnection::class);
};
