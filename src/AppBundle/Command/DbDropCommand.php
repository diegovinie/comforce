<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use AppBundle\Database\Schema\InitDb;

/**
 * Comando para eliminar las tablas de la base de datos
 */
class DbDropCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('db:drop')
            ->setDescription('...')
            // ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            // ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $schema = new InitDb();
            $schema->down();

            $output->writeln('Tablas eliminadas.');

        } catch (\Exception $e) {
            var_dump($e);
            $output->writeln('Ocurrió un error al intentar eliminar las tablas.');
        }



    }

}
