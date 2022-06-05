<?php

declare(strict_types = 1);

namespace App\PriceListChecker;

use App\PriceListChecker\Domain\CheckerErrorsResult;
use App\Shared\Transfer\PriceCheckerQueryParams;
use Gacela\Framework\AbstractFacade;

/**
 * @method PriceListCheckerFactory getFactory()
 */
final class PriceListCheckerFacade extends AbstractFacade
{
    /**
     * @return list<CheckerErrorsResult>
     */
    public function checkPrices(PriceCheckerQueryParams $checkerQueryParams): array
    {
        return $this->getFactory()
            ->createPriceListChecker()
            ->checkPrices($checkerQueryParams);
    }

    public function createQueryParamsFromArray(array $params): PriceCheckerQueryParams
    {
        return $this->getFactory()
            ->createPriceCheckerQueryParamsFactory()
            ->createFromArray($params);
    }
}