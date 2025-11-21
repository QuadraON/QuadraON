
-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  `endereco` VARCHAR(45) NULL,
  `telefone` Varchar(20) NULL,
  `tipoUsuario` ENUM('ADM', 'LOCADOR', 'LOCATARIO') NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Quadra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Quadra` (
  `idQuadra` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `quadraTipo` ENUM('GRAMADO', 'SINTETICO', 'QUADRA', 'AREIA') NULL,
  `descricao` VARCHAR(45) NULL,
  `idUsuario` INT NOT NULL,
  `foto` VARCHAR(255) NULL,
  `endereco` VARCHAR(250) NULL,
  
  PRIMARY KEY (`idQuadra`),
  INDEX `fk_Quadra_Usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Quadra_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Reserva` (
  `idReserva` INT NOT NULL AUTO_INCREMENT,
  `idQuadra` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  `data` DATE NULL,
  `horaInicio` TIME NULL,
  `horaFim` TIME NULL,
  
  `situacaoPagamento` ENUM('PENDENTE', 'PAGO') NULL,
  `avaliacao` INT NULL,
  `comentario` VARCHAR(255) NULL,
  
  PRIMARY KEY (`idReserva`),
  INDEX `fk_Reserva_Quadra1_idx` (`idQuadra` ASC) ,
  INDEX `fk_Reserva_Usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Reserva_Quadra1`
    FOREIGN KEY (`idQuadra`)
    REFERENCES `Quadra` (`idQuadra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


/* Senha: 123 */
INSERT INTO Usuario (nome, email, senha, endereco, telefone, tipoUsuario) 
VALUES ('Rafael Viotto', 'rafael@gmail.com', '$2y$10$gCAcTQ0Hi3avHi18HArpFuyKvIvQK4Uk7zYKql4YGe9F1p9TeKMNe', 'Rua Armindo Mate', '45 999857228', 'ADM');
