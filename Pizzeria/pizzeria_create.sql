-- MySQL Workbench Synchronization
-- Generated: 2021-03-09 15:14
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: RetailAdmin

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `sql_pizzeria` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`localitats` (
  `localitats_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_localitat` VARCHAR(45) NOT NULL,
  `provincies_provincies_id` INT(11) NOT NULL,
  PRIMARY KEY (`localitats_id`),
  INDEX `fk_localitats_provincies_idx` (`provincies_provincies_id` ASC) ,
  CONSTRAINT `fk_localitats_provincies`
    FOREIGN KEY (`provincies_provincies_id`)
    REFERENCES `sql_pizzeria`.`provincies` (`provincies_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`provincies` (
  `provincies_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_provincia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`provincies_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`comandes` (
  `comandes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipus` ENUM('botiga', 'domicili') NOT NULL,
  `data_comanda` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_id` INT(11) NOT NULL,
  `num_begudes` VARCHAR(3) NULL DEFAULT NULL,
  `num_hamburgueses` VARCHAR(3) NULL DEFAULT NULL,
  `num_pizzes` VARCHAR(3) NULL DEFAULT NULL,
  `preu_total` FLOAT(11) NOT NULL,
  `botigues_botigues_id` INT(11) NOT NULL,
  PRIMARY KEY (`comandes_id`),
  INDEX `fk_comandes_clients1_idx` (`client_id` ASC) ,
  INDEX `fk_comandes_botigues1_idx` (`botigues_botigues_id` ASC) ,
  CONSTRAINT `fk_comandes_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `sql_pizzeria`.`clients` (`clients_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comandes_botigues1`
    FOREIGN KEY (`botigues_botigues_id`)
    REFERENCES `sql_pizzeria`.`botigues` (`botigues_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`clients` (
  `clients_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `cognoms` VARCHAR(45) NOT NULL,
  `adreça` VARCHAR(45) NOT NULL,
  `codi_postal` INT(5) NOT NULL,
  `telefon` VARCHAR(45) NOT NULL,
  `localitat_id` INT(11) NOT NULL,
  PRIMARY KEY (`clients_id`),
  INDEX `fk_clients_localitats1_idx` (`localitat_id` ASC) ,
  CONSTRAINT `fk_clients_localitats1`
    FOREIGN KEY (`localitat_id`)
    REFERENCES `sql_pizzeria`.`localitats` (`localitats_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`botigues` (
  `botigues_id` INT(11) NOT NULL AUTO_INCREMENT,
  `adreça` VARCHAR(45) NOT NULL,
  `codi_postal` INT(5) NOT NULL,
  `localitat_id` INT(11) NOT NULL,
  PRIMARY KEY (`botigues_id`),
  INDEX `fk_botigues_localitats1_idx` (`localitat_id` ASC) ,
  CONSTRAINT `fk_botigues_localitats1`
    FOREIGN KEY (`localitat_id`)
    REFERENCES `sql_pizzeria`.`localitats` (`localitats_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`empleats` (
  `empleats_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `cognoms` VARCHAR(45) NOT NULL,
  `nif` VARCHAR(10) NOT NULL,
  `telefon` VARCHAR(45) NOT NULL,
  `lloc_de_feina` ENUM('cuiner', 'repartidor') NOT NULL,
  `botiga_id` INT(11) NOT NULL,
  PRIMARY KEY (`empleats_id`),
  INDEX `fk_empleats_botigues1_idx` (`botiga_id` ASC) ,
  CONSTRAINT `fk_empleats_botigues1`
    FOREIGN KEY (`botiga_id`)
    REFERENCES `sql_pizzeria`.`botigues` (`botigues_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`categories_pizza` (
  `categories_pizza_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`categories_pizza_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`pizzes` (
  `pizzes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_producte` VARCHAR(45) NOT NULL,
  `descripcio` MEDIUMTEXT NOT NULL,
  `imatge` BLOB NULL DEFAULT NULL,
  `categories_pizza_id` INT(11) NOT NULL,
  `preu_article` FLOAT(11) NOT NULL,
  PRIMARY KEY (`pizzes_id`),
  INDEX `fk_pizzes_categories_pizza1_idx` (`categories_pizza_id` ASC) ,
  CONSTRAINT `fk_pizzes_categories_pizza1`
    FOREIGN KEY (`categories_pizza_id`)
    REFERENCES `sql_pizzeria`.`categories_pizza` (`categories_pizza_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`hamburgueses` (
  `pizzes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_producte` VARCHAR(45) NOT NULL,
  `descripcio` MEDIUMTEXT NOT NULL,
  `imatge` BLOB NULL DEFAULT NULL,
  `preu_article` FLOAT(11) NOT NULL,
  PRIMARY KEY (`pizzes_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`begudes` (
  `begudes_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_producte` VARCHAR(45) NOT NULL,
  `descripcio` MEDIUMTEXT NOT NULL,
  `imatge` BLOB NULL DEFAULT NULL,
  `preu_article` FLOAT(11) NOT NULL,
  PRIMARY KEY (`begudes_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_pizzeria`.`lliurament` (
  `lliurament_id` INT(11) NOT NULL AUTO_INCREMENT,
  `data_lliurament` DATETIME NOT NULL,
  `empleat_id` INT(11) NOT NULL,
  `comanda_id` INT(11) NOT NULL,
  PRIMARY KEY (`lliurament_id`),
  INDEX `fk_lliurament_empleats1_idx` (`empleat_id` ASC) ,
  INDEX `fk_lliurament_comandes1_idx` (`comanda_id` ASC) ,
  CONSTRAINT `fk_lliurament_empleats1`
    FOREIGN KEY (`empleat_id`)
    REFERENCES `sql_pizzeria`.`empleats` (`botiga_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lliurament_comandes1`
    FOREIGN KEY (`comanda_id`)
    REFERENCES `sql_pizzeria`.`comandes` (`comandes_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
