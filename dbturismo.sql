SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `dbTurismo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dbTurismo` ;

-- -----------------------------------------------------
-- Table `dbTurismo`.`departamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`departamento` (
  `iddepartamento` INT NOT NULL AUTO_INCREMENT ,
  `nom_departamento` VARCHAR(60) NULL ,
  PRIMARY KEY (`iddepartamento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`provincia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`provincia` (
  `idprovincia` INT NOT NULL AUTO_INCREMENT ,
  `nom_provincia` VARCHAR(60) NOT NULL ,
  `iddepartamento` INT NOT NULL ,
  PRIMARY KEY (`idprovincia`) ,
  INDEX `departamento1_idx` (`iddepartamento` ASC) ,
  CONSTRAINT `departamento1`
    FOREIGN KEY (`iddepartamento` )
    REFERENCES `dbTurismo`.`departamento` (`iddepartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`lugar_turistico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`lugar_turistico` (
  `idlugar_turistico` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(500) NULL ,
  `imagen` VARCHAR(60) NULL ,
  `idprovincia` INT NOT NULL ,
  PRIMARY KEY (`idlugar_turistico`) ,
  INDEX `provincia_idx` (`idprovincia` ASC) ,
  CONSTRAINT `provincia`
    FOREIGN KEY (`idprovincia` )
    REFERENCES `dbTurismo`.`provincia` (`idprovincia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`hoteles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`hoteles` (
  `idhoteles` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `direccion` VARCHAR(90) NOT NULL ,
  `imagen` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `idlugar_turistico` INT NOT NULL ,
  PRIMARY KEY (`idhoteles`) ,
  INDEX `lugar_turistico2_idx` (`idlugar_turistico` ASC) ,
  CONSTRAINT `lugar_turistico2`
    FOREIGN KEY (`idlugar_turistico` )
    REFERENCES `dbTurismo`.`lugar_turistico` (`idlugar_turistico` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`agencias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`agencias` (
  `idagencias` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(60) NOT NULL ,
  `direccion` VARCHAR(60) NOT NULL ,
  `descripcion` VARCHAR(100) NULL ,
  `imagen` VARCHAR(45) NULL ,
  `email` VARCHAR(60) NULL ,
  `idusuario` INT NOT NULL ,
  PRIMARY KEY (`idagencias`) ,
  INDEX `usuario1_idx` (`idusuario` ASC) ,
  CONSTRAINT `usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `dbTurismo`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`paquete`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`paquete` (
  `idpaquete` INT NOT NULL AUTO_INCREMENT ,
  `precio` DOUBLE NOT NULL ,
  `num_persona` INT NOT NULL ,
  `descuento` DOUBLE NOT NULL ,
  `idlugar_turistico` INT NOT NULL ,
  `idagencias` INT NOT NULL ,
  PRIMARY KEY (`idpaquete`) ,
  INDEX `lugar_turistico1_idx` (`idlugar_turistico` ASC) ,
  INDEX `agencias1_idx` (`idagencias` ASC) ,
  CONSTRAINT `lugar_turistico1`
    FOREIGN KEY (`idlugar_turistico` )
    REFERENCES `dbTurismo`.`lugar_turistico` (`idlugar_turistico` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `agencias1`
    FOREIGN KEY (`idagencias` )
    REFERENCES `dbTurismo`.`agencias` (`idagencias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`pagos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`pagos` (
  `idpagos` INT NOT NULL AUTO_INCREMENT ,
  `Tipo` VARCHAR(45) NOT NULL ,
  `costo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idpagos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`pagos_agencias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`pagos_agencias` (
  `idpagos_agencias` INT NOT NULL AUTO_INCREMENT ,
  `fecha_inicio` DATE NOT NULL ,
  `fecha_final` DATE NOT NULL ,
  `estado` VARCHAR(10) NULL ,
  `idagencias` INT NOT NULL ,
  `idpagos1` INT NOT NULL ,
  PRIMARY KEY (`idpagos_agencias`) ,
  INDEX `agencias2_idx` (`idagencias` ASC) ,
  INDEX `pagos2_idx` (`idpagos1` ASC) ,
  CONSTRAINT `agencias2`
    FOREIGN KEY (`idagencias` )
    REFERENCES `dbTurismo`.`agencias` (`idagencias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pagos2`
    FOREIGN KEY (`idpagos1` )
    REFERENCES `dbTurismo`.`pagos` (`idpagos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`pagos_hoteles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`pagos_hoteles` (
  `idpagos_hoteles` INT NOT NULL AUTO_INCREMENT ,
  `fecha_inicio` DATE NOT NULL ,
  `fecha_final` DATE NOT NULL ,
  `costo` DOUBLE NOT NULL ,
  `estado` VARCHAR(10) NULL ,
  `idhoteles` INT NOT NULL ,
  `idpagos1` INT NOT NULL ,
  PRIMARY KEY (`idpagos_hoteles`) ,
  INDEX `hoteles1_idx` (`idhoteles` ASC) ,
  INDEX `pagos1_idx` (`idpagos1` ASC) ,
  CONSTRAINT `hoteles1`
    FOREIGN KEY (`idhoteles` )
    REFERENCES `dbTurismo`.`hoteles` (`idhoteles` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pagos1`
    FOREIGN KEY (`idpagos1` )
    REFERENCES `dbTurismo`.`pagos` (`idpagos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`telefono`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`telefono` (
  `idtelefono` INT NOT NULL AUTO_INCREMENT ,
  `telefono` VARCHAR(20) NOT NULL ,
  `operador` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`idtelefono`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`hoteles_has_telefono`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`hoteles_has_telefono` (
  `idhoteles` INT NOT NULL ,
  `idtelefono` INT NOT NULL ,
  PRIMARY KEY (`idhoteles`, `idtelefono`) ,
  INDEX `telefono1_idx` (`idtelefono` ASC) ,
  INDEX `hoteles2_idx` (`idhoteles` ASC) ,
  CONSTRAINT `hoteles2`
    FOREIGN KEY (`idhoteles` )
    REFERENCES `dbTurismo`.`hoteles` (`idhoteles` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `telefono1`
    FOREIGN KEY (`idtelefono` )
    REFERENCES `dbTurismo`.`telefono` (`idtelefono` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbTurismo`.`telefono_has_agencias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbTurismo`.`telefono_has_agencias` (
  `idtelefono` INT NOT NULL ,
  `idagencias` INT NOT NULL ,
  PRIMARY KEY (`idtelefono`, `idagencias`) ,
  INDEX `agencias3_idx` (`idagencias` ASC) ,
  INDEX `telefono2_idx` (`idtelefono` ASC) ,
  CONSTRAINT `telefono2`
    FOREIGN KEY (`idtelefono` )
    REFERENCES `dbTurismo`.`telefono` (`idtelefono` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `agencias3`
    FOREIGN KEY (`idagencias` )
    REFERENCES `dbTurismo`.`agencias` (`idagencias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `dbTurismo` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
