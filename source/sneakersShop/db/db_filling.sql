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
(6, 'Puma', 'Puma X Spongebob Squarepants Rs-x', 'Nero-Lemon Meringue', 64.99, '316162369504_01.png', 'È tornato il Capitano!', 'Fai conoscere ai tuoi bambini l''incredibile amicizia tra Spongebob e Patrick con le PUMA x SPONGEBOB SQUAREPANTS RS-X. Frutto della collaborazione tra PUMA e la popolare serie televisiva di Nickelodeon Spongebob Squarepants, queste sneakers sono caratterizzate da una tomaia foderata in mesh per una traspirazione di lunga durata. La comoda soletta KinderFit garantisce una calzata corretta e un''ottima sensazione al tatto. Morbida ed elastica, l''intersuola ammortizzata in EVA è sinonimo di passi comodi e fluidi. Realizzate con gomma di alta qualità, la morbida intersuola e la suola aderente rendono le giornate dei tuoi piccoli camminatori ancora più divertenti.', 'Chiusura elastica e con gancio; Formstrip PUMA; Mascherina e pannello del rinforzo in pelle scamosciata; Logo PUMA x Spongebob Squarepants; Rivestimento in mesh; Soletta KinderFit; Intersuola in EVA; Suola in gomma'),
(7, 'New Balance', 'New Balance 2002R', 'Verde Oliva', 99.99, '316705655104_01.png', 'Energia rétro, tutti i giorni', 'Dai energia alle tue giornate con le New Balance 2002R. Rivisitazione moderna del modello da running degli anni 2000, queste sneakers sono realizzate per esaltare il tuo stile quotidiano. La silhouette vintage è realizzata in pregiata pelle scamosciata e mesh per un comfort traspirante che dura tutto il giorno e un look unico. La tecnologia ACTEVA LITE nell''intersuola offre un''ammortizzazione imbattibile nel sottopiede, per il massimo della comodità e leggerezza. Grazie alla tecnologia Stability Web, la suola N-ergy garantisce aderenza e tenuta eccezionali per farti brillare a ogni passo.', 'Robusta tomaia in pelle; Chiusura con lacci; Collo e linguetta imbottiti; Intersuola ABZORB; Suola N-ergy con tecnologia Stability Web'),
(8, 'New Balance', 'New Balance 530', 'Grigio', 99.99, '316703913604_01.png', 'Scegli questo classico', 'Sfoggia un look vintage con lo stile sportivo delle New Balance 530. Radicate nella tradizione della corsa, queste sneakers rivisitate richiamano il classico stile sportivo con una nuova energia. La tomaia sintetica offre comfort per tutta la giornata e un look elegante ma grintoso. Combinando ammortizzazione e resistenza alla compressione, l''intersuola ABZORB dona elasticità e leggerezza a ogni passo.', 'Struttura sintetica della tomaia; Chiusura stringata; Intersuola ABZORB'),
(9, 'Adidas', 'adidas La Trainer 2', 'Collegiate Navy', 69.99, '316705660104_01.png', 'Affronta ogni avventura nel massimo comfort', 'Progettate per assicurare prestazioni imbattibili, stile e massima libertà di movimento, le adidas La Trainer II sono ideali per i bambini che non si fermano mai. La robusta tomaia in pelle con elementi in tessuto traspirante offre un look elegante e dinamico. L''intersuola in EVA offre una sensazione di ammortizzazione e leggerezza, mentre la resistente suola in gomma consente ai tuoi piccoli di affrontare ogni avventura nel massimo del comfort. Perfette per le loro avventure, queste scarpe uniscono la resistenza dell''abbigliamento sportivo outdoor con un audace logo adidas Trefoil e una grafica ispirata alle montagne sulla linguetta. Ogni passo diventa un''avventura di stile con le adidas La Trainer II.', 'Tomaia in pelle; Elementi in tessuto; Intersuola in EVA; Linguetta sul tallone e quarto con gli iconici loghi adidas; Esclusivo design a 3 righe; Soletta con logo adidas Trefoil e grafica ispirata alle montagne; Linguetta con logo adidas Trefoil e grafica ispirata alle montagne; Robusta suola in gomma'),
(10, 'Timberland', 'Timberland Greyfield', 'Nero', 89.99, '315552333502_01.png', 'Un salto di stile sostenibile', 'Esalta la tua collezione di calzature con gli stivali Timberland Greyfield. Realizzati in pelle pregiata, questi stivali stringati offrono una calzata sicura. Promotori di sostenibilità, presentano una fodera in tessuto ReBOTL realizzata con almeno il 50% di plastica riciclata. Goditi il comfort del plantare OrthoLite e dell''intersuola in EVA a contatto con il terreno. Rifiniti con cuscinetti in gomma sulla suola per un''aderenza e una resistenza ottimali.', 'Struttura in pelle; Chiusura con lacci; Rivestimento in tessuto ReBOTL; Soletta OrthoLite; Intersuola in EVA a contatto con il terreno; Suola in gomma con cuscinetti; Altezza tacco: 3,2 cm'),
(11, 'Puma', 'Puma Mayze Chelsea', 'Alpine Snow', 129.99, '315551946502_01.png', 'Stile Chelsea', 'Dai un tocco di stile ai tuoi passi con i PUMA Mayze Chelsea. Nati dalla collaborazione tra PUMA e Dua Lipa, questi stivali sono pensati per chi come te ha una passione per la moda urban. La silhouette con plateau è rivestita in materiale simile alla gomma per una maggiore durata e un tocco di grinta. Caratterizzati dall''inconfondibile stile Chelsea, gli inserti elastici sul quarto consentono una facile calzata e un''ottima vestibilità. Realizzata per offrire un''ammortizzazione eccellente, la soletta SOFTFOAM in materiale sintetico ammortizza i tuoi passi mentre domini le strade con il tuo stile di tendenza.', 'Silhouette con plateau; Tomaia in simil-gomma; Passante sul tallone in simil-gomma con logo PUMA inciso e stampato; Pannelli elastici sul quarto; Etichetta in tessuto ripiegata sul quarto con logo PUMA; Soletta sintetica SOFTFOAM; Intersuola in gomma; Suola in gomma'),
(12, 'Timberland', 'Timberland Motion 6 Mid', 'Nero', 169.99, '314626810304_01.png', 'Sostenibilità garantita', 'Le escursioni e le avventure ti emozionano? Le Timberland GreenStride Motion 6 Mid le rendono elettrizzanti. Progettate per offrirti comfort e sicurezza su ogni tipo di terreno, queste robuste scarpe assicurano inoltre un impatto ambientale ridotto. La tomaia vanta un mix di pelle Timberland e tessuto ReBOTL, per una resistenza e un comfort ecosostenibili. Realizzata in misto EVA che include materiali a base biologica, la suola GreenStride garantisce un''eccezionale agilità e ammortizzazione. Perfetta per affrontare sentieri polverosi e rocciosi, offre un comfort senza pari e ti rende implacabile in ogni avventura!', 'Tomaia in pelle Timberland e tessuto ReBOTL; Modello con lacci; Soletta sagomata rimovibile; Suola GreenStride; Suola in gomma; Rivestimento in tessuto ReBOTL realizzato con almeno il 50% di plastica riciclata; Suola GreenStride realizzata con una miscela EVA che include almeno il 65% di materiali a base biologica derivati da canna da zucchero e gomma coltivata in modo responsabile; Prodotto d''importazione');

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
(4, 5),
(5, 1),
(5, 5),
(6, 1),
(6, 6),
(7, 1),
(7, 6),
(8, 1),
(8, 6),
(9, 1),
(9, 6),
(10, 3),
(10, 5),
(11, 2),
(11, 5),
(12, 2),
(12, 4);

-- -----------------------------------------------------
-- Inserimento nella tabella `prodotti` (varianti di taglie)
-- -----------------------------------------------------
INSERT INTO `prodotti` (`idprodotto`, `idutente`, `idcategoria`, `idmodello`, `quantità`, `taglia`, `dataInserimento`) 
VALUES 
(1, 2, 1, 1, 10, 38, NOW()), -- Nike Air Max, taglia 38
(3, 2, 2, 2, 4, 42, NOW()),  -- Timberland Classic, taglia 42
(2, 2, 2, 3, 10, 42, NOW()),
(4, 2, 2, 4, 3, 42, NOW()),
(5, 2, 2, 5, 7, 42, NOW()),
(6, 2, 2, 6, 7, 42, NOW()),
(7, 2, 2, 7, 5, 42, NOW()),
(8, 2, 2, 8, 9, 42, NOW()),
(9, 2, 2, 9, 12, 42, NOW()),
(10, 2, 2, 10, 2, 42, NOW()),
(11, 2, 2, 11, 1, 42, NOW()),
(12, 2, 2, 12, 15, 42, NOW());

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