<?php

declare(strict_types=1);

namespace App\Price\Domain;

use App\Shared\Transfer\PriceCheckerQueryParams;

interface ErrorCheckerInterface
{
    public function checkErrors(PriceCheckerQueryParams $checkerQueryParams): CheckerErrorsResult;
}
