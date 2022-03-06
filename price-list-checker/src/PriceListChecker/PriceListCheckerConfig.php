<?php

declare(strict_types=1);

namespace App\PriceListChecker;

use Gacela\Framework\AbstractConfig;

final class PriceListCheckerConfig extends AbstractConfig
{
    public function getAppRootDir(): string
    {
        return parent::getAppRootDir();
    }
}
