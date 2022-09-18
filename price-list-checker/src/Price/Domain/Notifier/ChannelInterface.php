<?php

declare(strict_types=1);

namespace App\Price\Domain\Notifier;

use App\Price\Domain\CheckerErrorsResult;

interface ChannelInterface
{
    public function notify(CheckerErrorsResult ...$errors): void;
}
