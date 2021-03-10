-- MySQL Workbench Synchronization
-- Generated: 2021-03-09 17:28
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: RetailAdmin

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `sql_youtube` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`usuaris` (
  `usuari_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(30) NOT NULL,
  `passwd` VARCHAR(15) NOT NULL,
  `nom_usuari` VARCHAR(15) NOT NULL,
  `data_naixement` DATE NOT NULL,
  `sexe` ENUM('home', 'dona') NOT NULL,
  `pais` VARCHAR(15) NOT NULL,
  `codi_postal` INT(5) NOT NULL,
  PRIMARY KEY (`usuari_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`videos` (
  `video_id` INT(11) NOT NULL AUTO_INCREMENT,
  `titol` VARCHAR(45) NOT NULL,
  `descripcio` TINYTEXT NOT NULL,
  `grandaria` VARCHAR(9) NOT NULL,
  `nom_arxiu` VARCHAR(45) NOT NULL,
  `durada` TIME NOT NULL,
  `thumbnail` BLOB NULL DEFAULT NULL,
  `reproduccions` BIGINT(19) UNSIGNED NOT NULL,
  `likes` BIGINT(19) UNSIGNED NOT NULL,
  `dislikes` BIGINT(19) UNSIGNED NOT NULL,
  `estat` ENUM('public', 'ocult', 'privat') NOT NULL,
  `canals_canal_id` INT(11) NOT NULL,
  PRIMARY KEY (`video_id`),
  INDEX `fk_videos_canals1_idx` (`canals_canal_id` ASC) ,
  CONSTRAINT `fk_videos_canals1`
    FOREIGN KEY (`canals_canal_id`)
    REFERENCES `sql_youtube`.`canals` (`canal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`etiquetes` (
  `etiqueta_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`etiqueta_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`video_has_etiquetes` (
  `etiqueta_id` INT(11) NOT NULL,
  `video_id` INT(11) NOT NULL,
  INDEX `fk_video_has_etiquetes_etiquetes_idx` (`etiqueta_id` ASC) ,
  INDEX `fk_video_has_etiquetes_videos1_idx` (`video_id` ASC) ,
  PRIMARY KEY (`etiqueta_id`, `video_id`),
  CONSTRAINT `fk_video_has_etiquetes_etiquetes`
    FOREIGN KEY (`etiqueta_id`)
    REFERENCES `sql_youtube`.`etiquetes` (`etiqueta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_video_has_etiquetes_videos1`
    FOREIGN KEY (`video_id`)
    REFERENCES `sql_youtube`.`videos` (`video_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`usuaris_has_videos` (
  `videos_video_id` INT(11) NOT NULL,
  `usuaris_usuari_id` INT(11) NOT NULL,
  `data_publicacio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_usuaris_has_videos_videos1_idx` (`videos_video_id` ASC) ,
  INDEX `fk_usuaris_has_videos_usuaris1_idx` (`usuaris_usuari_id` ASC) ,
  PRIMARY KEY (`videos_video_id`, `usuaris_usuari_id`),
  CONSTRAINT `fk_usuaris_has_videos_videos1`
    FOREIGN KEY (`videos_video_id`)
    REFERENCES `sql_youtube`.`videos` (`video_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuaris_has_videos_usuaris1`
    FOREIGN KEY (`usuaris_usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`canals` (
  `canal_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_canal` VARCHAR(30) NOT NULL,
  `descripcio_canal` TINYTEXT NOT NULL,
  `data_creacio` DATE NOT NULL,
  `usuari_id` INT(11) NOT NULL,
  PRIMARY KEY (`canal_id`),
  INDEX `fk_canals_usuaris1_idx` (`usuari_id` ASC) ,
  CONSTRAINT `fk_canals_usuaris1`
    FOREIGN KEY (`usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`subscripcio` (
  `usuari_id` INT(11) NOT NULL,
  `canal_id` INT(11) NOT NULL,
  INDEX `fk_subscripcio_usuaris1_idx` (`usuari_id` ASC) ,
  INDEX `fk_subscripcio_canals1_idx` (`canal_id` ASC) ,
  PRIMARY KEY (`usuari_id`, `canal_id`),
  CONSTRAINT `fk_subscripcio_usuaris1`
    FOREIGN KEY (`usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscripcio_canals1`
    FOREIGN KEY (`canal_id`)
    REFERENCES `sql_youtube`.`canals` (`canal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`reaccions` (
  `usuaris_usuari_id` INT(11) NOT NULL,
  `videos_video_id` INT(11) NOT NULL,
  `tipus_reacció` ENUM('like', 'dislike') NOT NULL,
  INDEX `fk_reaccio_usuaris1_idx` (`usuaris_usuari_id` ASC) ,
  INDEX `fk_reaccio_videos1_idx` (`videos_video_id` ASC) ,
  PRIMARY KEY (`usuaris_usuari_id`, `videos_video_id`),
  CONSTRAINT `fk_reaccio_usuaris1`
    FOREIGN KEY (`usuaris_usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reaccio_videos1`
    FOREIGN KEY (`videos_video_id`)
    REFERENCES `sql_youtube`.`videos` (`video_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`playlists` (
  `playlist_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_playlist` VARCHAR(30) NOT NULL,
  `data_creacio` DATE NOT NULL,
  `estat` ENUM('publica', 'privada') NOT NULL,
  `usuari_id` INT(11) NOT NULL,
  PRIMARY KEY (`playlist_id`),
  INDEX `fk_playlists_usuaris1_idx` (`usuari_id` ASC) ,
  CONSTRAINT `fk_playlists_usuaris1`
    FOREIGN KEY (`usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`comentaris` (
  `comentari_id` INT(11) NOT NULL AUTO_INCREMENT,
  `text_comentari` TEXT NOT NULL,
  `data_comentari` DATETIME NOT NULL,
  `usuari_id` INT(11) NOT NULL,
  `videos_video_id` INT(11) NOT NULL,
  PRIMARY KEY (`comentari_id`),
  INDEX `fk_comentaris_usuaris1_idx` (`usuari_id` ASC) ,
  INDEX `fk_comentaris_videos1_idx` (`videos_video_id` ASC) ,
  CONSTRAINT `fk_comentaris_usuaris1`
    FOREIGN KEY (`usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentaris_videos1`
    FOREIGN KEY (`videos_video_id`)
    REFERENCES `sql_youtube`.`videos` (`video_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`reaccions_comentaris` (
  `tipus_reaccio_comentari` ENUM('magrada', 'no_magrada') NOT NULL,
  `usuari_id` INT(11) NOT NULL,
  `comentari_id` INT(11) NOT NULL,
  `data_reaccio` DATETIME NOT NULL,
  INDEX `fk_reaccions_comentaris_usuaris1_idx` (`usuari_id` ASC) ,
  INDEX `fk_reaccions_comentaris_comentaris1_idx` (`comentari_id` ASC) ,
  PRIMARY KEY (`usuari_id`, `comentari_id`),
  CONSTRAINT `fk_reaccions_comentaris_usuaris1`
    FOREIGN KEY (`usuari_id`)
    REFERENCES `sql_youtube`.`usuaris` (`usuari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reaccions_comentaris_comentaris1`
    FOREIGN KEY (`comentari_id`)
    REFERENCES `sql_youtube`.`comentaris` (`comentari_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `sql_youtube`.`videos_has_playlists` (
  `videos_video_id` INT(11) NOT NULL,
  `playlists_playlist_id` INT(11) NOT NULL,
  PRIMARY KEY (`videos_video_id`, `playlists_playlist_id`),
  INDEX `fk_videos_has_playlists_playlists1_idx` (`playlists_playlist_id` ASC) ,
  INDEX `fk_videos_has_playlists_videos1_idx` (`videos_video_id` ASC) ,
  CONSTRAINT `fk_videos_has_playlists_videos1`
    FOREIGN KEY (`videos_video_id`)
    REFERENCES `sql_youtube`.`videos` (`video_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_videos_has_playlists_playlists1`
    FOREIGN KEY (`playlists_playlist_id`)
    REFERENCES `sql_youtube`.`playlists` (`playlist_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
