<?php

declare(strict_types=1);

namespace App\Price\Domain;

interface NotifierInterface
{
    public function notify(CheckerErrorsResult ...$errors): void;
}
