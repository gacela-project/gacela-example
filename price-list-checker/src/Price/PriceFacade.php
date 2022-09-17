<?php

declare(strict_types=1);

namespace App\Price;

use App\Price\Infrastructure\Repository\PriceRepository;
use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;
use Gacela\Framework\AbstractFacade;
use Gacela\Framework\DocBlockResolverAwareTrait;

/**
 * @method PriceRepository getRepository()
 */
final class PriceFacade extends AbstractFacade implements PriceFacadeInterface
{
    use DocBlockResolverAwareTrait;

    /**
     * @return list<PriceTransfer>
     */
    public function getPricesWithErrors(PriceCheckerQueryParams $checkerQueryParams): array
    {
        return $this->getRepository()
            ->getPricesWithErrors($checkerQueryParams);
    }
}
