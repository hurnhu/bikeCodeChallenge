<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Service\Bike;

#[AsCommand(
    name: 'rideBike',
    description: 'Take your bike for a ride!',
)]
class RideBikeCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
        ->addArgument('miles', InputArgument::OPTIONAL, 'how many miles to ride')
        ->addArgument('type', InputArgument::OPTIONAL, 'm for motorcycle, b for bike')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('miles');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
        $bike = new Bike($io, 2, "ding");
        $bike->makeNoise();
        $bike->rideBike(1);
        
        return Command::SUCCESS;
    }
}
