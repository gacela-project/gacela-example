<?php

declare(strict_types=1);

namespace App\PriceListChecker;

use Gacela\Framework\AbstractConfig;
use Gacela\Framework\Config as GacelaConfig;

final class PriceListCheckerConfig extends AbstractConfig
{
    public function getAppRootDir(): string
    {
        return GacelaConfig::getInstance()->getApplicationRootDir();
    }
}
