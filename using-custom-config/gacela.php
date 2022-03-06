<?php

declare(strict_types=1);

use App\CustomConfigExample\Domain\CustomConfigReader;
use Gacela\Framework\AbstractConfigGacela;

return static fn() => new class() extends AbstractConfigGacela {
    public function config(): array
    {
        return [
            'path' => 'config/*.custom',
            'reader' => CustomConfigReader::class,
        ];
    }
};
