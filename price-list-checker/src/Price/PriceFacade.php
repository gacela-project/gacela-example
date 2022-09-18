<?php

declare(strict_types=1);

namespace App\Price;

use App\Price\Domain\CheckerErrorsResult;
use Gacela\Framework\AbstractFacade;

/**
 * @method PriceFactory getFactory()
 */
final class PriceFacade extends AbstractFacade
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
