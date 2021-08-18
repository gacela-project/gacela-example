<?php

declare(strict_types=1);

use Gacela\Framework\AbstractConfigGacela;

return static function (): AbstractConfigGacela {
    return new class() extends AbstractConfigGacela {
        public function config(): array
        {
            return [
                'type' => 'custom',
                'path' => 'config/*',
            ];
        }
    };
};
