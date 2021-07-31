<?php

declare(strict_types=1);

namespace App\Price\Domain\Repository;

use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;

interface PriceRepositoryInterface
{
    /**
     * @return list<PriceTransfer>
     */
    public function getPricesWithErrors(PriceCheckerQueryParams $checkerQueryParams): array;
}
