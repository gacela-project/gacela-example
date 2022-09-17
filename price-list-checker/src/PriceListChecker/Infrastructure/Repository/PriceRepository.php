<?php

declare(strict_types=1);

namespace App\PriceListChecker\Infrastructure\Repository;

use App\PriceListChecker\Domain\Repository\PriceRepositoryInterface;
use App\Shared\Database\DbConnectionInterface;
use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;

final class PriceRepository implements PriceRepositoryInterface
{
    private DbConnectionInterface $dbConnection;

    public function __construct(DbConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    /**
     * @return list<PriceTransfer>
     */
    public function getPricesWithErrors(PriceCheckerQueryParams $checkerQueryParams): array
    {
        $query = <<<SQL
            SELECT bp.id_base_price as id,
                   bp.description,
                   ap.product_sku,
                   ap.price,
                   ap.currency
            FROM ACTUAL_PRICES ap
            LEFT JOIN BASE_PRICES bp ON (ap.id_actual_price = bp.id_base_price)
            WHERE ap.error_found = 1
            AND ap.updated_at > {$checkerQueryParams->minLastUpdateDate()}
SQL;
        $queryResult = $this->dbConnection->query($query);

        return $this->mapQueryResultToTransfer($queryResult);
    }

    /**
     * @param array<array{id:int, product_sku:string, currency:string, description:string, price:int}> $queryResult
     *
     * @return list<PriceTransfer>
     */
    private function mapQueryResultToTransfer(array $queryResult): array
    {
        return array_map(
            static fn (array $row) => (new PriceTransfer())
                ->setId($row['id'] ?? 0)
                ->setProductSku($row['product_sku'] ?? '')
                ->setCurrency($row['currency'] ?? '')
                ->setDescription($row['description'] ?? '')
                ->setPrice($row['price'] ?? 0),
            $queryResult
        );
    }
}
