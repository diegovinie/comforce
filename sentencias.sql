-- Estas sentencias son derivadas de:
-- src/AppBundle/Database/Schema

CREATE TABLE `cities` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `name` varchar(32) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        COLLATE=utf8_spanish_ci COMMENT='Las sedes.';

CREATE TABLE `processes` (
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
