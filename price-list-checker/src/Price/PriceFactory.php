<?php

declare(strict_types=1);

namespace App\Price;

use App\Price\Domain\ErrorChecker\PriceFormatErrorChecker;
use App\Price\Domain\Notifier\ChannelInterface;
use App\Price\Domain\Notifier\Notifier;
use App\Price\Domain\NotifierInterface;
use App\Price\Domain\PriceListChecker;
use App\Price\Domain\QueryParams\PriceCheckerQueryParamsFactory;
use App\Price\Domain\QueryParams\PriceCheckerQueryParamsFactoryInterface;
use App\Price\Infrastructure\Notifier\Channel\EmailNotifier;
use App\Price\Infrastructure\Notifier\Channel\FileGeneratorNotifier;
use App\Price\Infrastructure\Repository\PriceRepository;
use Gacela\Framework\AbstractFactory;
use Gacela\Framework\DocBlockResolverAwareTrait;

/**
 * @method PriceRepository getRepository()
 * @method PriceConfig getConfig()
 */
final class PriceFactory extends AbstractFactory
{
    use DocBlockResolverAwareTrait;

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
            $this->getRepository()
        );
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
