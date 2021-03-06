-- MySQL Script generated by MySQL Workbench
-- 12/19/15 12:31:46
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema matanay
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema matanay
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `matanay` DEFAULT CHARACTER SET utf8 ;
USE `matanay` ;

-- -----------------------------------------------------
-- Table `matanay`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `bloqueado` BIT NULL DEFAULT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `tipo` INT NOT NULL COMMENT '',
  `data_inicio` DATE NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idCliente`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Favorecido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Favorecido` (
  `idFavorecido` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `banco` VARCHAR(45) NOT NULL COMMENT '',
  `agencia` VARCHAR(45) NOT NULL COMMENT '',
  `conta` VARCHAR(45) NOT NULL COMMENT '',
  `nome` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cpf` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cnpj` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `contato` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFavorecido`)  COMMENT '',
  INDEX `fk_Favorecido_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Favorecido_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Entidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Entidade` (
  `idEntidade` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `cpf` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cnpj` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `contato` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `favorecido` BIT NULL DEFAULT NULL COMMENT '',
  `idFavorecido` INT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idEntidade`)  COMMENT '',
  INDEX `fk_Entidade_Favorecido1_idx` (`idFavorecido` ASC)  COMMENT '',
  INDEX `fk_Entidade_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Entidade_Favorecido1`
    FOREIGN KEY (`idFavorecido`)
    REFERENCES `matanay`.`Favorecido` (`idFavorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Tipo_Album` (
  `idTipo_Album` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipo_Album`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Album` (
  `idAlbum` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `quantidade` INT NULL DEFAULT NULL COMMENT '',
  `upc_ean` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `faixa` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `ano` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `codigo_catalogo` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `idTipo_Album` INT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idAlbum`)  COMMENT '',
  INDEX `fk_Album_Tipo_Album1_idx` (`idTipo_Album` ASC)  COMMENT '',
  INDEX `fk_Album_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Album_Tipo_Album`
    FOREIGN KEY (`idTipo_Album`)
    REFERENCES `matanay`.`Tipo_Album` (`idTipo_Album`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Album_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Contrato` (
  `idContrato` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `data_inicio` DATE NULL DEFAULT NULL COMMENT '',
  `data_fim` DATE NULL DEFAULT NULL COMMENT '',
  `alerta` INT NULL DEFAULT NULL COMMENT '',
  `idEntidade` INT NOT NULL COMMENT '',
  `idFavorecido` INT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idContrato`)  COMMENT '',
  INDEX `fk_Contrato_Entidade1_idx` (`idEntidade` ASC)  COMMENT '',
  INDEX `fk_Contrato_Favorecido1_idx` (`idFavorecido` ASC)  COMMENT '',
  INDEX `fk_Contrato_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Contrato_Entidade1`
    FOREIGN KEY (`idEntidade`)
    REFERENCES `matanay`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Favorecido1`
    FOREIGN KEY (`idFavorecido`)
    REFERENCES `matanay`.`Favorecido` (`idFavorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Modelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Tipo_Modelo` (
  `idTipo_Modelo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipo_Modelo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Modelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Modelo` (
  `idModelo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `isrc` VARCHAR(3) NOT NULL COMMENT '',
  `upc` VARCHAR(3) NOT NULL COMMENT '',
  `qnt_vendida` VARCHAR(3) NOT NULL COMMENT '',
  `valor_recebido` VARCHAR(3) NOT NULL COMMENT '',
  `loja` VARCHAR(3) NOT NULL COMMENT '',
  `subloja` VARCHAR(3) NOT NULL COMMENT '',
  `territorio` VARCHAR(3) NOT NULL COMMENT '',
  `moeda` VARCHAR(3) NOT NULL COMMENT '',
  `idTipo_Modelo` INT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idModelo`)  COMMENT '',
  INDEX `fk_Modelo_Tipo_Modelo1_idx` (`idTipo_Modelo` ASC)  COMMENT '',
  INDEX `fk_Modelo_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Modelo_Tipo_Modelo1`
    FOREIGN KEY (`idTipo_Modelo`)
    REFERENCES `matanay`.`Tipo_Modelo` (`idTipo_Modelo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Modelo_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Relatorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Relatorio` (
  `idRelatorio` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `arquivo` VARCHAR(80) NOT NULL COMMENT '',
  `periodo_apuracao` VARCHAR(45) NOT NULL COMMENT '',
  `data_importacao` DATE NOT NULL COMMENT '',
  `idModelo` INT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idRelatorio`)  COMMENT '',
  INDEX `fk_Relatorio_Modelo1_idx` (`idModelo` ASC)  COMMENT '',
  INDEX `fk_Relatorio_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Relatorio_Modelo1`
    FOREIGN KEY (`idModelo`)
    REFERENCES `matanay`.`Modelo` (`idModelo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Relatorio_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Moeda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Moeda` (
  `idMoeda` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `sigla` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `taxa_cambio` FLOAT NULL DEFAULT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idMoeda`)  COMMENT '',
  INDEX `fk_Moeda_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Moeda_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Imposto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Tipo_Imposto` (
  `idTipo_Imposto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipo_Imposto`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Imposto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Imposto` (
  `idImposto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `valor` INT NOT NULL COMMENT '',
  `idCliente` INT NULL DEFAULT NULL COMMENT '',
  `idTipo_Imposto` INT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idImposto`)  COMMENT '',
  INDEX `fk_Imposto_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  INDEX `fk_Imposto_Tipo_Imposto1_idx` (`idTipo_Imposto` ASC)  COMMENT '',
  CONSTRAINT `fk_Imposto_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Imposto_Tipo_Imposto1`
    FOREIGN KEY (`idTipo_Imposto`)
    REFERENCES `matanay`.`Tipo_Imposto` (`idTipo_Imposto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `login` VARCHAR(45) NOT NULL COMMENT '',
  `senha` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `excluido` BIT NULL COMMENT '',
  `bloqueado` BIT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idUsuario`)  COMMENT '',
  UNIQUE INDEX `Login_UNIQUE` (`login` ASC)  COMMENT '',
  INDEX `fk_Usuario_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '',
  CONSTRAINT `fk_Usuario_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Funcionalidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Funcionalidades` (
  `idFuncionalidades` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idFuncionalidades`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Telefone_Entidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Telefone_Entidade` (
  `idTelefone` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `numero` VARCHAR(45) NOT NULL COMMENT '',
  `idEntidade` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idTelefone`)  COMMENT '',
  INDEX `fk_Telefone_Entidade1_idx` (`idEntidade` ASC)  COMMENT '',
  CONSTRAINT `fk_Telefone_Entidade1`
    FOREIGN KEY (`idEntidade`)
    REFERENCES `matanay`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Entidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Tipo_Entidade` (
  `idTipo_Entidade` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipo_Entidade`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Faixa_Video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Faixa_Video` (
  `idFaixa` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `isrc` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `codigo_video` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `idCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFaixa`)  COMMENT '',
  INDEX `fk_Faixa_Video_Cliente1_idx` (`idCliente` ASC)  COMMENT '',
  CONSTRAINT `fk_Faixa_Video_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `matanay`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Entidade_has_Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Entidade_has_Album` (
  `idEntidade` INT NOT NULL COMMENT '',
  `idAlbum` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idEntidade`, `idAlbum`)  COMMENT '',
  INDEX `fk_Entidade_has_Album_Album1_idx` (`idAlbum` ASC)  COMMENT '',
  INDEX `fk_Entidade_has_Album_Entidade1_idx` (`idEntidade` ASC)  COMMENT '',
  CONSTRAINT `fk_Entidade_has_Album_Entidade1`
    FOREIGN KEY (`idEntidade`)
    REFERENCES `matanay`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_has_Album_Album1`
    FOREIGN KEY (`idAlbum`)
    REFERENCES `matanay`.`Album` (`idAlbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Telefone_Favorecido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Telefone_Favorecido` (
  `idTelefone_Favorecido` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  `numero` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `idFavorecido` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idTelefone_Favorecido`)  COMMENT '',
  INDEX `fk_Telefone_Favorecido_Favorecido1_idx` (`idFavorecido` ASC)  COMMENT '',
  CONSTRAINT `fk_Telefone_Favorecido_Favorecido1`
    FOREIGN KEY (`idFavorecido`)
    REFERENCES `matanay`.`Favorecido` (`idFavorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Favorecido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Tipo_Favorecido` (
  `idTipo_Favorecido` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipo_Favorecido`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Favorecido_has_Faixa_Video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Favorecido_has_Faixa_Video` (
  `idFavorecido` INT NOT NULL COMMENT '',
  `idFaixa` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFavorecido`, `idFaixa`)  COMMENT '',
  INDEX `fk_Favorecido_has_Faixa_Videos_Faixa_Videos1_idx` (`idFaixa` ASC)  COMMENT '',
  INDEX `fk_Favorecido_has_Faixa_Videos_Favorecido1_idx` (`idFavorecido` ASC)  COMMENT '',
  CONSTRAINT `fk_Favorecido_has_Faixa_Videos_Favorecido1`
    FOREIGN KEY (`idFavorecido`)
    REFERENCES `matanay`.`Favorecido` (`idFavorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Favorecido_has_Faixa_Videos_Faixa_Videos1`
    FOREIGN KEY (`idFaixa`)
    REFERENCES `matanay`.`Faixa_Video` (`idFaixa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Favorecido_has_Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Favorecido_has_Album` (
  `idFavorecido` INT NOT NULL COMMENT '',
  `idAlbum` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFavorecido`, `idAlbum`)  COMMENT '',
  INDEX `fk_Favorecido_has_Album_Album1_idx` (`idAlbum` ASC)  COMMENT '',
  INDEX `fk_Favorecido_has_Album_Favorecido1_idx` (`idFavorecido` ASC)  COMMENT '',
  CONSTRAINT `fk_Favorecido_has_Album_Favorecido1`
    FOREIGN KEY (`idFavorecido`)
    REFERENCES `matanay`.`Favorecido` (`idFavorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Favorecido_has_Album_Album1`
    FOREIGN KEY (`idAlbum`)
    REFERENCES `matanay`.`Album` (`idAlbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Album_has_Faixa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Album_has_Faixa` (
  `idAlbum` INT NOT NULL COMMENT '',
  `idFaixa` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idAlbum`, `idFaixa`)  COMMENT '',
  INDEX `fk_Album_has_Faixa_Faixa1_idx` (`idFaixa` ASC)  COMMENT '',
  INDEX `fk_Album_has_Faixa_Album1_idx` (`idAlbum` ASC)  COMMENT '',
  CONSTRAINT `fk_Album_has_Faixa_Album1`
    FOREIGN KEY (`idAlbum`)
    REFERENCES `matanay`.`Album` (`idAlbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Album_has_Faixa_Faixa1`
    FOREIGN KEY (`idFaixa`)
    REFERENCES `matanay`.`Faixa_Video` (`idFaixa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Entidade_has_Faixa_Video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Entidade_has_Faixa_Video` (
  `idEntidade` INT NOT NULL COMMENT '',
  `idFaixa` INT NOT NULL COMMENT '',
  `percentual` FLOAT NULL DEFAULT NULL COMMENT '',
  `tipoEntidade` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idEntidade`, `idFaixa`, `tipoEntidade`)  COMMENT '',
  INDEX `fk_Entidade_has_Faixa_Video_Faixa_Video1_idx` (`idFaixa` ASC)  COMMENT '',
  INDEX `fk_Entidade_has_Faixa_Video_Entidade1_idx` (`idEntidade` ASC)  COMMENT '',
  CONSTRAINT `fk_Entidade_has_Faixa_Video_Entidade1`
    FOREIGN KEY (`idEntidade`)
    REFERENCES `matanay`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_has_Faixa_Video_Faixa_Video1`
    FOREIGN KEY (`idFaixa`)
    REFERENCES `matanay`.`Faixa_Video` (`idFaixa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Entidade_has_Tipo_Entidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Entidade_has_Tipo_Entidade` (
  `idEntidade` INT NOT NULL COMMENT '',
  `idTipo_Entidade` INT NOT NULL COMMENT '',
  `percentual_fisico` FLOAT NOT NULL COMMENT '',
  `percentual_digital` FLOAT NOT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idEntidade`, `idTipo_Entidade`)  COMMENT '',
  INDEX `fk_Entidade_has_Tipo_Entidade_Tipo_Entidade1_idx` (`idTipo_Entidade` ASC)  COMMENT '',
  INDEX `fk_Entidade_has_Tipo_Entidade_Entidade1_idx` (`idEntidade` ASC)  COMMENT '',
  CONSTRAINT `fk_Entidade_has_Tipo_Entidade_Entidade1`
    FOREIGN KEY (`idEntidade`)
    REFERENCES `matanay`.`Entidade` (`idEntidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_has_Tipo_Entidade_Tipo_Entidade1`
    FOREIGN KEY (`idTipo_Entidade`)
    REFERENCES `matanay`.`Tipo_Entidade` (`idTipo_Entidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Favorecido_has_Tipo_Favorecido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Favorecido_has_Tipo_Favorecido` (
  `idFavorecido` INT NOT NULL COMMENT '',
  `idTipo_Favorecido` INT NOT NULL COMMENT '',
  `percentual_fisico` INT NULL DEFAULT NULL COMMENT '',
  `percentual_digital` INT NULL DEFAULT NULL COMMENT '',
  `excluido` BIT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idFavorecido`, `idTipo_Favorecido`)  COMMENT '',
  INDEX `fk_Favorecido_has_Tipo_Favorecido_Tipo_Favorecido1_idx` (`idTipo_Favorecido` ASC)  COMMENT '',
  INDEX `fk_Favorecido_has_Tipo_Favorecido_Favorecido1_idx` (`idFavorecido` ASC)  COMMENT '',
  CONSTRAINT `fk_Favorecido_has_Tipo_Favorecido_Favorecido1`
    FOREIGN KEY (`idFavorecido`)
    REFERENCES `matanay`.`Favorecido` (`idFavorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Favorecido_has_Tipo_Favorecido_Tipo_Favorecido1`
    FOREIGN KEY (`idTipo_Favorecido`)
    REFERENCES `matanay`.`Tipo_Favorecido` (`idTipo_Favorecido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Usuario_has_Funcionalidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Usuario_has_Funcionalidades` (
  `idUsuario` INT NOT NULL COMMENT '',
  `idFuncionalidades` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idUsuario`, `idFuncionalidades`)  COMMENT '',
  INDEX `fk_Usuario_has_Funcionalidades_Funcionalidades1_idx` (`idFuncionalidades` ASC)  COMMENT '',
  INDEX `fk_Usuario_has_Funcionalidades_Usuario1_idx` (`idUsuario` ASC)  COMMENT '',
  CONSTRAINT `fk_Usuario_has_Funcionalidades_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `matanay`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Funcionalidades_Funcionalidades1`
    FOREIGN KEY (`idFuncionalidades`)
    REFERENCES `matanay`.`Funcionalidades` (`idFuncionalidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Faixa_Video_has_Imposto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Faixa_Video_has_Imposto` (
  `idFaixa` INT NOT NULL COMMENT '',
  `idImposto` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFaixa`, `idImposto`)  COMMENT '',
  INDEX `fk_Faixa_Video_has_Imposto_Faixa_Video1_idx` (`idFaixa` ASC)  COMMENT '',
  INDEX `fk_Faixa_Video_has_Imposto_Imposto1_idx` (`idImposto` ASC)  COMMENT '',
  CONSTRAINT `fk_Faixa_Video_has_Imposto_Imposto1`
    FOREIGN KEY (`idImposto`)
    REFERENCES `matanay`.`Imposto` (`idImposto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Faixa_Video_has_Imposto_Faixa_Video1`
    FOREIGN KEY (`idFaixa`)
    REFERENCES `matanay`.`Faixa_Video` (`idFaixa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Album_has_Imposto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `matanay`.`Album_has_Imposto` (
  `idAlbum` INT NOT NULL COMMENT '',
  `idImposto` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idAlbum`, `idImposto`)  COMMENT '',
  INDEX `fk_Album_has_Imposto_Album1_idx` (`idAlbum` ASC)  COMMENT '',
  INDEX `fk_Album_has_Imposto_Imposto1_idx` (`idImposto` ASC)  COMMENT '',
  CONSTRAINT `fk_Album_has_Imposto_Imposto1`
    FOREIGN KEY (`idImposto`)
    REFERENCES `matanay`.`Imposto` (`idImposto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Album_has_Imposto_Album1`
    FOREIGN KEY (`idAlbum`)
    REFERENCES `matanay`.`Album` (`idAlbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `matanay`.`Vendas` (
  `idVendas` INT NOT NULL AUTO_INCREMENT,
  `idAlbum` INT NOT NULL,
  `idFaixa` INT NOT NULL,
  `idRelatorio` INT NOT NULL COMMENT '\n',
  `qnt_vendida` INT NULL,
  `valor_recebido` FLOAT NULL,
  `loja` VARCHAR(45) NULL,
  `subloja` VARCHAR(45) NULL,
  `territorio` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idVendas`, `idAlbum`, `idFaixa`, `idRelatorio`),
  INDEX `fk_Vendas_Album1_idx` (`idAlbum` ASC),
  INDEX `fk_Vendas_Faixa_Video1_idx` (`idFaixa` ASC),
  INDEX `fk_Vendas_Relatorio1_idx` (`idRelatorio` ASC),
  CONSTRAINT `fk_Vendas_Album1`
    FOREIGN KEY (`idAlbum`)
    REFERENCES `matanay`.`Album` (`idAlbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vendas_Faixa_Video1`
    FOREIGN KEY (`idFaixa`)
    REFERENCES `matanay`.`Faixa_Video` (`idFaixa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vendas_Relatorio1`
    FOREIGN KEY (`idRelatorio`)
    REFERENCES `matanay`.`Relatorio` (`idRelatorio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
