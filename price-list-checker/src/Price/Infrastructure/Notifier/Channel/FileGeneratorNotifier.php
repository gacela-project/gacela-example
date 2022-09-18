<?php

declare(strict_types=1);

namespace App\Price\Infrastructure\Notifier\Channel;

use App\Price\Domain\CheckerErrorsResult;
use App\Price\Domain\Notifier\ChannelInterface;

final class FileGeneratorNotifier implements ChannelInterface
{
    public const FILENAME = 'price_list_check.txt';

    private string $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    public function notify(CheckerErrorsResult ...$errors): void
    {
        if (empty($errors)) {
            return;
        }

        $errorMessages = array_map(static fn (CheckerErrorsResult $e) => $e->content(), $errors);

        $fileHandler = fopen($this->projectDir . '/' . self::FILENAME, 'wb+');
        fwrite($fileHandler, implode(PHP_EOL, $errorMessages));
        fclose($fileHandler);
    }
}
