<?php

namespace AppBundle\Database\Schema;

use Symfony\Component\Yaml\Yaml;
use PDO;

class InitDb
{
    protected $config;

    protected $con;

    protected $tables = [
        CitiesTable::class,
        ProcessesTable::class,
    ];

    public function __construct()
    {
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        $yaml = file_get_contents('app/config/parameters.yml');
        $parameters = Yaml::parse($yaml);
        $config = $parameters['parameters'];

        try {
            $con = new PDO(
                "mysql:host={$config['database_host']};dbname={$config['database_name']}",
                $config['database_user'],
                $config['database_password'],
                $options
            );

        } catch (\Exception $e) {
            var_dump($e);
            die("Falló la conexión a la base de datos.\n");
        }

        $this->con = $con;

    }

    public function up()
    {
        foreach ($this->tables as $className) {
            // code...
            $table = new $className;
            // var_dump($table->up());
            $exe = $this->con->exec($table->up());

            if(!$exe){
                echo $this->con->errorInfo()[2];
            }

        }
    }

    public function down()
    {
        foreach (array_reverse($this->tables) as $className) {
            // code...
            $table = new $className;
            // var_dump($table->up());
            $exe = $this->con->exec($table->down());

            if(!$exe){
                echo $this->con->errorInfo()[2];
            }
        }
    }
}
