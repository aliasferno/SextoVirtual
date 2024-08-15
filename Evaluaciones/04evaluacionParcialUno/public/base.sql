-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cine
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cine
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cine` DEFAULT CHARACTER SET utf8 ;
USE `cine` ;

-- -----------------------------------------------------
-- Table `cine`.`peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cine`.`peliculas` (
  `pelicula_id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `anio` VARCHAR(20) NOT NULL,
  `director` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`pelicula_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cine`.`actores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cine`.`actores` (
  `actor_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `nacionalidad` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`actor_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cine`.`peliculas_has_actores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cine`.`peliculas_actores` (
  `peliculas_pelicula_id` INT NOT NULL,
  `actores_actor_id` INT NOT NULL,
  PRIMARY KEY (`peliculas_pelicula_id`, `actores_actor_id`),
  INDEX `fk_peliculas_has_actores_actores1_idx` (`actores_actor_id` ASC) VISIBLE,
  INDEX `fk_peliculas_has_actores_peliculas_idx` (`peliculas_pelicula_id` ASC) VISIBLE,
  CONSTRAINT `fk_peliculas_has_actores_peliculas`
    FOREIGN KEY (`peliculas_pelicula_id`)
    REFERENCES `cine`.`peliculas` (`pelicula_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_has_actores_actores1`
    FOREIGN KEY (`actores_actor_id`)
    REFERENCES `cine`.`actores` (`actor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
