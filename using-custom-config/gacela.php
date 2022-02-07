<?php

declare(strict_types=1);

use App\CustomConfigExample\Domain\CustomConfigReader;
use Gacela\Framework\AbstractConfigGacela;

return static fn() => new class() extends AbstractConfigGacela {
    public function config(): array
    {
        return [
            'type' => 'custom',
            'path' => 'config/*.custom',
        ];
    }

    public function configReaders(): array
    {
        return [
            'custom' => new CustomConfigReader()
        ];
    }
};
