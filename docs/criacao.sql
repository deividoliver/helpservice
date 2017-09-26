-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema help_service
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `help_service` ;

-- -----------------------------------------------------
-- Schema help_service
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `help_service` DEFAULT CHARACTER SET utf8 ;
USE `help_service` ;

-- -----------------------------------------------------
-- Table `help_service`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `help_service`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `help_service`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `apelido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `celular` VARCHAR(11) NOT NULL,
  `perfil` CHAR NOT NULL DEFAULT 'U' COMMENT 'U = Usuário\nA = Administrador',
  `foto` VARCHAR(200) NULL,
  `nascimento` DATE NOT NULL,
  `cpf` VARCHAR(11) NULL,
  `endereco` VARCHAR(100) NULL,
  `numero` VARCHAR(45) NULL,
  `complemento` VARCHAR(100) NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(2) NULL,
  `saldo` INT(11) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `apelido_UNIQUE` (`apelido` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `help_service`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `help_service`.`categorias` ;

CREATE TABLE IF NOT EXISTS `help_service`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` TEXT(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `help_service`.`servicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `help_service`.`servicos` ;

CREATE TABLE IF NOT EXISTS `help_service`.`servicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `descricao` VARCHAR(200) NOT NULL,
  `moedas` INT(11) NOT NULL,
  `cadastro` DATETIME NOT NULL,
  `usuario_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servicos_usuarios1_idx` (`usuario_id` ASC),
  INDEX `fk_servicos_categorias1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_servicos_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `help_service`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicos_categorias1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `help_service`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `help_service`.`contratacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `help_service`.`contratacoes` ;

CREATE TABLE IF NOT EXISTS `help_service`.`contratacoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `servico_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `cadastro` DATETIME NOT NULL,
  `moedas` INT(11) NOT NULL,
  `status` CHAR NOT NULL,
  `avaliacao` INT(11) NULL COMMENT 'avaliação de 1 até 5',
  PRIMARY KEY (`id`),
  INDEX `fk_cotratacoes_servicos1_idx` (`servico_id` ASC),
  INDEX `fk_cotratacoes_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_cotratacoes_servicos1`
    FOREIGN KEY (`servico_id`)
    REFERENCES `help_service`.`servicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cotratacoes_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `help_service`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `help_service`.`cotacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `help_service`.`cotacoes` ;

CREATE TABLE IF NOT EXISTS `help_service`.`cotacoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valor` DECIMAL(7,2) NOT NULL,
  `cadastro` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `help_service`.`compras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `help_service`.`compras` ;

CREATE TABLE IF NOT EXISTS `help_service`.`compras` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cadastro` DATETIME NOT NULL,
  `moedas` INT NOT NULL,
  `status` CHAR NOT NULL,
  `valor_total` DECIMAL(7,2) NOT NULL,
  `usuario_id` INT NOT NULL,
  `cotacao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compras_usuarios1_idx` (`usuario_id` ASC),
  INDEX `fk_compras_cotacoes1_idx` (`cotacao_id` ASC),
  CONSTRAINT `fk_compras_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `help_service`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_cotacoes1`
    FOREIGN KEY (`cotacao_id`)
    REFERENCES `help_service`.`cotacoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
