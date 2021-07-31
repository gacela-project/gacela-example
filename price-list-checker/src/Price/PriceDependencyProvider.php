<?php

declare(strict_types=1);

namespace App\Price;

use App\Shared\SharedFacade;
use App\Shared\SharedFacadeInterface;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class PriceDependencyProvider extends AbstractDependencyProvider
{
    public const DB_CONNECTION = 'DB_CONNECTION';

    public const CLI_PARAMS = 'CLI_PARAMS';

    public function provideModuleDependencies(Container $container): void
    {
        /** @var SharedFacadeInterface $sharedFacade */
        $sharedFacade = $container->getLocator()->get(SharedFacade::class);

        $container->set(self::DB_CONNECTION, $sharedFacade->getDbConnection());
    }
}
