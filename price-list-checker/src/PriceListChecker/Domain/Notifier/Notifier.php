<?php

declare(strict_types=1);

namespace App\PriceListChecker\Domain\Notifier;

use App\PriceListChecker\Domain\CheckerErrorsResult;
use App\PriceListChecker\Domain\NotifierInterface;

final class Notifier implements NotifierInterface
{
    /** @var list<ChannelInterface> */
    private array $channels;

    public function __construct(ChannelInterface ...$channels)
    {
        $this->channels = $channels;
    }

    public function notify(CheckerErrorsResult ...$errors): void
    {
        foreach ($this->channels as $channel) {
            $channel->notify(...$errors);
        }
    }
}
