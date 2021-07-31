<?php

declare(strict_types=1);

namespace App\Price;

use App\Price\Domain\Repository\PriceRepositoryInterface;
use App\Price\Infrastructure\Repository\PriceRepository;
use Gacela\Framework\AbstractFactory;

final class PriceFactory extends AbstractFactory
{
    public function createCountryRepository(): PriceRepositoryInterface
    {
        return new PriceRepository(
            $this->getProvidedDependency(PriceDependencyProvider::DB_CONNECTION)
        );
    }
}
