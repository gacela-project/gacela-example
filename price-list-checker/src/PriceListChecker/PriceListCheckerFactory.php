<?php

declare(strict_types=1);

namespace App\PriceListChecker;

use App\Price\PriceFacadeInterface;
use App\PriceListChecker\Domain\ErrorChecker\PriceFormatErrorChecker;
use App\PriceListChecker\Domain\Notifier\ChannelInterface;
use App\PriceListChecker\Domain\Notifier\Notifier;
use App\PriceListChecker\Domain\NotifierInterface;
use App\PriceListChecker\Domain\PriceListChecker;
use App\PriceListChecker\Domain\QueryParams\PriceCheckerQueryParamsFactory;
use App\PriceListChecker\Domain\QueryParams\PriceCheckerQueryParamsFactoryInterface;
use App\PriceListChecker\Infrastructure\Notifier\Channel\EmailNotifier;
use App\PriceListChecker\Infrastructure\Notifier\Channel\FileGeneratorNotifier;
use Gacela\Framework\AbstractFactory;

/**
 * @method PriceListCheckerConfig getConfig()
 */
final class PriceListCheckerFactory extends AbstractFactory
{
    public function createPriceListChecker(): PriceListChecker
    {
        return new PriceListChecker(
            [
                $this->createFormatPricingErrorChecker(),
            ],
            $this->createNotifier(),
            $this->createPriceCheckerQueryParamsFactory()
        );
    }

    private function createFormatPricingErrorChecker(): PriceFormatErrorChecker
    {
        return new PriceFormatErrorChecker(
            $this->getPriceFacade()
        );
    }

    private function getPriceFacade(): PriceFacadeInterface
    {
        return $this->getProvidedDependency(PriceListCheckerDependencyProvider::FACADE_PRICE);
    }

    private function createNotifier(): NotifierInterface
    {
        return new Notifier(
            $this->createHtmlFileGeneratorNotifier(),
            $this->createEmailNotifier(),
        );
    }

    private function createHtmlFileGeneratorNotifier(): ChannelInterface
    {
        return new FileGeneratorNotifier(
            $this->getConfig()->getAppRootDir()
        );
    }

    private function createEmailNotifier(): ChannelInterface
    {
        return new EmailNotifier();
    }

    private function createPriceCheckerQueryParamsFactory(): PriceCheckerQueryParamsFactoryInterface
    {
        return new PriceCheckerQueryParamsFactory(date('Y-m-d'));
    }
}
