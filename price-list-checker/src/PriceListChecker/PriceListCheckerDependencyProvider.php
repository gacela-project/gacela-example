<?php

declare(strict_types=1);

namespace App\PriceListChecker;

use App\Price\PriceFacade;
use App\Price\PriceFacadeInterface;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

/**
 * @method PriceListCheckerConfig getConfig()
 */
class PriceListCheckerDependencyProvider extends AbstractDependencyProvider
{
    public const FACADE_PRICE = 'FACADE_PRICE';

    public function provideModuleDependencies(Container $container): void
    {
        $this->addPriceFacade($container);
    }

    private function addPriceFacade(Container $container): void
    {
        $container->set(self::FACADE_PRICE, function (Container $container): PriceFacadeInterface {
            return $container->getLocator()->get(PriceFacade::class);
        });
    }
}
