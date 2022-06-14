<?php

declare(strict_types=1);

namespace App\PriceListChecker;

use App\PriceListChecker\Domain\CheckerErrorsResult;
use Gacela\Framework\AbstractFacade;

/**
 * @method PriceListCheckerFactory getFactory()
 */
final class PriceListCheckerFacade extends AbstractFacade
{
    /**
     * @return list<CheckerErrorsResult>
     */
    public function checkPrices(array $options): array
    {
        return $this->getFactory()
            ->createPriceListChecker()
            ->checkPrices($options);
    }
}
