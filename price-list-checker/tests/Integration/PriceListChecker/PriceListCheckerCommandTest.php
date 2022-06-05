<?php

declare(strict_types=1);

namespace Tests\Integration\PriceListChecker;

use App\PriceListChecker\Infrastructure\Notifier\Channel\FileGeneratorNotifier;
use App\PriceListChecker\PriceListCheckerFactory;
use Gacela\Framework\Gacela;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class PriceListCheckerCommandTest extends TestCase
{
    private const PROJECT_DIR = __DIR__;

    public function setUp(): void
    {
        Gacela::bootstrap(__DIR__);
    }

    public function test_generic_regression_test_using_default_db_connection(): void
    {
        $commandFactory = new PriceListCheckerFactory();
        $command = $commandFactory->createPriceListCheckerCommand();

        $command->run(
            $this->createStub(InputInterface::class),
            $this->createStub(OutputInterface::class),
        );

        $resultFilename = sprintf('%s/%s', self::PROJECT_DIR, FileGeneratorNotifier::FILENAME);
        $actual = file_get_contents($resultFilename);
        unlink($resultFilename);

        $expected = <<<TXT
> Prices with errors:
Price { productSku: 1111, price: 1000 }
Price { productSku: 2222, price: 2000 }
Price { productSku: 3333, price: 3000 }
Price { productSku: 4444, price: 4000 }

TXT;
        self::assertSame($expected, $actual);
    }
}
