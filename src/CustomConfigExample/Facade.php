<?php

declare(strict_types=1);

namespace App\CustomConfigExample;

use Gacela\Framework\AbstractFacade;

/**
 * @method Factory getFactory()
 */
final class Facade extends AbstractFacade
{
    public function add(int ...$numbers): int
    {
        return $this->getFactory()
            ->createAdder()
            ->add(...$numbers);
    }
}
