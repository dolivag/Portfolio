-- MySQL Workbench Synchronization
-- Generated: 2021-03-09 19:09
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: RetailAdmin

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `sql_cul_ampolla` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `sql_cul_ampolla`.`proveidors` (
  `proveidors_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `telefon` VARCHAR(30) NULL DEFAULT NULL,
  `fax` VARCHAR(30) NULL DEFAULT NULL,
  `nif` VARCHAR(10) NOT NULL,
  `adreces_id` INT(11) NOT NULL,
  PRIMARY KEY (`proveidors_id`),
  INDEX `fk_proveidors_adreça1_idx` (`adreces_id` ASC) ,
  CONSTRAINT `fk_proveidors_adreça1`
    FOREIGN KEY (`adreces_id`)
    REFERENCES `sql_cul_ampolla`.`adreces` (`adreces_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_cul_ampolla`.`adreces` (
  `adreces_id` INT(11) NOT NULL AUTO_INCREMENT,
  `via` VARCHAR(45) NOT NULL,
  `numero` INT(11) NOT NULL,
  `pis` TINYINT(4) NULL DEFAULT NULL,
  `porta` VARCHAR(3) NULL DEFAULT NULL,
  `ciutat` VARCHAR(30) NULL DEFAULT NULL,
  `codi_postal` VARCHAR(10) NULL DEFAULT NULL,
  `pais` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`adreces_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_cul_ampolla`.`ulleres` (
  `ulleres_id` INT(11) NOT NULL AUTO_INCREMENT,
  `graduacio_vidre_1` TINYINT(4) NOT NULL,
  `graduacio_vidre2` TINYINT(4) NOT NULL,
  `muntura` ENUM("flotant", "pasta", "metallica") NOT NULL,
  `color_muntura` VARCHAR(30) NOT NULL,
  `color_vidre1` VARCHAR(30) NOT NULL,
  `color_vidre2` VARCHAR(30) NOT NULL,
  `preu` FLOAT(11) NOT NULL,
  `marques_id` INT(11) NOT NULL,
  `venda_empleat_id` INT(11) NOT NULL,
  PRIMARY KEY (`ulleres_id`),
  INDEX `fk_ulleres_marques_idx` (`marques_id` ASC) ,
  INDEX `fk_ulleres_empleats1_idx` (`venda_empleat_id` ASC) ,
  CONSTRAINT `fk_ulleres_marques`
    FOREIGN KEY (`marques_id`)
    REFERENCES `sql_cul_ampolla`.`marques` (`marques_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ulleres_empleats1`
    FOREIGN KEY (`venda_empleat_id`)
    REFERENCES `sql_cul_ampolla`.`empleats` (`empleat_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_cul_ampolla`.`clients` (
  `clients_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `telefon` VARCHAR(30) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `data_registre` DATE NOT NULL,
  `adreces_id` INT(11) NOT NULL,
  `clients_clients_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`clients_id`),
  INDEX `fk_clients_adreça1_idx` (`adreces_id` ASC) ,
  INDEX `fk_clients_clients1_idx` (`clients_clients_id` ASC) ,
  CONSTRAINT `fk_clients_adreça1`
    FOREIGN KEY (`adreces_id`)
    REFERENCES `sql_cul_ampolla`.`adreces` (`adreces_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_clients_clients1`
    FOREIGN KEY (`clients_clients_id`)
    REFERENCES `sql_cul_ampolla`.`clients` (`clients_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_cul_ampolla`.`marques` (
  `marques_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `proveidors_id` INT(11) NOT NULL,
  PRIMARY KEY (`marques_id`),
  INDEX `fk_marques_proveidors1_idx` (`proveidors_id` ASC) ,
  CONSTRAINT `fk_marques_proveidors1`
    FOREIGN KEY (`proveidors_id`)
    REFERENCES `sql_cul_ampolla`.`proveidors` (`proveidors_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_cul_ampolla`.`empleats` (
  `empleat_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `telefon` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`empleat_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
