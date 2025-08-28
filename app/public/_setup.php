<?php

require_once "./includes/inc.db.php";

$sql = "
        CREATE TABLE IF NOT EXISTS `db_case` . `users` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `username` VARCHAR(20) NOT NULL UNIQUE,
        `password` VARCHAR(100) NOT NULL,
        PRIMARY KEY (`id`)
        )
        ENGINE = InnoDB
        ";

        try {

            // Exekvera sql-kommando
            $pdo->exec($sql);

            // Om installation lyckas - startsidan
            header('Location: /?install=true');

        } catch (\Throwable $th) {
            echo "An error occured trying to install tables";
        }

        ?>