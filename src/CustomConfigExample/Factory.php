<?php

declare(strict_types=1);

namespace App\CustomConfigExample;

use App\CustomConfigExample\Domain\Adder;
use Gacela\Framework\AbstractFactory;

/**
 * @method Config getConfig()
 */
final class Factory extends AbstractFactory
{
    public function createAdder(): Adder
    {
        return new Adder(
            $this->getConfig()->getBaseAdderNumber()
        );
    }
}
