<?php

declare(strict_types=1);

namespace App\Price;

use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;

interface PriceFacadeInterface
{
    /**
     * @return list<PriceTransfer>
     */
    public function getPricesWithErrors(PriceCheckerQueryParams $checkerQueryParams): array;
}
