<?php

namespace AppBundle\Database\Schema;

/**
 * Crea la tabla procesos
 */
class ProcessesTable
{
    protected $name = 'processes';

    public function up()
    {
        return "CREATE TABLE `{$this->name}` (
                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                    `number` char(8) NOT NULL COMMENT 'Numero de proceso.',
                    `description` varchar(200) NOT NULL COMMENT 'Descripción.',
                    `date` date NOT NULL COMMENT 'Fecha de creación.',
                    `city_id` int(11) unsigned DEFAULT NULL COMMENT 'Sede.',
                    `quotation` DECIMAL(10,2) DEFAULT NULL COMMENT 'Presupuesto',

                    PRIMARY KEY (`id`),
                    CONSTRAINT `link_cities` FOREIGN KEY (`city_id`)
                        REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
                COLLATE=utf8_spanish_ci COMMENT='Los procesos cargados por los usuarios.';
                ";
    }

    public function down()
    {
        return "DROP TABLE IF EXISTS `{$this->name}`;";
    }
}
