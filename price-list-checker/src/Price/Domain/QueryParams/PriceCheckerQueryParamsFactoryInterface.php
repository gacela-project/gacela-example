<?php

declare(strict_types=1);

namespace App\Price\Domain\QueryParams;

use App\Shared\Transfer\PriceCheckerQueryParams;

interface PriceCheckerQueryParamsFactoryInterface
{
    public function createFromArray(array $params): PriceCheckerQueryParams;
}
