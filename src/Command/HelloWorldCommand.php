<?php

namespace App\Command;

use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('demo:hello-world')
            ->addOption('msg', null, InputOption::VALUE_REQUIRED, 'message to display', 'World')
            ->setDescription('Hello, World!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $date = new DateTime('now');
        $output->writeln('Hello,' . $input->getOption('msg') . ' : ' . $date->format('c'));
        return 0;
    }
}
