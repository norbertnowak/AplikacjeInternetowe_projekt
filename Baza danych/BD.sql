-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Users` (
  `idUsers` INT NOT NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `e-mail` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsers`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Form`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Form` (
  `idForm` INT NOT NULL,
  `form_name` VARCHAR(45) NULL,
  `active` TINYINT(1) NULL,
  `form_layout` VARCHAR(45) NULL,
  `done` INT NULL,
  `Users_idUsers` INT NOT NULL,
  PRIMARY KEY (`idForm`, `Users_idUsers`),
  INDEX `fk_Form_Users1_idx` (`Users_idUsers` ASC),
  CONSTRAINT `fk_Form_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `mydb`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Questions` (
  `idQuestions` INT NOT NULL,
  `question` VARCHAR(45) NULL,
  `Form_idForm` INT NOT NULL,
  PRIMARY KEY (`idQuestions`, `Form_idForm`),
  INDEX `fk_Questions_Form1_idx` (`Form_idForm` ASC),
  CONSTRAINT `fk_Questions_Form1`
    FOREIGN KEY (`Form_idForm`)
    REFERENCES `mydb`.`Form` (`idForm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Answers` (
  `idAnswers` INT NOT NULL,
  `answer` VARCHAR(45) NULL,
  `selected` INT NULL,
  `Questions_idQuestions` INT NOT NULL,
  PRIMARY KEY (`idAnswers`, `Questions_idQuestions`),
  INDEX `fk_Answers_Questions_idx` (`Questions_idQuestions` ASC),
  CONSTRAINT `fk_Answers_Questions`
    FOREIGN KEY (`Questions_idQuestions`)
    REFERENCES `mydb`.`Questions` (`idQuestions`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
