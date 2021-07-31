<?php

declare(strict_types=1);

namespace App\PriceListChecker\Infrastructure\Notifier\Channel;

use App\PriceListChecker\Domain\CheckerErrorsResult;
use App\PriceListChecker\Domain\Notifier\ChannelInterface;

final class EmailNotifier implements ChannelInterface
{
    public function notify(CheckerErrorsResult ...$errors): void
    {
        if (empty($errors)) {
            return;
        }

        $errorMessages = array_map(static fn (CheckerErrorsResult $e) => $e->content(), $errors);

        // TODO: Use SymfonyMailer component to send the email
        $emailBody = implode('<br>', $errorMessages);
    }
}
