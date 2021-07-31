<?php

declare(strict_types=1);

namespace App\PriceListChecker\Domain\Notifier;

use App\PriceListChecker\Domain\CheckerErrorsResult;

interface ChannelInterface
{
    public function notify(CheckerErrorsResult ...$errors): void;
}
