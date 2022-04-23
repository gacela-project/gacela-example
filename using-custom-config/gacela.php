<?php

declare(strict_types=1);

use App\CustomConfigExample\Domain\CustomConfigReader;
use Gacela\Framework\Config\GacelaConfigBuilder\ConfigBuilder;
use Gacela\Framework\Setup\SetupGacela;

return (new SetupGacela())
    ->setConfig(static function (ConfigBuilder $configBuilder): void {
        $configBuilder->add('config/*.custom', '', CustomConfigReader::class);
    });
