SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `matanay` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `matanay` ;

-- -----------------------------------------------------
-- Table `matanay`.`Perfis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Perfis` (
  `idPerfis` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `login` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `acesso` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idPerfis`) ,
  UNIQUE INDEX `Login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT ,
  `Perfis_idPerfis` INT NOT NULL ,
  PRIMARY KEY (`idCliente`) ,
  INDEX `fk_Cliente_Perfis1_idx` (`Perfis_idPerfis` ASC) ,
  CONSTRAINT `fk_Cliente_Perfis1`
    FOREIGN KEY (`Perfis_idPerfis` )
    REFERENCES `matanay`.`Perfis` (`idPerfis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Entidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Tipo_Entidade` (
  `idTipo_Entidade` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Entidade`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Entidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Entidade` (
  `idEntidade` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `cpf_cnpj` VARCHAR(45) NOT NULL ,
  `contato` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `favorecido` BIT NULL ,
  `percentual_digital` INT NOT NULL ,
  `percentual_fisico` INT NOT NULL ,
  `Tipo_Entidade_idTipo_Entidade2` INT NOT NULL ,
  PRIMARY KEY (`idEntidade`) ,
  INDEX `fk_Entidade_Tipo_Entidade1_idx` (`Tipo_Entidade_idTipo_Entidade2` ASC) ,
  CONSTRAINT `fk_Entidade_Tipo_Entidade1`
    FOREIGN KEY (`Tipo_Entidade_idTipo_Entidade2` )
    REFERENCES `matanay`.`Tipo_Entidade` (`idTipo_Entidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Loja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Loja` (
  `idLoja` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NULL ,
  PRIMARY KEY (`idLoja`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Sub_Loja`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Sub_Loja` (
  `idSub_Loja` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idSub_Loja`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Contrato`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Contrato` (
  `idContrato` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `data_inicio` DATE NULL ,
  `data_fim` DATE NULL ,
  `alerta` INT NULL ,
  `Favorecido_idFavorecido` INT NULL ,
  `Loja_idLoja` INT NOT NULL ,
  `Sub_Loja_idSub_Loja` INT NOT NULL ,
  `Entidade_idEntidade` INT NOT NULL ,
  `Entidade_Tipo_Entidade_idTipo_Entidade` INT NOT NULL ,
  `Entidade_Telefone_idTelefone` INT NOT NULL ,
  `Entidade_Favorecido_idFavorecido` INT NOT NULL ,
  `Entidade_Favorecido_idFavorecido1` INT NOT NULL ,
  `Entidade_Tipo_Entidade_idTipo_Entidade1` INT NOT NULL ,
  `Loja_idLoja1` INT NOT NULL ,
  `Sub_Loja_idSub_Loja1` INT NOT NULL ,
  PRIMARY KEY (`idContrato`) ,
  INDEX `fk_Contrato_Entidade1_idx` (`Entidade_idEntidade` ASC, `Entidade_Tipo_Entidade_idTipo_Entidade` ASC, `Entidade_Telefone_idTelefone` ASC, `Entidade_Favorecido_idFavorecido` ASC, `Entidade_Favorecido_idFavorecido1` ASC, `Entidade_Tipo_Entidade_idTipo_Entidade1` ASC) ,
  INDEX `fk_Contrato_Loja1_idx` (`Loja_idLoja1` ASC) ,
  INDEX `fk_Contrato_Sub_Loja1_idx` (`Sub_Loja_idSub_Loja1` ASC) ,
  CONSTRAINT `fk_Contrato_Entidade1`
    FOREIGN KEY (`Entidade_idEntidade` )
    REFERENCES `matanay`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Loja1`
    FOREIGN KEY (`Loja_idLoja1` )
    REFERENCES `matanay`.`Loja` (`idLoja` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contrato_Sub_Loja1`
    FOREIGN KEY (`Sub_Loja_idSub_Loja1` )
    REFERENCES `matanay`.`Sub_Loja` (`idSub_Loja` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Favorecido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Favorecido` (
  `idFavorecido` INT NOT NULL AUTO_INCREMENT ,
  `banco` VARCHAR(45) NOT NULL ,
  `agencia` VARCHAR(45) NOT NULL ,
  `conta` VARCHAR(45) NOT NULL ,
  `Entidade_Tipo_Entidade_idTipo_Entidade` INT NOT NULL ,
  `Entidade_Telefone_idTelefone` INT NOT NULL ,
  `Entidade_Favorecido_idFavorecido` INT NOT NULL ,
  `Entidade_Favorecido_idFavorecido1` INT NOT NULL ,
  `Entidade_Tipo_Entidade_idTipo_Entidade1` INT NOT NULL ,
  `Contrato_idContrato` INT NOT NULL ,
  `Contrato_Favorecido_idFavorecido` INT NOT NULL ,
  `Contrato_Loja_idLoja` INT NOT NULL ,
  `Contrato_Sub_Loja_idSub_Loja` INT NOT NULL ,
  `Entidade_idEntidade` INT NOT NULL ,
  PRIMARY KEY (`idFavorecido`, `Entidade_idEntidade`) ,
  INDEX `fk_Favorecido_Contrato1_idx` (`Contrato_idContrato` ASC, `Contrato_Favorecido_idFavorecido` ASC, `Contrato_Loja_idLoja` ASC, `Contrato_Sub_Loja_idSub_Loja` ASC) ,
  INDEX `fk_Favorecido_Entidade1_idx` (`Entidade_idEntidade` ASC) ,
  CONSTRAINT `fk_Favorecido_Contrato1`
    FOREIGN KEY (`Contrato_idContrato` , `Contrato_Favorecido_idFavorecido` , `Contrato_Loja_idLoja` , `Contrato_Sub_Loja_idSub_Loja` )
    REFERENCES `matanay`.`Contrato` (`idContrato` , `Favorecido_idFavorecido` , `Loja_idLoja` , `Sub_Loja_idSub_Loja` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Favorecido_Entidade1`
    FOREIGN KEY (`Entidade_idEntidade` )
    REFERENCES `matanay`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Album`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Tipo_Album` (
  `idTipo_Album` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Album`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Album`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Album` (
  `idAlbum` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `quantidade` VARCHAR(45) NULL ,
  `upc_ean` VARCHAR(45) NULL ,
  `faixa` VARCHAR(45) NULL ,
  `ano` VARCHAR(45) NULL ,
  `codigo_catalogo` VARCHAR(45) NULL ,
  `Tipo_Album_idTipo_Album` INT NOT NULL ,
  `Tipo_Album_idTipo_Album1` INT NOT NULL ,
  PRIMARY KEY (`idAlbum`, `Tipo_Album_idTipo_Album`) ,
  INDEX `fk_Album_Tipo_Album1_idx` (`Tipo_Album_idTipo_Album1` ASC) ,
  CONSTRAINT `fk_Album_Tipo_Album1`
    FOREIGN KEY (`Tipo_Album_idTipo_Album1` )
    REFERENCES `matanay`.`Tipo_Album` (`idTipo_Album` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Tipo_Modelo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Tipo_Modelo` (
  `idTipo_Modelo` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idTipo_Modelo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Modelo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Modelo` (
  `idModelo` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `tipo` VARCHAR(45) NOT NULL ,
  `isrc` VARCHAR(45) NOT NULL ,
  `upc` VARCHAR(45) NOT NULL ,
  `qnt_vendida` VARCHAR(45) NOT NULL ,
  `valor_recebido` VARCHAR(45) NOT NULL ,
  `Tipo_Modelo_idTipo_Modelo1` INT NOT NULL ,
  PRIMARY KEY (`idModelo`) ,
  INDEX `fk_Modelo_Tipo_Modelo1_idx` (`Tipo_Modelo_idTipo_Modelo1` ASC) ,
  CONSTRAINT `fk_Modelo_Tipo_Modelo1`
    FOREIGN KEY (`Tipo_Modelo_idTipo_Modelo1` )
    REFERENCES `matanay`.`Tipo_Modelo` (`idTipo_Modelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Relatorio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Relatorio` (
  `idRelatorio` INT NOT NULL AUTO_INCREMENT ,
  `arquivo` LONGBLOB NOT NULL ,
  `periodo_apuracao` DATE NOT NULL ,
  `data_importacao` DATE NOT NULL ,
  `Modelo_idModelo` INT NOT NULL ,
  `Modelo_Tipo_Modelo_idTipo_Modelo` INT NOT NULL ,
  PRIMARY KEY (`idRelatorio`) ,
  INDEX `fk_Relatorio_Modelo1_idx` (`Modelo_idModelo` ASC, `Modelo_Tipo_Modelo_idTipo_Modelo` ASC) ,
  CONSTRAINT `fk_Relatorio_Modelo1`
    FOREIGN KEY (`Modelo_idModelo` )
    REFERENCES `matanay`.`Modelo` (`idModelo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Moeda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Moeda` (
  `idMoeda` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `sigla` VARCHAR(45) NULL ,
  `taxa_cambio` INT NULL ,
  PRIMARY KEY (`idMoeda`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Imposto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Imposto` (
  `idImposto` INT NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `valor` INT NOT NULL ,
  PRIMARY KEY (`idImposto`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Funcionalidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Funcionalidades` (
  `idFuncionalidades` INT NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idFuncionalidades`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Telefone`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Telefone` (
  `idTelefone` INT NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(45) NOT NULL ,
  `Entidade_idEntidade` INT NOT NULL ,
  PRIMARY KEY (`idTelefone`) ,
  INDEX `fk_Telefone_Entidade1_idx` (`Entidade_idEntidade` ASC) ,
  CONSTRAINT `fk_Telefone_Entidade1`
    FOREIGN KEY (`Entidade_idEntidade` )
    REFERENCES `matanay`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Faixa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Faixa` (
  `idFaixa` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `isrc` VARCHAR(45) NOT NULL ,
  `percentual_artista` INT NOT NULL ,
  `percentual_autor` INT NOT NULL ,
  `percentual_produtor` INT NOT NULL ,
  `Album_idAlbum` INT NOT NULL ,
  `Album_Tipo_Album_idTipo_Album` INT NOT NULL ,
  PRIMARY KEY (`idFaixa`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Faixa_has_Entidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Faixa_has_Entidade` (
  `Faixa_idFaixa` INT NOT NULL ,
  `Faixa_Album_idAlbum` INT NOT NULL ,
  `Faixa_Album_Tipo_Album_idTipo_Album` INT NOT NULL ,
  `Entidade_idEntidade` INT NOT NULL ,
  PRIMARY KEY (`Faixa_idFaixa`, `Faixa_Album_idAlbum`, `Faixa_Album_Tipo_Album_idTipo_Album`, `Entidade_idEntidade`) ,
  INDEX `fk_Faixa_has_Entidade_Entidade1_idx` (`Entidade_idEntidade` ASC) ,
  INDEX `fk_Faixa_has_Entidade_Faixa1_idx` (`Faixa_idFaixa` ASC, `Faixa_Album_idAlbum` ASC, `Faixa_Album_Tipo_Album_idTipo_Album` ASC) ,
  CONSTRAINT `fk_Faixa_has_Entidade_Faixa1`
    FOREIGN KEY (`Faixa_idFaixa` )
    REFERENCES `matanay`.`Faixa` (`idFaixa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Faixa_has_Entidade_Entidade1`
    FOREIGN KEY (`Entidade_idEntidade` )
    REFERENCES `matanay`.`Entidade` (`idEntidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `matanay`.`Funcionalidades_has_Perfis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `matanay`.`Funcionalidades_has_Perfis` (
  `Funcionalidades_idFuncionalidades` INT NOT NULL ,
  `Perfis_idPerfis` INT NOT NULL ,
  PRIMARY KEY (`Funcionalidades_idFuncionalidades`, `Perfis_idPerfis`) ,
  INDEX `fk_Funcionalidades_has_Perfis_Perfis1_idx` (`Perfis_idPerfis` ASC) ,
  INDEX `fk_Funcionalidades_has_Perfis_Funcionalidades1_idx` (`Funcionalidades_idFuncionalidades` ASC) ,
  CONSTRAINT `fk_Funcionalidades_has_Perfis_Funcionalidades1`
    FOREIGN KEY (`Funcionalidades_idFuncionalidades` )
    REFERENCES `matanay`.`Funcionalidades` (`idFuncionalidades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionalidades_has_Perfis_Perfis1`
    FOREIGN KEY (`Perfis_idPerfis` )
    REFERENCES `matanay`.`Perfis` (`idPerfis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `matanay` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
