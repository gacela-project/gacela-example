<?php

declare(strict_types=1);

namespace App\Shared\Database;

/**
 * This is to avoid the need of a DB connection.
 *
 * Theoretically, the DbConnectionInterface should do the real SQL query, but for learning purposes
 * the FakeConnection returns just an array of hardcoded data.
 *
 * We can do this because the only place where this is used is inside the PriceRepository::getPricesWithErrors().
 */
final class FakeConnection implements DbConnectionInterface
{
    public function query(string $query): array
    {
        return [
            [
                'id' => 1,
                'description' => 'This is a fake product 1',
                'product_sku' => '1111',
                'currency' => 'EUR',
                'price' => 1000,
            ],
            [
                'id' => 2,
                'description' => 'This is a fake product 2',
                'product_sku' => '2222',
                'currency' => 'EUR',
                'price' => 2000,
            ],
            [
                'id' => 3,
                'description' => 'This is a fake product 3',
                'product_sku' => '3333',
                'currency' => 'EUR',
                'price' => 3000,
            ],
            [
                'id' => 4,
                'description' => 'This is a fake product 4',
                'product_sku' => '4444',
                'currency' => 'EUR',
                'price' => 4000,
            ],
        ];
    }
}
