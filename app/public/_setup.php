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
        ;
        CREATE TABLE IF NOT EXISTS `db_case` . `poems` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `title` VARCHAR(40) NOT NULL ,
        `poem` VARCHAR(500) NOT NULL ,
        `user_id` INT NOT NULL ,
        PRIMARY KEY (`id`))
        ENGINE = InnoDB
        ;
        ALTER TABLE `poems` 
        ADD FOREIGN KEY 
        (`user_id`) REFERENCES `users`(`id`) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION;
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