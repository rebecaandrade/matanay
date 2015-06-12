SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Cliente` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `excluido` BIT NULL ,
  PRIMARY KEY (`idCliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Entidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Tipo_Entidade` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Entidade` (
  `idTipo_Entidade` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Entidade`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Favorecido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Tipo_Favorecido` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Favorecido` (
  `idTipo_Favorecido` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Favorecido`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Favorecido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Favorecido` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Favorecido` (
  `idFavorecido` INT NOT NULL AUTO_INCREMENT ,
  `banco` VARCHAR(45) NOT NULL ,
  `agencia` VARCHAR(45) NOT NULL ,
  `conta` VARCHAR(45) NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `cpf` VARCHAR(45) NULL ,
  `cnpj` VARCHAR(45) NULL ,
  `contato` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `percentual_digital` INT NULL ,
  `percentual_fisico` INT NULL ,
  `excluido` BIT NULL ,
  `idTipo_Favorecido` INT NOT NULL ,
  PRIMARY KEY (`idFavorecido`) ,
  INDEX `fk_Favorecido_Tipo_Favorecido1_idx` (`idTipo_Favorecido` ASC) ,
  CONSTRAINT `fk_Favorecido_Tipo_Favorecido1`
    FOREIGN KEY (`idTipo_Favorecido` )
    REFERENCES `mydb`.`Tipo_Favorecido` (`idTipo_Favorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Entidade` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Entidade` (
  `idEntidade` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `cpf` VARCHAR(45) NULL ,
  `cnpj` VARCHAR(45) NULL ,
  `contato` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `favorecido` BIT NULL ,
  `percentual_digital` INT NOT NULL ,
  `percentual_fisico` INT NOT NULL ,
  `idTipo_Entidade` INT NOT NULL ,
  `idFavorecido` INT NOT NULL ,
  `excluido` BIT NULL ,
  `idCliente` INT NULL ,
  PRIMARY KEY (`idEntidade`) ,
  INDEX `fk_Entidade_Tipo_Entidade1_idx` (`idTipo_Entidade` ASC) ,
  INDEX `fk_Entidade_Favorecido1_idx` (`idFavorecido` ASC) ,
  INDEX `fk_Entidade_Cliente1_idx` (`idCliente` ASC) ,
  CONSTRAINT `fk_Entidade_Tipo_Entidade1`
    FOREIGN KEY (`idTipo_Entidade` )
    REFERENCES `mydb`.`Tipo_Entidade` (`idTipo_Entidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_Favorecido1`
    FOREIGN KEY (`idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_Cliente1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `mydb`.`Cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Album`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Tipo_Album` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Album` (
  `idTipo_Album` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Album`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Album`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Album` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Album` (
  `idAlbum` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `quantidade` INT NULL ,
  `upc_ean` VARCHAR(45) NULL ,
  `faixa` VARCHAR(45) NULL ,
  `ano` VARCHAR(45) NULL ,
  `codigo_catalogo` VARCHAR(45) NULL ,
  `idTipo_Album` INT NOT NULL ,
  `excluido` BIT NULL ,
  PRIMARY KEY (`idAlbum`) ,
  INDEX `fk_Album_Tipo_Album1_idx` (`idTipo_Album` ASC) ,
  CONSTRAINT `fk_Album_Tipo_Album`
    FOREIGN KEY (`idTipo_Album` )
    REFERENCES `mydb`.`Tipo_Album` (`idTipo_Album` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Contrato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Contrato` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Contrato` (
  `idContrato` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `data_inicio` DATE NULL ,
  `data_fim` DATE NULL ,
  `alerta` INT NULL ,
  `idEntidade` INT NOT NULL ,
  `idFavorecido` INT NOT NULL ,
  `excluido` BIT NULL ,
  PRIMARY KEY (`idContrato`) ,
  INDEX `fk_Contrato_Entidade1_idx` (`idEntidade` ASC) ,
  INDEX `fk_Contrato_Favorecido1_idx` (`idFavorecido` ASC) ,
  CONSTRAINT `fk_Contrato_Entidade1`
    FOREIGN KEY (`idEntidade` )
    REFERENCES `mydb`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Favorecido1`
    FOREIGN KEY (`idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Modelo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Tipo_Modelo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Modelo` (
  `idTipo_Modelo` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Modelo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Modelo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Modelo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Modelo` (
  `idModelo` INT NOT NULL AUTO_INCREMENT ,
  `nome` INT NOT NULL ,
  `isrc` INT NOT NULL ,
  `upc` INT NOT NULL ,
  `qnt_vendida` INT NOT NULL ,
  `valor_recebido` INT NOT NULL ,
  `loja` INT NOT NULL ,
  `subloja` INT NOT NULL ,
  `territorio` INT NOT NULL ,
  `moeda` INT NOT NULL ,
  `idTipo_Modelo` INT NOT NULL ,
  `excluido` BIT NULL ,
  PRIMARY KEY (`idModelo`) ,
  INDEX `fk_Modelo_Tipo_Modelo1_idx` (`idTipo_Modelo` ASC) ,
  CONSTRAINT `fk_Modelo_Tipo_Modelo1`
    FOREIGN KEY (`idTipo_Modelo` )
    REFERENCES `mydb`.`Tipo_Modelo` (`idTipo_Modelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Relatorio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Relatorio` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Relatorio` (
  `idRelatorio` INT NOT NULL AUTO_INCREMENT ,
  `arquivo` VARCHAR(45) NOT NULL ,
  `periodo_apuracao` VARCHAR(45) NOT NULL ,
  `data_importacao` DATE NOT NULL ,
  `idModelo` INT NOT NULL ,
  PRIMARY KEY (`idRelatorio`) ,
  INDEX `fk_Relatorio_Modelo1_idx` (`idModelo` ASC) ,
  CONSTRAINT `fk_Relatorio_Modelo1`
    FOREIGN KEY (`idModelo` )
    REFERENCES `mydb`.`Modelo` (`idModelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Moeda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Moeda` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Moeda` (
  `idMoeda` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `sigla` VARCHAR(45) NULL ,
  `taxa_cambio` FLOAT NULL ,
  `excluido` BIT NULL ,
  `idCliente` INT NOT NULL ,
  PRIMARY KEY (`idMoeda`) ,
  INDEX `fk_Moeda_Cliente1_idx` (`idCliente` ASC) ,
  CONSTRAINT `fk_Moeda_Cliente1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `mydb`.`Cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Imposto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Imposto` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Imposto` (
  `idImposto` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `valor` INT NOT NULL ,
  `idCliente` INT NULL ,
  PRIMARY KEY (`idImposto`) ,
  INDEX `fk_Imposto_Cliente1_idx` (`idCliente` ASC) ,
  CONSTRAINT `fk_Imposto_Cliente1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `mydb`.`Cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Perfis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Perfis` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Perfis` (
  `idPerfis` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `login` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `excluido` BIT NULL ,
  `idCliente` INT NOT NULL ,
  PRIMARY KEY (`idPerfis`) ,
  UNIQUE INDEX `Login_UNIQUE` (`login` ASC) ,
  INDEX `fk_Perfis_Cliente1_idx` (`idCliente` ASC) ,
  CONSTRAINT `fk_Perfis_Cliente1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `mydb`.`Cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Funcionalidades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Funcionalidades` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Funcionalidades` (
  `idFuncionalidades` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idFuncionalidades`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Telefone_Entidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Telefone_Entidade` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Telefone_Entidade` (
  `idTelefone` INT NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(45) NOT NULL ,
  `idEntidade` INT NOT NULL ,
  PRIMARY KEY (`idTelefone`) ,
  INDEX `fk_Telefone_Entidade1_idx` (`idEntidade` ASC) ,
  CONSTRAINT `fk_Telefone_Entidade1`
    FOREIGN KEY (`idEntidade` )
    REFERENCES `mydb`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Faixa_Video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Faixa_Video` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Faixa_Video` (
  `idFaixa` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `isrc` VARCHAR(45) NULL ,
  `codigo_video` VARCHAR(45) NULL ,
  `excluido` BIT NULL ,
  PRIMARY KEY (`idFaixa`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Funcionalidades_has_Perfis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Funcionalidades_has_Perfis` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Funcionalidades_has_Perfis` (
  `idFuncionalidades` INT NOT NULL ,
  `idPerfis` INT NOT NULL ,
  PRIMARY KEY (`idFuncionalidades`, `idPerfis`) ,
  INDEX `fk_Funcionalidades_has_Perfis_Perfis1_idx` (`idPerfis` ASC) ,
  INDEX `fk_Funcionalidades_has_Perfis_Funcionalidades1_idx` (`idFuncionalidades` ASC) ,
  CONSTRAINT `fk_Funcionalidades_has_Perfis_Funcionalidades1`
    FOREIGN KEY (`idFuncionalidades` )
    REFERENCES `mydb`.`Funcionalidades` (`idFuncionalidades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionalidades_has_Perfis_Perfis1`
    FOREIGN KEY (`idPerfis` )
    REFERENCES `mydb`.`Perfis` (`idPerfis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entidade_has_Album`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Entidade_has_Album` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Entidade_has_Album` (
  `idEntidade` INT NOT NULL ,
  `idAlbum` INT NOT NULL ,
  PRIMARY KEY (`idEntidade`, `idAlbum`) ,
  INDEX `fk_Entidade_has_Album_Album1_idx` (`idAlbum` ASC) ,
  INDEX `fk_Entidade_has_Album_Entidade1_idx` (`idEntidade` ASC) ,
  CONSTRAINT `fk_Entidade_has_Album_Entidade1`
    FOREIGN KEY (`idEntidade` )
    REFERENCES `mydb`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_has_Album_Album1`
    FOREIGN KEY (`idAlbum` )
    REFERENCES `mydb`.`Album` (`idAlbum` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Telefone_Favorecido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Telefone_Favorecido` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Telefone_Favorecido` (
  `idTelefone_Favorecido` INT NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(45) NULL ,
  `idFavorecido` INT NOT NULL ,
  PRIMARY KEY (`idTelefone_Favorecido`) ,
  INDEX `fk_Telefone_Favorecido_Favorecido1_idx` (`idFavorecido` ASC) ,
  CONSTRAINT `fk_Telefone_Favorecido_Favorecido1`
    FOREIGN KEY (`idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Favorecido_has_Faixa_Video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Favorecido_has_Faixa_Video` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Favorecido_has_Faixa_Video` (
  `idFavorecido` INT NOT NULL ,
  `idFaixa` INT NOT NULL ,
  PRIMARY KEY (`idFavorecido`, `idFaixa`) ,
  INDEX `fk_Favorecido_has_Faixa_Videos_Faixa_Videos1_idx` (`idFaixa` ASC) ,
  INDEX `fk_Favorecido_has_Faixa_Videos_Favorecido1_idx` (`idFavorecido` ASC) ,
  CONSTRAINT `fk_Favorecido_has_Faixa_Videos_Favorecido1`
    FOREIGN KEY (`idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Favorecido_has_Faixa_Videos_Faixa_Videos1`
    FOREIGN KEY (`idFaixa` )
    REFERENCES `mydb`.`Faixa_Video` (`idFaixa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Favorecido_has_Album`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Favorecido_has_Album` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Favorecido_has_Album` (
  `idFavorecido` INT NOT NULL ,
  `idAlbum` INT NOT NULL ,
  PRIMARY KEY (`idFavorecido`, `idAlbum`) ,
  INDEX `fk_Favorecido_has_Album_Album1_idx` (`idAlbum` ASC) ,
  INDEX `fk_Favorecido_has_Album_Favorecido1_idx` (`idFavorecido` ASC) ,
  CONSTRAINT `fk_Favorecido_has_Album_Favorecido1`
    FOREIGN KEY (`idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Favorecido_has_Album_Album1`
    FOREIGN KEY (`idAlbum` )
    REFERENCES `mydb`.`Album` (`idAlbum` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Album_has_Faixa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Album_has_Faixa` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Album_has_Faixa` (
  `idAlbum` INT NOT NULL ,
  `idFaixa` INT NOT NULL ,
  PRIMARY KEY (`idAlbum`, `idFaixa`) ,
  INDEX `fk_Album_has_Faixa_Faixa1_idx` (`idFaixa` ASC) ,
  INDEX `fk_Album_has_Faixa_Album1_idx` (`idAlbum` ASC) ,
  CONSTRAINT `fk_Album_has_Faixa_Album1`
    FOREIGN KEY (`idAlbum` )
    REFERENCES `mydb`.`Album` (`idAlbum` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Album_has_Faixa_Faixa1`
    FOREIGN KEY (`idFaixa` )
    REFERENCES `mydb`.`Faixa_Video` (`idFaixa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entidade_has_Faixa_Video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Entidade_has_Faixa_Video` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`Entidade_has_Faixa_Video` (
  `idEntidade` INT NOT NULL ,
  `idFaixa` INT NOT NULL ,
  PRIMARY KEY (`idEntidade`, `idFaixa`) ,
  INDEX `fk_Entidade_has_Faixa_Video_Faixa_Video1_idx` (`idFaixa` ASC) ,
  INDEX `fk_Entidade_has_Faixa_Video_Entidade1_idx` (`idEntidade` ASC) ,
  CONSTRAINT `fk_Entidade_has_Faixa_Video_Entidade1`
    FOREIGN KEY (`idEntidade` )
    REFERENCES `mydb`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_has_Faixa_Video_Faixa_Video1`
    FOREIGN KEY (`idFaixa` )
    REFERENCES `mydb`.`Faixa_Video` (`idFaixa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
