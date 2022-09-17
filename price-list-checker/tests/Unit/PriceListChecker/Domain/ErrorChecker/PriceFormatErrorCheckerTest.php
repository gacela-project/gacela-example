<?php

declare(strict_types=1);

namespace Unit\PriceListChecker\Domain\ErrorChecker;

use App\Price\PriceRepositoryInterface;
use App\PriceListChecker\Domain\CheckerErrorsResult;
use App\PriceListChecker\Domain\ErrorChecker\PriceFormatErrorChecker;
use App\Shared\Transfer\PriceCheckerQueryParams;
use App\Shared\Transfer\PriceTransfer;
use PHPUnit\Framework\TestCase;

final class PriceFormatErrorCheckerTest extends TestCase
{
    public function test_no_errors(): void
    {
        $checker = new PriceFormatErrorChecker(
            $this->createStub(PriceRepositoryInterface::class)
        );
        $errors = $checker->checkErrors(new PriceCheckerQueryParams('2021-07-31'));

        self::assertEquals('', $errors);
    }

    public function test_errors(): void
    {
        $priceFacade = $this->createStub(PriceRepositoryInterface::class);
        $priceFacade->method('getPricesWithErrors')
            ->willReturn([
                (new PriceTransfer())
                    ->setProductSku('sku-1')
                    ->setPrice(10),
                (new PriceTransfer())
                    ->setProductSku('sku-2')
                    ->setPrice(20),
            ]);

        $checker = new PriceFormatErrorChecker($priceFacade);
        $actual = $checker->checkErrors(new PriceCheckerQueryParams('2021-07-31'));

        $expected = CheckerErrorsResult::withContent(
            <<<'TXT'
> Prices with errors:
Price { productSku: sku-1, price: 10 }
Price { productSku: sku-2, price: 20 }

TXT
        );
        self::assertEquals($expected, $actual);
    }
}
