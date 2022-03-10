<?php

declare(strict_types=1);

use App\CustomConfigExample\Domain\CustomConfigReader;
use Gacela\Framework\AbstractConfigGacela;
use Gacela\Framework\Config\GacelaConfigBuilder\ConfigBuilder;

return static fn() => new class() extends AbstractConfigGacela {
    public function config(ConfigBuilder $configBuilder): void
    {
        $configBuilder->add(CustomConfigReader::class, 'config/*.custom');
    }
};
