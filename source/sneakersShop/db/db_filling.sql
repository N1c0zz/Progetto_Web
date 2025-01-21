USE `ns_kicks`;

-- -----------------------------------------------------
-- Inserimento nella tabella `utenti` (un cliente e un venditore)
-- -----------------------------------------------------
INSERT INTO `utenti` (`idutente`, `nome`, `cognome`, `dataNascita`, `numeroTelefono`, `sesso`, `email`, `password`, `tipo`) 
VALUES 
(1, 'Mario', 'Rossi', '1990-05-10', '3331234567', 'M', 'mario.rossi@example.com', 'hashed_password_cliente', 'cliente'),
(2, 'Luigi', 'Bianchi', '1985-08-20', '3339876543', 'M', 'luigi.bianchi@example.com', 'hashed_password_venditore', 'venditore');

-- -----------------------------------------------------
-- Inserimento nella tabella `categorie`
-- -----------------------------------------------------
INSERT INTO `categorie` (`idcategoria`, `nomeCategoria`) 
VALUES 
(1, 'Sneakers'),
(2, 'Stivali'),
(3, 'Sandali');

-- -----------------------------------------------------
-- Inserimento nella tabella `modelli`
-- -----------------------------------------------------
INSERT INTO `modelli` (`idmodello`, `prezzo`, `immagine`, `descrizione`, `nome`, `colore1`, `colore2`, `colore3`) 
VALUES 
(1, 89.99, NULL, 'Scarpe sportive di alta qualità', 'Nike Air Max', 'Bianco', 'Rosso', NULL),
(2, 129.99, NULL, 'Stivali resistenti per tutte le stagioni', 'Timberland Classic', 'Marrone', NULL, NULL);

-- -----------------------------------------------------
-- Inserimento nella tabella `prodotti` (varianti di taglie)
-- -----------------------------------------------------
INSERT INTO `prodotti` (`idprodotto`, `idutente`, `idcategoria`, `idmodello`, `quantità`, `taglia`, `dataInserimento`) 
VALUES 
(1, 2, 1, 1, 10, 38, NOW()), -- Nike Air Max, taglia 38
(2, 2, 1, 1, 15, 40, NOW()), -- Nike Air Max, taglia 40
(3, 2, 2, 2, 5, 42, NOW());  -- Timberland Classic, taglia 42

-- -----------------------------------------------------
-- Inserimento nella tabella `ordini`
-- -----------------------------------------------------
INSERT INTO `ordini` (`idordine`, `idutente`, `stato`, `data`) 
VALUES 
(1, 1, 'In elaborazione', '2025-01-20 14:30:00'),
(2, 1, 'Completato', '2025-01-19 10:00:00');

-- -----------------------------------------------------
-- Inserimento nella tabella `presenze` (prodotti associati agli ordini)
-- -----------------------------------------------------
INSERT INTO `presenze` (`idordine`, `idprodotto`, `quantità`) 
VALUES 
(1, 1, 2), -- Ordine 1: 2 paia di Nike Air Max, taglia 38
(1, 3, 1), -- Ordine 1: 1 paio di Timberland Classic, taglia 42
(2, 2, 1); -- Ordine 2: 1 paio di Nike Air Max, taglia 40

-- -----------------------------------------------------
-- Inserimento nella tabella `notifiche`
-- -----------------------------------------------------
INSERT INTO `notifiche` (`idnotifica`, `data`, `stato`, `tipo`, `messaggio`) 
VALUES 
(1, '2025-01-20 14:35:00', 'Nuovo ordine', 'venditore', 'Hai ricevuto un nuovo ordine.'),
(2, '2025-01-20 14:36:00', 'Stato aggiornato', 'cliente', 'Il tuo ordine è stato confermato.');

-- -----------------------------------------------------
-- Inserimento nella tabella `relazioni` (notifiche associate agli ordini)
-- -----------------------------------------------------
INSERT INTO `relazioni` (`idnotifica`, `idordine`) 
VALUES 
(1, 1), -- La notifica 1 si riferisce all'ordine 1
(2, 1); -- La notifica 2 si riferisce all'ordine 1

-- -----------------------------------------------------
-- Inserimento nella tabella `ricezioni` (notifiche ricevute da utenti)
-- -----------------------------------------------------
INSERT INTO `ricezioni` (`idutente`, `idnotifica`) 
VALUES 
(2, 1), -- Notifica per il venditore (Nuovo ordine)
(1, 2); -- Notifica per il cliente (Stato aggiornato)
