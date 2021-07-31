<?php

declare(strict_types=1);

namespace App\Shared;

use App\Shared\Database\DbConnectionInterface;
use App\Shared\Database\FakeConnection;
use Gacela\Framework\AbstractFactory;

/**
 * @method SharedConfig getConfig()
 */
final class SharedFactory extends AbstractFactory
{
    private static ?DbConnectionInterface $dbConnection = null;

    public function getDbConnection(): DbConnectionInterface
    {
        if (null === self::$dbConnection) {
            // This commented code is intentional
            // It's to make explicit that you could here define your own DB connection
            // For learning purposes, I decided to use a FakeConnection, so we don't need
            // a real DB to execute the logic behind.
//            self::$dbConnection = MySqlConnection::connect(
//                $this->getConfig()->getDbConnectionCredentials()
//            );
//            self::$dbConnection = OracleConnection::connect(
//                $this->getConfig()->getDbConnectionCredentials()
//            );
            self::$dbConnection = new FakeConnection();
        }

        return self::$dbConnection;
    }
}
