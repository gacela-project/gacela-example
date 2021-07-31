<?php

declare(strict_types=1);

namespace App\Shared\Transfer;

final class PriceCheckerQueryParams
{
    private string $minLastUpdateDate;

    public function __construct(string $minLastUpdateDate)
    {
        $this->minLastUpdateDate = $minLastUpdateDate;
    }

    public function minLastUpdateDate(): string
    {
        return $this->minLastUpdateDate;
    }
}
