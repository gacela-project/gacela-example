<?php

declare(strict_types=1);

namespace App\PriceListChecker\Infrastructure\Command;

use App\PriceListChecker\Domain\PriceListChecker;
use App\PriceListChecker\Domain\QueryParams\PriceCheckerQueryParamsFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class PriceListCheckerCommand extends Command
{
    private PriceListChecker $priceListChecker;

    private PriceCheckerQueryParamsFactory $priceCheckerQueryParamsFactory;

    public function __construct(
        PriceListChecker               $priceListChecker,
        PriceCheckerQueryParamsFactory $priceCheckerQueryParamsFactory
    ) {
        parent::__construct('prices:check');
        $this->priceListChecker = $priceListChecker;
        $this->priceCheckerQueryParamsFactory = $priceCheckerQueryParamsFactory;
    }

    protected function configure(): void
    {
        $this->setDescription('Compare the selling prices with the base prices and notify if there are some potential errors.')
            ->addOption('days', null, InputArgument::OPTIONAL, 'Number of days that you will consider in your prices changes');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<fg=yellow>This is just a "Proof of concept", the data used is from a Fake DB Connection!</>');

        /** @var null|array $options */
        $options = $input->getOptions();

        $checkerQueryParams = $this->priceCheckerQueryParamsFactory
            ->createFromArray($options ?? []);

        $errors = $this->priceListChecker->checkPrices($checkerQueryParams);
        $output->writeln($errors);

        return self::SUCCESS;
    }
}
