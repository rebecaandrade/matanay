SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Perfis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Perfis` (
  `idPerfis` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `login` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `acesso` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idPerfis`) ,
  UNIQUE INDEX `Login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT ,
  `Perfis_idPerfis` INT NOT NULL ,
  PRIMARY KEY (`idCliente`, `Perfis_idPerfis`) ,
  INDEX `fk_Cliente_Perfis1_idx` (`Perfis_idPerfis` ASC) ,
  CONSTRAINT `fk_Cliente_Perfis1`
    FOREIGN KEY (`Perfis_idPerfis` )
    REFERENCES `mydb`.`Perfis` (`idPerfis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Entidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Entidade` (
  `idTipo_Entidade` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Entidade`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Telefone`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Telefone` (
  `idTelefone` INT NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTelefone`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Favorecido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Favorecido` (
  `idFavorecido` INT NOT NULL AUTO_INCREMENT ,
  `banco` VARCHAR(45) NOT NULL ,
  `agencia` VARCHAR(45) NOT NULL ,
  `conta` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idFavorecido`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Entidade` (
  `idEntidade` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `cpf_cnpj` VARCHAR(45) NOT NULL ,
  `contato` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `favorecido` BIT NULL ,
  `percentual_digital` INT NOT NULL ,
  `percentual_fisico` INT NOT NULL ,
  `Tipo_Entidade_idTipo_Entidade` INT NOT NULL ,
  `Telefone_idTelefone` INT NOT NULL ,
  `Favorecido_idFavorecido` INT NOT NULL ,
  PRIMARY KEY (`idEntidade`, `Tipo_Entidade_idTipo_Entidade`, `Telefone_idTelefone`, `Favorecido_idFavorecido`) ,
  INDEX `fk_Entidade_Tipo_Entidade1_idx` (`Tipo_Entidade_idTipo_Entidade` ASC) ,
  INDEX `fk_Entidade_Telefone1_idx` (`Telefone_idTelefone` ASC) ,
  INDEX `fk_Entidade_Favorecido1_idx` (`Favorecido_idFavorecido` ASC) ,
  CONSTRAINT `fk_Entidade_Tipo_Entidade1`
    FOREIGN KEY (`Tipo_Entidade_idTipo_Entidade` )
    REFERENCES `mydb`.`Tipo_Entidade` (`idTipo_Entidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_Telefone1`
    FOREIGN KEY (`Telefone_idTelefone` )
    REFERENCES `mydb`.`Telefone` (`idTelefone` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entidade_Favorecido1`
    FOREIGN KEY (`Favorecido_idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Album`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Album` (
  `idTipo_Album` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Album`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Album`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Album` (
  `idAlbum` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `quantidade` VARCHAR(45) NULL ,
  `upc_ean` VARCHAR(45) NULL ,
  `faixa` VARCHAR(45) NULL ,
  `ano` VARCHAR(45) NULL ,
  `codigo_catalogo` VARCHAR(45) NULL ,
  `Tipo_Album_idTipo_Album` INT NOT NULL ,
  PRIMARY KEY (`idAlbum`, `Tipo_Album_idTipo_Album`) ,
  INDEX `fk_Album_Tipo_Album1_idx` (`Tipo_Album_idTipo_Album` ASC) ,
  CONSTRAINT `fk_Album_Tipo_Album1`
    FOREIGN KEY (`Tipo_Album_idTipo_Album` )
    REFERENCES `mydb`.`Tipo_Album` (`idTipo_Album` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Loja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Loja` (
  `idLoja` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NULL ,
  PRIMARY KEY (`idLoja`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Sub_Loja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Sub_Loja` (
  `idSub_Loja` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idSub_Loja`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Contrato`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Contrato` (
  `idContrato` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `data_inicio` DATE NULL ,
  `data_fim` DATE NULL ,
  `alerta` INT NULL ,
  `Favorecido_idFavorecido` INT NOT NULL ,
  `Entidade_idEntidade` INT NOT NULL ,
  `Entidade_Tipo_Entidade_idTipo_Entidade` INT NOT NULL ,
  `Entidade_Telefone_idTelefone` INT NOT NULL ,
  `Entidade_Favorecido_idFavorecido` INT NOT NULL ,
  `Loja_idLoja` INT NOT NULL ,
  `Sub_Loja_idSub_Loja` INT NOT NULL ,
  PRIMARY KEY (`idContrato`, `Favorecido_idFavorecido`, `Entidade_idEntidade`, `Entidade_Tipo_Entidade_idTipo_Entidade`, `Entidade_Telefone_idTelefone`, `Entidade_Favorecido_idFavorecido`, `Loja_idLoja`, `Sub_Loja_idSub_Loja`) ,
  INDEX `fk_Contrato_Favorecido1_idx` (`Favorecido_idFavorecido` ASC) ,
  INDEX `fk_Contrato_Entidade1_idx` (`Entidade_idEntidade` ASC, `Entidade_Tipo_Entidade_idTipo_Entidade` ASC, `Entidade_Telefone_idTelefone` ASC, `Entidade_Favorecido_idFavorecido` ASC) ,
  INDEX `fk_Contrato_Loja1_idx` (`Loja_idLoja` ASC) ,
  INDEX `fk_Contrato_Sub_Loja1_idx` (`Sub_Loja_idSub_Loja` ASC) ,
  CONSTRAINT `fk_Contrato_Favorecido1`
    FOREIGN KEY (`Favorecido_idFavorecido` )
    REFERENCES `mydb`.`Favorecido` (`idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Entidade1`
    FOREIGN KEY (`Entidade_idEntidade` , `Entidade_Tipo_Entidade_idTipo_Entidade` , `Entidade_Telefone_idTelefone` , `Entidade_Favorecido_idFavorecido` )
    REFERENCES `mydb`.`Entidade` (`idEntidade` , `Tipo_Entidade_idTipo_Entidade` , `Telefone_idTelefone` , `Favorecido_idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Loja1`
    FOREIGN KEY (`Loja_idLoja` )
    REFERENCES `mydb`.`Loja` (`idLoja` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Sub_Loja1`
    FOREIGN KEY (`Sub_Loja_idSub_Loja` )
    REFERENCES `mydb`.`Sub_Loja` (`idSub_Loja` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tipo_Modelo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Tipo_Modelo` (
  `idTipo_Modelo` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Modelo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Modelo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Modelo` (
  `idModelo` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `tipo` VARCHAR(45) NOT NULL ,
  `isrc` VARCHAR(45) NOT NULL ,
  `upc` VARCHAR(45) NOT NULL ,
  `qnt_vendida` VARCHAR(45) NOT NULL ,
  `valor_recebido` VARCHAR(45) NOT NULL ,
  `Tipo_Modelo_idTipo_Modelo` INT NOT NULL ,
  PRIMARY KEY (`idModelo`, `Tipo_Modelo_idTipo_Modelo`) ,
  INDEX `fk_Modelo_Tipo_Modelo_idx` (`Tipo_Modelo_idTipo_Modelo` ASC) ,
  CONSTRAINT `fk_Modelo_Tipo_Modelo`
    FOREIGN KEY (`Tipo_Modelo_idTipo_Modelo` )
    REFERENCES `mydb`.`Tipo_Modelo` (`idTipo_Modelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Relatorio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Relatorio` (
  `idRelatorio` INT NOT NULL AUTO_INCREMENT ,
  `arquivo` LONGBLOB NOT NULL ,
  `periodo_apuracao` DATE NOT NULL ,
  `data_importacao` DATE NOT NULL ,
  `Modelo_idModelo` INT NOT NULL ,
  `Modelo_Tipo_Modelo_idTipo_Modelo` INT NOT NULL ,
  PRIMARY KEY (`idRelatorio`, `Modelo_idModelo`, `Modelo_Tipo_Modelo_idTipo_Modelo`) ,
  INDEX `fk_Relatorio_Modelo1_idx` (`Modelo_idModelo` ASC, `Modelo_Tipo_Modelo_idTipo_Modelo` ASC) ,
  CONSTRAINT `fk_Relatorio_Modelo1`
    FOREIGN KEY (`Modelo_idModelo` , `Modelo_Tipo_Modelo_idTipo_Modelo` )
    REFERENCES `mydb`.`Modelo` (`idModelo` , `Tipo_Modelo_idTipo_Modelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Moeda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Moeda` (
  `idMoeda` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `sigla` VARCHAR(45) NULL ,
  `taxa_cambio` INT NULL ,
  PRIMARY KEY (`idMoeda`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Imposto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Imposto` (
  `idImposto` INT NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `valor` INT NOT NULL ,
  PRIMARY KEY (`idImposto`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Funcionalidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Funcionalidades` (
  `idFuncionalidades` INT NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idFuncionalidades`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Faixa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Faixa` (
  `idFaixa` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `isrc` VARCHAR(45) NOT NULL ,
  `percentual_artista` INT NOT NULL ,
  `percentual_autor` INT NOT NULL ,
  `percentual_produtor` INT NOT NULL ,
  `Album_idAlbum` INT NOT NULL ,
  `Album_Tipo_Album_idTipo_Album` INT NOT NULL ,
  PRIMARY KEY (`idFaixa`, `Album_idAlbum`, `Album_Tipo_Album_idTipo_Album`) ,
  INDEX `fk_Faixa_Album1_idx` (`Album_idAlbum` ASC, `Album_Tipo_Album_idTipo_Album` ASC) ,
  CONSTRAINT `fk_Faixa_Album1`
    FOREIGN KEY (`Album_idAlbum` , `Album_Tipo_Album_idTipo_Album` )
    REFERENCES `mydb`.`Album` (`idAlbum` , `Tipo_Album_idTipo_Album` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Faixas_has_Entidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Faixas_has_Entidade` (
  `Faixas_idFaixa` INT NOT NULL ,
  `Entidade_idEntidade` INT NOT NULL ,
  `Entidade_Tipo_Entidade_idTipo_Entidade` INT NOT NULL ,
  `Entidade_Telefone_idTelefone` INT NOT NULL ,
  `Entidade_Favorecido_idFavorecido` INT NOT NULL ,
  PRIMARY KEY (`Faixas_idFaixa`, `Entidade_idEntidade`, `Entidade_Tipo_Entidade_idTipo_Entidade`, `Entidade_Telefone_idTelefone`, `Entidade_Favorecido_idFavorecido`) ,
  INDEX `fk_Faixas_has_Entidade_Entidade1_idx` (`Entidade_idEntidade` ASC, `Entidade_Tipo_Entidade_idTipo_Entidade` ASC, `Entidade_Telefone_idTelefone` ASC, `Entidade_Favorecido_idFavorecido` ASC) ,
  INDEX `fk_Faixas_has_Entidade_Faixas1_idx` (`Faixas_idFaixa` ASC) ,
  CONSTRAINT `fk_Faixas_has_Entidade_Faixas1`
    FOREIGN KEY (`Faixas_idFaixa` )
    REFERENCES `mydb`.`Faixa` (`idFaixa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Faixas_has_Entidade_Entidade1`
    FOREIGN KEY (`Entidade_idEntidade` , `Entidade_Tipo_Entidade_idTipo_Entidade` , `Entidade_Telefone_idTelefone` , `Entidade_Favorecido_idFavorecido` )
    REFERENCES `mydb`.`Entidade` (`idEntidade` , `Tipo_Entidade_idTipo_Entidade` , `Telefone_idTelefone` , `Favorecido_idFavorecido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Perfis_has_Funcionalidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Perfis_has_Funcionalidades` (
  `Perfis_idPerfis` INT NOT NULL ,
  `Funcionalidades_idFuncionalidades` INT NOT NULL ,
  PRIMARY KEY (`Perfis_idPerfis`, `Funcionalidades_idFuncionalidades`) ,
  INDEX `fk_Perfis_has_Funcionalidades_Funcionalidades1_idx` (`Funcionalidades_idFuncionalidades` ASC) ,
  INDEX `fk_Perfis_has_Funcionalidades_Perfis1_idx` (`Perfis_idPerfis` ASC) ,
  CONSTRAINT `fk_Perfis_has_Funcionalidades_Perfis1`
    FOREIGN KEY (`Perfis_idPerfis` )
    REFERENCES `mydb`.`Perfis` (`idPerfis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perfis_has_Funcionalidades_Funcionalidades1`
    FOREIGN KEY (`Funcionalidades_idFuncionalidades` )
    REFERENCES `mydb`.`Funcionalidades` (`idFuncionalidades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
