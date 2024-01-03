<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Service\Bike;
use App\Service\Motorcycle;

#[AsCommand(
    name: 'rideBike',
    description: 'Take your bike for a ride! takes 2 arguments, how many miles to ride  and what you want to ride motorcycle or bike (m/b)',
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
            ->addArgument('miles', InputArgument::REQUIRED, 'how many miles to ride')
            ->addArgument('type', InputArgument::OPTIONAL, 'm for motorcycle, b for bike');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $miles = $input->getArgument('miles');
        $type = $input->getArgument('type');

        if ($miles) {
            $io->note(sprintf('You passed an argument: %s', $miles));
        }

        if ($type == 'm') {
            $motorCycle = new Motorcycle($io, 2, "VROOOOOOM");
            $motorCycle->start();
            $motorCycle->rideBike($miles);
        } else {
            $bike = new Bike($io, 2, "ding");
            $bike->rideBike($miles);
        }
        $motorCycle->makeNoise();

        return Command::SUCCESS;
    }
}
