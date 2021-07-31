<?php

declare(strict_types=1);

namespace App\PriceListChecker\Domain\ErrorChecker;

use App\Price\PriceFacadeInterface;
use App\PriceListChecker\Domain\CheckerErrorsResult;
use App\PriceListChecker\Domain\ErrorCheckerInterface;
use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;

final class PriceFormatErrorChecker implements ErrorCheckerInterface
{
    private PriceFacadeInterface $priceFacade;

    public function __construct(PriceFacadeInterface $priceFacade)
    {
        $this->priceFacade = $priceFacade;
    }

    public function checkErrors(PriceCheckerQueryParams $checkerQueryParams): CheckerErrorsResult
    {
        $errors = $this->buildErrors($checkerQueryParams);
        $content = $this->renderErrors($errors);

        return CheckerErrorsResult::withContent($content);
    }

    /**
     * @return list<string>
     */
    private function buildErrors(PriceCheckerQueryParams $checkerQueryParams): array
    {
        $prices = $this->priceFacade->getPricesWithErrors($checkerQueryParams);

        if (empty($prices)) {
            return [];
        }

        return array_map(
            static fn (PriceTransfer $price): string => sprintf(
                '%s' . PHP_EOL,
                $price->asString()
            ),
            $prices
        );
    }

    /**
     * @param list<string> $errors
     */
    private function renderErrors(array $errors): string
    {
        if (empty($errors)) {
            return '';
        }

        return '> Prices with errors:' . PHP_EOL . implode('', $errors);
    }
}
