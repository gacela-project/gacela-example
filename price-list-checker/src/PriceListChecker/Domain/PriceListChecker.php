<?php

declare(strict_types=1);

namespace App\PriceListChecker\Domain;

use App\Shared\Transfer\PriceCheckerQueryParams;

final class PriceListChecker
{
    /** @var list<ErrorCheckerInterface> */
    private array $errorCheckers;

    private NotifierInterface $notifier;

    /**
     * @param list<ErrorCheckerInterface> $errorCheckers
     */
    public function __construct(
        array             $errorCheckers,
        NotifierInterface $notifier
    ) {
        $this->errorCheckers = $errorCheckers;
        $this->notifier = $notifier;
    }

    /**
     * @return list<CheckerErrorsResult>
     */
    public function checkPrices(PriceCheckerQueryParams $checkerQueryParams): array
    {
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
