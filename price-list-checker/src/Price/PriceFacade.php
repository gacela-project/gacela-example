<?php

declare(strict_types=1);

namespace App\Price;

use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;
use Gacela\Framework\AbstractFacade;

/**
 * @method PriceFactory getFactory()
 */
final class PriceFacade extends AbstractFacade implements PriceFacadeInterface
{
    /**
     * @return list<PriceTransfer>
     */
    public function getPricesWithErrors(PriceCheckerQueryParams $checkerQueryParams): array
    {
        return $this->getFactory()
            ->createCountryRepository()
            ->getPricesWithErrors($checkerQueryParams);
    }
}
