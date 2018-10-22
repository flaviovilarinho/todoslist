-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema todoslist
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema todoslist
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `todoslist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `todoslist` ;

-- -----------------------------------------------------
-- Table `todoslist`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todoslist`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(50) NOT NULL COMMENT '',
  `email` VARCHAR(100) NOT NULL COMMENT '',
  `password` VARCHAR(255) NOT NULL COMMENT '',
  `password_reset_token` VARCHAR(255) NULL COMMENT '',
  `auth_key` VARCHAR(32) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `username_UNIQUE` (`username` ASC)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '',
  UNIQUE INDEX `password_reset_token_UNIQUE` (`password_reset_token` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoslist`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todoslist`.`project` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(50) NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_project_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_project_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `todoslist`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoslist`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `todoslist`.`task` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `description` VARCHAR(255) NOT NULL COMMENT '',
  `created_at` DATETIME NOT NULL COMMENT '',
  `done_at` DATETIME NULL COMMENT '',
  `project_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_task_project1_idx` (`project_id` ASC)  COMMENT '',
  CONSTRAINT `fk_task_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `todoslist`.`project` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
