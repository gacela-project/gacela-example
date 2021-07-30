<?php

declare(strict_types=1);

namespace App\Adder;

use App\Adder\Domain\Adder;
use App\Adder\Domain\AdderInterface;
use Gacela\Framework\AbstractFactory;

/**
 * @method Config getConfig()
 */
final class Factory extends AbstractFactory
{
    public function createAdder(): AdderInterface
    {
        return new Adder(
            $this->getConfig()->getBaseAdderNumber()
        );
    }
}
