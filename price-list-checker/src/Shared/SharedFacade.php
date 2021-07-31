<?php

declare(strict_types=1);

namespace App\Shared;

use App\Shared\Database\DbConnectionInterface;
use Gacela\Framework\AbstractFacade;

/**
 * @method SharedFactory getFactory()
 */
final class SharedFacade extends AbstractFacade implements SharedFacadeInterface
{
    public function getDbConnection(): DbConnectionInterface
    {
        return $this->getFactory()->getDbConnection();
    }
}
