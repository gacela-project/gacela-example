<?php

declare(strict_types=1);

namespace App\PriceListChecker\Domain;

use App\PriceListChecker\Domain\QueryParams\PriceCheckerQueryParamsFactoryInterface;

final class PriceListChecker
{
    /** @var list<ErrorCheckerInterface> */
    private array $errorCheckers;

    private NotifierInterface $notifier;

    private PriceCheckerQueryParamsFactoryInterface $checkerQueryParamsFactory;

    /**
     * @param list<ErrorCheckerInterface> $errorCheckers
     */
    public function __construct(
        array $errorCheckers,
        NotifierInterface $notifier,
        PriceCheckerQueryParamsFactoryInterface $checkerQueryParamsFactory
    ) {
        $this->errorCheckers = $errorCheckers;
        $this->notifier = $notifier;
        $this->checkerQueryParamsFactory = $checkerQueryParamsFactory;
    }

    /**
     * @return list<CheckerErrorsResult>
     */
    public function checkPrices(array $options): array
    {
        $checkerQueryParams = $this->checkerQueryParamsFactory->createFromArray($options);

        /** @var list<CheckerErrorsResult> $errors */
        $errors = [];

        foreach ($this->errorCheckers as $errorChecker) {
            $priceListErrors = $errorChecker->checkErrors($checkerQueryParams);

            if (!$priceListErrors->isEmpty()) {
                $errors[] = $priceListErrors;
            }
        }

        if (!empty($errors)) {
            $this->notifier->notify(...$errors);
        }

        return $errors;
    }
}
