<?php

declare(strict_types=1);

namespace App\Shared\Database;

interface DbConnectionInterface
{
    public function query(string $query): array;
}
