<?php

declare(strict_types=1);

namespace App\Shared;

use App\Shared\Database\DbConnectionInterface;

interface SharedFacadeInterface
{
    public function getDbConnection(): DbConnectionInterface;
}
