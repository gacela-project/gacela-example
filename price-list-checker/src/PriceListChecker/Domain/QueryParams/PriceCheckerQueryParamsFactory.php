<?php

declare(strict_types=1);

namespace App\PriceListChecker\Domain\QueryParams;

use App\Shared\Transfer\PriceCheckerQueryParams;

final class PriceCheckerQueryParamsFactory implements PriceCheckerQueryParamsFactoryInterface
{
    private const DEFAULT_MAX_DAYS = 5;

    /** @var string Y-m-d */
    private string $currentDate;

    public function __construct(string $currentDate)
    {
        $this->currentDate = $currentDate;
    }

    public function createFromArray(array $params): PriceCheckerQueryParams
    {
        $minLastDate = $this->extractMinLastDate($params);

        return new PriceCheckerQueryParams($minLastDate);
    }

    private function extractMinLastDate(array $params): string
    {
        $days = (isset($params['days']) && 0 !== (int) $params['days'])
            ? (int) $params['days']
            : self::DEFAULT_MAX_DAYS;

        return date_format(date_sub(
            date_create($this->currentDate),
            date_interval_create_from_date_string($days . ' days')
        ), 'Y-m-d 00:00:00');
    }
}
