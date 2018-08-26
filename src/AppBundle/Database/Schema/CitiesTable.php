<?php

namespace AppBundle\Database\Schema;

class CitiesTable
{
    protected $name = 'cities';

    public function up()
    {
        return "CREATE TABLE `{$this->name}` (
                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(32) NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
                COLLATE=utf8_spanish_ci COMMENT='Las sedes.';
                ";
    }

    public function down()
    {
        return "DROP TABLE IF EXISTS `{$this->name}`;";
    }
}
