<?php

declare(strict_types=1);

use App\CustomConfigExample\Domain\CustomConfigReader;
use Gacela\Framework\Bootstrap\GacelaConfig;

return static function (GacelaConfig $config): void {
    $config->addAppConfig('config/*.custom', '', CustomConfigReader::class);
};
