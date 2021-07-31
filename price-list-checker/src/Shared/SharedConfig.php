<?php

declare(strict_types=1);

namespace App\Shared;

use App\Shared\Database\DbCredentials;
use Gacela\Framework\AbstractConfig;

final class SharedConfig extends AbstractConfig
{
    public const DB_CREDENTIALS = 'SharedConfig::DB_CREDENTIALS';

    public function getDbConnectionCredentials(): DbCredentials
    {
        return $this->get(self::DB_CREDENTIALS);
    }
}
