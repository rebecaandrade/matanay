CREATE TABLE IF NOT EXISTS `matanay`.`Vendas` (
  `idVendas` INT NOT NULL AUTO_INCREMENT,
  `idAlbum` INT NOT NULL,
  `idFaixa` INT NOT NULL,
  `idRelatorio` INT NOT NULL COMMENT '\n',
  `qnt_vendida` INT NULL,
  `valor_recebido` INT NULL,
  `loja` VARCHAR(45) NULL,
  `subloja` VARCHAR(45) NULL,
  `territorio` VARCHAR(45) NULL,
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