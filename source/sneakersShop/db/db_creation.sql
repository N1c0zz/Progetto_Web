SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `ns_kicks` DEFAULT CHARACTER SET utf8;
USE `ns_kicks`;

CREATE USER 'ns_user'@'localhost' IDENTIFIED BY '';

-- -----------------------------------------------------
-- Table `utenti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `utenti` (
  `idutente` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL,
  `cognome` VARCHAR(100) NOT NULL,
  `dataNascita` DATE NOT NULL,           /* Format YYYY-MM-DD */
  `numeroTelefono` VARCHAR(15) NOT NULL,
  `sesso` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` CHAR(128) NOT NULL,
  `salt` CHAR(128) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tentativi_login` (
  `idutente` BIGINT NOT NULL,
  `data` VARCHAR(30) NOT NULL
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nomeCategoria` VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modelli`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modelli` (
  `idmodello` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `disponibilità` INT NOT NULL,
  `marca` VARCHAR(50) NOT NULL,
  `prezzo` DECIMAL(10,2) NOT NULL,
  `immagine` VARCHAR(50) NULL,
  `titoloDescrizione` VARCHAR(50) NOT NULL,
  `descrizione` MEDIUMTEXT NOT NULL,
  `dettagli` MEDIUMTEXT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `colore` VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `appartenenze`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appartenenze` (
  `idmodello` INT NOT NULL,
  `idcategoria` INT NOT NULL,
  PRIMARY KEY (`idmodello`, `idcategoria`),
  CONSTRAINT `fk_appartenenze_idmodello`
    FOREIGN KEY (`idmodello`)
    REFERENCES `modelli`(`idmodello`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_appartenenze_idcategoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `categorie`(`idcategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `prodotti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prodotti` (
  `idprodotto` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idvenditore` BIGINT NOT NULL,
  `idmodello` INT NOT NULL,
  `dataInserimento` DATETIME NOT NULL,
  CONSTRAINT `fk_prodotti_idvenditore`
    FOREIGN KEY (`idvenditore`)
    REFERENCES `utenti`(`idutente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_prodotti_idmodello`
    FOREIGN KEY (`idmodello`)
    REFERENCES `modelli`(`idmodello`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `carrello`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrello` (
  `idutente` BIGINT NOT NULL,
  `idprodotto` INT NOT NULL,
  `quantitàAggiunta` INT NOT NULL,
  `tagliaAggiunta` INT NOT NULL,
  PRIMARY KEY(`idutente`,`idprodotto`,`tagliaAggiunta`),
  CONSTRAINT `fk_carrello_idutente`
    FOREIGN KEY (`idutente`)
    REFERENCES `utenti`(`idutente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_carrello_idprodotto`
    FOREIGN KEY (`idprodotto`)
    REFERENCES `prodotti`(`idprodotto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ordini`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ordini` (
  `idordine` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idutente` BIGINT NOT NULL,
  `stato` VARCHAR(50) NOT NULL,
  `data` DATETIME NOT NULL,              /* Format YYYY-MM-DD HH:MM:SS */
  CONSTRAINT `fk_ordini_idutente` 
    FOREIGN KEY (`idutente`) 
    REFERENCES `utenti`(`idutente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `presenze`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `presenze` (
  `idordine` INT NOT NULL,
  `idprodotto` INT NOT NULL,
  `taglia` INT NOT NULL,
  `quantità` INT NOT NULL,
  PRIMARY KEY (`idordine`, `idprodotto`),
  CONSTRAINT `fk_presenze_idordine`
    FOREIGN KEY (`idordine`)
    REFERENCES `ordini`(`idordine`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_presenze_idprodotto`
    FOREIGN KEY (`idprodotto`)
    REFERENCES `prodotti`(`idprodotto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `notifiche`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notifiche` (
  `idnotifica` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `data` DATETIME NOT NULL,
  `stato` VARCHAR(50) NOT NULL,
  `titolo` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(50) NOT NULL,
  `messaggio` MEDIUMTEXT NOT NULL
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `relazioni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `relazioni` (
  `idnotifica` INT NOT NULL,
  `idordine` INT NOT NULL,
  PRIMARY KEY (`idnotifica`, `idordine`),
  CONSTRAINT `fk_relazioni_idnotifica`
    FOREIGN KEY (`idnotifica`)
    REFERENCES `notifiche`(`idnotifica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_relazioni_idordine`
    FOREIGN KEY (`idordine`)
    REFERENCES `ordini`(`idordine`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ricezioni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ricezioni` (
  `idutente` BIGINT NOT NULL,
  `idnotifica` INT NOT NULL,
  PRIMARY KEY (`idutente`, `idnotifica`),
  CONSTRAINT `fk_ricezioni_idutente`
    FOREIGN KEY (`idutente`)
    REFERENCES `utenti`(`idutente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ricezioni_idnotifica`
    FOREIGN KEY (`idnotifica`)
    REFERENCES `notifiche`(`idnotifica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

GRANT SELECT, INSERT, UPDATE ON `ns_kicks`.* TO 'ns_user'@'localhost';
GRANT DELETE ON `ns_kicks`.carrello TO 'ns_user'@'localhost';
GRANT DELETE ON `ns_kicks`.appartenenze TO 'ns_user'@'localhost';
GRANT DELETE ON `ns_kicks`.prodotti TO 'ns_user'@'localhost';
FLUSH PRIVILEGES;
