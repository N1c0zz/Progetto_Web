USE `ns_kicks`;

-- -----------------------------------------------------
-- Inserimento nella tabella `utenti` (un cliente e un venditore)
-- -----------------------------------------------------
INSERT INTO `utenti` (`idutente`, `nome`, `cognome`, `dataNascita`, `numeroTelefono`, `sesso`, `email`, `password`, `tipo`) 
VALUES 
(1, 'Mario', 'Rossi', '1990-05-10', '3331234567', 'Maschio', 'mario.rossi@example.com', 'hashed_password_cliente', 'cliente'),
(2, 'Luigi', 'Bianchi', '1985-08-20', '3339876543', 'Maschio', 'luigi.bianchi@example.com', 'hashed_password_venditore', 'venditore');

-- -----------------------------------------------------
-- Inserimento nella tabella `categorie`
-- -----------------------------------------------------
INSERT INTO `categorie` (`idcategoria`, `nomeCategoria`) 
VALUES 
(1, 'Sneakers'),
(2, 'Stivali'),
(3, 'Sandali'),
(4, 'Uomo'),
(5, 'Donna'),
(6, 'Bambino');

-- -----------------------------------------------------
-- Inserimento nella tabella `modelli`
-- -----------------------------------------------------
INSERT INTO `modelli` (`idmodello`, `marca`, `nome`, `colore`, `prezzo`, `immagine`, `titoloDescrizione`, `descrizione`, `dettagli`) 
VALUES 
(1, 'Nike', 'Nike Air Max', 'Bianco', 89.99, '314101996404_01.png', 'Scarpe sportive di alta qualità', 'Scarpe da running comode e resistenti per ogni occasione.', 'Suola ammortizzata, Tomaia in mesh traspirante'),
(2, 'Timberland', 'Timberland Classic', 'Marrone', 129.99, '314626811104_01.png', 'Stivali resistenti per tutte le stagioni', 'Stivali robusti ideali per terreni accidentati e pioggia.', 'Suola antiscivolo, Impermeabile, Fodera calda'),
(3, 'Nike', 'Nike Tuned 1', 'Nero', 189.99, '314206535404_01.png', 'Inno a una leggenda', 'Con le Nike Air Max Plus la tua energia audace e grintosa saprà farsi notare. Ispirate alla vita da spiaggia, queste sneakers di tendenza celebrano i gloriosi quattro decenni delle iconiche scarpe da corsa Pegasus di Nike. Caratterizzata da linee di design ondulate, la tomaia in pelle sintetica e mesh offre il massimo del comfort e un look alla moda. L''unità Max Air a effetto ammortizzante garantisce una reattività ottimale a ogni passo. Dotate di una suola antiscivolo in gomma, le Nike Air Max Plus sono tutto ciò di cui hai bisogno per muoverti in tutta sicurezza.', 'Tomaia in pelle sintetica e maglia di mesh; Linee ondulate sulla tomaia; Unità Air Max; Arco in plastica sull''intersuola; Suola in gomma'),
(4, 'Adidas', 'adidas Megaride', 'Bianco', 169.99, '314209829804_01.png', 'Oltre i tuoi limiti con stile', 'Quando il passato incontra il futuro, nascono le adidas Originals Megaride. Direttamente dalla tradizione adidas, queste scarpe ridefiniscono un modello intramontabile con un tocco di innovazione. Il design a tunnel aperto dell''intersuola non passa mai di moda, mentre la tomaia in mesh testurizzato e gli eleganti materiali sintetici catturano l''attenzione ovunque tu vada. Inoltre, il collo imbottito in neoprene assicura un''esperienza esclusiva all''insegna del comfort. Allaccia le adidas Originals Megaride e sfoggia un look unico e innovativo.', 'Vestibilità regular; Tomaia in mesh testurizzato; Design a tunnel aperto sull''intersuola; Collo imbottito in neoprene; Materiali sintetici testurizzati, Design a 3 righe in TPU sagomato'),
(5, 'New Balance', 'New Balance 530', 'Bianco', 119.99, '315240843102_01.png', 'Stile vintage, comfort imbattibile', 'Aggiungi alla tua collezione di sneakers quotidiana un tocco di stile vintage con le New Balance 530. Realizzate per garantire il massimo comfort con una nuova tecnologia, queste sneakers sono la combinazione perfetta tra lo stile rétro e l''estetica sportiva dei tempi moderni. La tomaia in materiale sintetico e mesh garantisce resistenza, massimo comfort e traspirabilità, per una sensazione di asciutto a ogni passo. Combinando ammortizzazione e resistenza alla compressione, l''intersuola ABZORB garantisce un eccezionale assorbimento degli urti, per camminare nella massima leggerezza.', 'Tomaia in materiale sintetico e mesh; Chiusura con lacci tono su tono; Caratteristico logo "N"; Intersuola con ammortizzazione ABZORB; Suola in gomma'),
(6, 'Puma', 'Puma X Spongebob Squarepants Rs-x', 'Nero-Lemon Meringue', 64.99, '316162369504_01.png', 'È tornato il Capitano!', 'Fai conoscere ai tuoi bambini l''incredibile amicizia tra Spongebob e Patrick con le PUMA x SPONGEBOB SQUAREPANTS RS-X. Frutto della collaborazione tra PUMA e la popolare serie televisiva di Nickelodeon Spongebob Squarepants, queste sneakers sono caratterizzate da una tomaia foderata in mesh per una traspirazione di lunga durata. La comoda soletta KinderFit garantisce una calzata corretta e un''ottima sensazione al tatto. Morbida ed elastica, l''intersuola ammortizzata in EVA è sinonimo di passi comodi e fluidi. Realizzate con gomma di alta qualità, la morbida intersuola e la suola aderente rendono le giornate dei tuoi piccoli camminatori ancora più divertenti.', 'Chiusura elastica e con gancio; Formstrip PUMA; Mascherina e pannello del rinforzo in pelle scamosciata; Logo PUMA x Spongebob Squarepants; Rivestimento in mesh; Soletta KinderFit; Intersuola in EVA; Suola in gomma');

-- -----------------------------------------------------
-- Inserimento nella tabella `appartenenze` (relazione tra modelli e categorie)
-- -----------------------------------------------------
INSERT INTO `appartenenze` (`idmodello`, `idcategoria`) 
VALUES 
(1, 1), -- Nike Air Max appartiene alla categoria Sneakers
(1, 4),
(2, 2), -- Timberland Classic appartiene alla categoria Stivali
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(6, 6);

-- -----------------------------------------------------
-- Inserimento nella tabella `prodotti` (varianti di taglie)
-- -----------------------------------------------------
INSERT INTO `prodotti` (`idprodotto`, `idutente`, `idcategoria`, `idmodello`, `quantità`, `taglia`, `dataInserimento`) 
VALUES 
(1, 2, 1, 1, 10, 38, NOW()), -- Nike Air Max, taglia 38
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
(1, 3, 1); -- Ordine 1: 1 paio di Timberland Classic, taglia 42

-- -----------------------------------------------------
-- Inserimento nella tabella `notifiche`
-- -----------------------------------------------------
INSERT INTO `notifiche` (`idnotifica`, `data`, `stato`, `titolo`, `tipo`, `messaggio`) 
VALUES 
(1, '2025-01-20 14:35:00', 'da_leggere', 'Nuovo ordine', 'venditore', 'Hai ricevuto un nuovo ordine.'),
(2, '2025-01-20 13:30:00', 'da_leggere', 'Ordine confermato', 'cliente', 'Il tuo ordine è stato confermato.'),
(3, '2025-01-21 15:02:00', 'da_leggere', 'Ordine spedito', 'cliente', 'Il tuo ordine è stato spedito.'),
(4, '2025-01-22 11:50:00', 'letta', 'Consegna effettuata', 'cliente', 'Il tuo ordine è stato consegnato.');

-- -----------------------------------------------------
-- Inserimento nella tabella `relazioni` (notifiche associate agli ordini)
-- -----------------------------------------------------
INSERT INTO `relazioni` (`idnotifica`, `idordine`) 
VALUES 
(1, 1), -- La notifica 1 si riferisce all'ordine 1
(2, 1), -- La notifica 2 si riferisce all'ordine 1
(3, 1), -- La notifica 3 si riferisce all'ordine 1
(4, 1); -- La notifica 4 si riferisce all'ordine 1

-- -----------------------------------------------------
-- Inserimento nella tabella `ricezioni` (notifiche ricevute da utenti)
-- -----------------------------------------------------
INSERT INTO `ricezioni` (`idutente`, `idnotifica`) 
VALUES 
(2, 1), -- Notifica per il venditore (Nuovo ordine)
(1, 2), -- Notifica per il cliente (ordine confermato)
(1, 3), -- Notifica per il cliente (ordine spedito)
(1, 4); -- Notifica per il cliente (ordine consegnato)