-- MySQL Workbench Synchronization
-- Generated: 2021-03-10 17:05
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: RetailAdmin

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `sql_spotify` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`usuaris_premium` (
  `usuari_premium_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30) NOT NULL,
  `passwd` VARCHAR(20) NOT NULL,
  `nom_usuari` VARCHAR(20) NOT NULL,
  `data_naixement` DATE NOT NULL,
  `sexe` ENUM('home', 'dona') NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `codi_postal` INT(5) NOT NULL,
  PRIMARY KEY (`usuari_premium_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`targetes_credit` (
  `numero` VARCHAR(30) NOT NULL,
  `caducitat` DATE NOT NULL,
  `csv` INT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`numero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`usuaris_free` (
  `usuari_free_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30) NOT NULL,
  `passwd` VARCHAR(20) NOT NULL,
  `nom_usuari` VARCHAR(20) NOT NULL,
  `data_naixement` DATE NOT NULL,
  `sexe` ENUM('home', 'dona') NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `codi_postal` INT(5) NOT NULL,
  PRIMARY KEY (`usuari_free_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`suscripcions` (
  `data_inici` DATETIME NOT NULL,
  `data_renovacio` DATETIME NOT NULL,
  `forma_pagament` ENUM('targeta', 'paypal') NOT NULL,
  `usuari_premium_id` INT(11) NOT NULL,
  PRIMARY KEY (`usuari_premium_id`),
  CONSTRAINT `fk_suscripcions_usuaris_premium1`
    FOREIGN KEY (`usuari_premium_id`)
    REFERENCES `sql_spotify`.`usuaris_premium` (`usuari_premium_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`paypals` (
  `nom_usuari` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`nom_usuari`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`pagaments` (
  `data` DATETIME NOT NULL,
  `num_ordre` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `preu_total` FLOAT(11) NOT NULL,
  `paypals_nom_usuari` VARCHAR(20) NULL DEFAULT NULL,
  `targetes_credit_numero` VARCHAR(30) NULL DEFAULT NULL,
  `suscripcions_usuari_premium_id` INT(11) NOT NULL,
  PRIMARY KEY (`num_ordre`),
  INDEX `fk_pagaments_paypals1_idx` (`paypals_nom_usuari` ASC) ,
  INDEX `fk_pagaments_targetes_credit1_idx` (`targetes_credit_numero` ASC) ,
  INDEX `fk_pagaments_suscripcions1_idx` (`suscripcions_usuari_premium_id` ASC) ,
  CONSTRAINT `fk_pagaments_paypals1`
    FOREIGN KEY (`paypals_nom_usuari`)
    REFERENCES `sql_spotify`.`paypals` (`nom_usuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagaments_targetes_credit1`
    FOREIGN KEY (`targetes_credit_numero`)
    REFERENCES `sql_spotify`.`targetes_credit` (`numero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagaments_suscripcions1`
    FOREIGN KEY (`suscripcions_usuari_premium_id`)
    REFERENCES `sql_spotify`.`suscripcions` (`usuari_premium_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`playlists` (
  `playlist_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_playlist` VARCHAR(45) NOT NULL,
  `numero_cançons` INT(10) UNSIGNED NOT NULL,
  `data_creacio` DATETIME NOT NULL,
  `status` ENUM('activa', 'eliminada') NOT NULL,
  `premium_id` INT(11) NULL DEFAULT NULL,
  `free_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`playlist_id`),
  INDEX `fk_playlists_usuaris_premium1_idx` (`premium_id` ASC) ,
  INDEX `fk_playlists_usuaris_free1_idx` (`free_id` ASC) ,
  CONSTRAINT `fk_playlists_usuaris_premium1`
    FOREIGN KEY (`premium_id`)
    REFERENCES `sql_spotify`.`usuaris_premium` (`usuari_premium_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_playlists_usuaris_free1`
    FOREIGN KEY (`free_id`)
    REFERENCES `sql_spotify`.`usuaris_free` (`usuari_free_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`artistes` (
  `artista_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_artista` VARCHAR(45) NOT NULL,
  `imatge_artista` BLOB NULL DEFAULT NULL,
  `artistes_artista_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`artista_id`),
  INDEX `fk_artistes_artistes1_idx` (`artistes_artista_id` ASC) ,
  CONSTRAINT `fk_artistes_artistes1`
    FOREIGN KEY (`artistes_artista_id`)
    REFERENCES `sql_spotify`.`artistes` (`artista_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`albums` (
  `album_id` INT(11) NOT NULL AUTO_INCREMENT,
  `titol` VARCHAR(45) NOT NULL,
  `any` YEAR NOT NULL,
  `portada` BLOB NULL DEFAULT NULL,
  `artistes_artista_id` INT(11) NOT NULL,
  PRIMARY KEY (`album_id`),
  INDEX `fk_albums_artistes1_idx` (`artistes_artista_id` ASC) ,
  CONSTRAINT `fk_albums_artistes1`
    FOREIGN KEY (`artistes_artista_id`)
    REFERENCES `sql_spotify`.`artistes` (`artista_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`cançons` (
  `canço_id` INT(11) NOT NULL AUTO_INCREMENT,
  `titol` VARCHAR(45) NOT NULL,
  `durada` TIME NOT NULL,
  `nombre_reproduccions` VARCHAR(45) NOT NULL,
  `albums_album_id` INT(11) NOT NULL,
  PRIMARY KEY (`canço_id`),
  INDEX `fk_cançons_albums_idx` (`albums_album_id` ASC) ,
  CONSTRAINT `fk_cançons_albums`
    FOREIGN KEY (`albums_album_id`)
    REFERENCES `sql_spotify`.`albums` (`album_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`eliminacio_playlist` (
  `data_eliminacio` DATETIME NOT NULL,
  `playlist_id` INT(11) NOT NULL,
  PRIMARY KEY (`playlist_id`, `data_eliminacio`),
  CONSTRAINT `fk_eliminacio_playlist_playlists1`
    FOREIGN KEY (`playlist_id`)
    REFERENCES `sql_spotify`.`playlists` (`playlist_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`playlists_has_cançons` (
  `playlists_playlist_id` INT(11) NOT NULL,
  `canço_id` INT(11) NOT NULL,
  PRIMARY KEY (`playlists_playlist_id`, `canço_id`),
  INDEX `fk_playlists_has_cançons_cançons1_idx` (`canço_id` ASC) ,
  INDEX `fk_playlists_has_cançons_playlists1_idx` (`playlists_playlist_id` ASC) ,
  CONSTRAINT `fk_playlists_has_cançons_playlists1`
    FOREIGN KEY (`playlists_playlist_id`)
    REFERENCES `sql_spotify`.`playlists` (`playlist_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_playlists_has_cançons_cançons1`
    FOREIGN KEY (`canço_id`)
    REFERENCES `sql_spotify`.`cançons` (`canço_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`favorits` (
  `favorits_id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuari_free_id` INT(11) NULL DEFAULT NULL,
  `usuari_premium_id` INT(11) NULL DEFAULT NULL,
  INDEX `fk_favorits_usuaris_free1_idx` (`usuari_free_id` ASC) ,
  PRIMARY KEY (`favorits_id`),
  INDEX `fk_favorits_usuaris_premium1_idx` (`usuari_premium_id` ASC) ,
  CONSTRAINT `fk_favorits_usuaris_free1`
    FOREIGN KEY (`usuari_free_id`)
    REFERENCES `sql_spotify`.`usuaris_free` (`usuari_free_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorits_usuaris_premium1`
    FOREIGN KEY (`usuari_premium_id`)
    REFERENCES `sql_spotify`.`usuaris_premium` (`usuari_premium_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`favorits_has_albums` (
  `favorits_id` INT(11) NOT NULL,
  `album_id` INT(11) NOT NULL,
  PRIMARY KEY (`favorits_id`, `album_id`),
  INDEX `fk_favorits_has_albums_albums1_idx` (`album_id` ASC) ,
  INDEX `fk_favorits_has_albums_favorits1_idx` (`favorits_id` ASC) ,
  CONSTRAINT `fk_favorits_has_albums_favorits1`
    FOREIGN KEY (`favorits_id`)
    REFERENCES `sql_spotify`.`favorits` (`favorits_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorits_has_albums_albums1`
    FOREIGN KEY (`album_id`)
    REFERENCES `sql_spotify`.`albums` (`album_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_spotify`.`favorits_has_cançons` (
  `favorits_id` INT(11) NOT NULL,
  `canço_id` INT(11) NOT NULL,
  PRIMARY KEY (`favorits_id`, `canço_id`),
  INDEX `fk_favorits_has_cançons_cançons1_idx` (`canço_id` ASC) ,
  INDEX `fk_favorits_has_cançons_favorits1_idx` (`favorits_id` ASC) ,
  CONSTRAINT `fk_favorits_has_cançons_favorits1`
    FOREIGN KEY (`favorits_id`)
    REFERENCES `sql_spotify`.`favorits` (`favorits_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorits_has_cançons_cançons1`
    FOREIGN KEY (`canço_id`)
    REFERENCES `sql_spotify`.`cançons` (`canço_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
