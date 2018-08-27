<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use AppBundle\Database\Schema\InitDb;

/**
 * Comando para crear las tabla en la base de datos
 */
class DbInitCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('db:init')
            ->setDescription('Crea las tablas para la base de datos.')
            // ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            // ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $schema = new InitDb();
            $schema->up();

            $output->writeln('Esquema creado.');
        } catch (\Exception $e) {
            var_dump($e);
            $output->writeln('Ocurrió un error al intentar ejecutar las sentencias.');
        }
    }
}
