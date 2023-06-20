<?php

use App\Shared\Database\DbConnectionInterface;
use App\Shared\Database\OracleConnection;
use Gacela\Framework\Bootstrap\GacelaConfig;

return static function (GacelaConfig $config): void {
    $config->addBinding(DbConnectionInterface::class, OracleConnection::class);
};
