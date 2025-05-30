<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error) {
            die("Connessione al db fallita.");
        }
    }

    /*
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                                         USER FUNCTIONS
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */

    // Ricava tutti i prodotti disponibili
    public function getProducts() {
        $stmt = $this->db->prepare("SELECT 
                                        p.idprodotto,
                                        m.idmodello,
                                        m.nome AS modello,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria SEPARATOR ', ') AS categorie,
                                        m.marca,
                                        m.colore,
                                        m.prezzo,
                                        m.disponibilità,
                                        m.descrizione,
                                        m.dettagli,
                                        m.titoloDescrizione,
                                        m.immagine
                                    FROM modelli m
                                    JOIN prodotti p ON p.idmodello = m.idmodello
                                    LEFT JOIN appartenenze a ON a.idmodello = m.idmodello
                                    LEFT JOIN categorie c ON a.idcategoria = c.idcategoria
                                    GROUP BY p.idprodotto, m.idmodello, m.nome, m.marca, m.colore, m.prezzo, m.disponibilità, m.descrizione, m.dettagli, m.titoloDescrizione, m.immagine");
    
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Contiene la logica per il login dell'utente
    public function login($email, $password) {
        if ($stmt = $this->db->prepare("SELECT idutente, tipo, email, password, salt FROM utenti WHERE email = ? LIMIT 1")) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($user_id, $type, $email, $db_password, $salt);
            $stmt->fetch();
            $password = hash('sha512', $password . $salt);
            if ($stmt->num_rows == 1) { // se l'utente esiste
                if ($db_password == $password) {
                    // Password corretta
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $login_data['login_string'] = hash('sha512', $password . $user_browser);
                    $login_data['idutente'] = preg_replace("/[^0-9]+/", "", $user_id); // prevenzione XSS
                    $login_data['email'] = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email); // prevenzione XSS
                    $login_data['tipo'] = $type;
                    registerLoggedUser($login_data);
                    // Login eseguito con successo.
                    return true;
                } else {
                    // Password incorretta.
                    $now = time();
                    $this->db->query("INSERT INTO tentativi_login (idutente, data) VALUES ('$user_id', '$now')");
                    return false;
                }
            } else {
                // L'utente inserito non esiste.
                return false;
            }
        }
    }

    // Restituisce false se l'user agent è cambiato dopo il login (prevenzione hijacking della sessione)
    public function login_check($user_id, $login_string, $user_browser) {
        if ($stmt = $this->db->prepare("SELECT password FROM utenti WHERE idutente = ? LIMIT 1")) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();

            if (!empty($result)) {
                $login_check = hash('sha512', $result['password'] . $user_browser);
                if ($login_check == $login_string) {
                    // Login eseguito!!!!
                    return true;
                }
            }
        }
        return false;
    }

    // Controlla se un indirizzo email utilizzato è già presente del database
    public function getUser($email) {
        $query = "SELECT email FROM utenti WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Registra un nuovo utente
    public function registerUser($name, $surname, $bday, $sex, $phone, $email, $password, $salt) {
        do {
            // creazione ID utente univoco
            $userID = random_int(0, PHP_INT_MAX);
            $usedIDs = $this->db->query("SELECT COUNT(*) AS usedIDs FROM utenti WHERE idutente = $userID");
            $result = $usedIDs->fetch_assoc();
        } while($result['usedIDs'] != 0);
        // registrazione utente
        $query = "INSERT INTO utenti (idutente, nome, cognome, dataNascita, numeroTelefono, sesso, email, password, salt, tipo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'cliente')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('issssssss', $userID, $name, $surname, $bday, $phone, $sex, $email, $password, $salt);
        $stmt->execute();
    }

    // Ricava tutte le notifiche collegate ad un determinato utente
    public function getUserNotifications($userID) {
        $query = "SELECT n.idnotifica, DATE_FORMAT(n.data, '%d-%m-%Y %H:%i') AS data, n.stato, n.titolo, n.tipo, n.messaggio
                    FROM notifiche n
                    INNER JOIN ricezioni r 
                    ON n.idnotifica = r.idnotifica
                    WHERE r.idutente = ?
                    ORDER BY n.data DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Cambia lo stato di una determinata notifica
    public function changeNotificationStatus($userID, $notifID, $newStatus) {
        $stmt = $this->db->prepare("UPDATE notifiche n
                                    JOIN ricezioni r ON n.idnotifica = r.idnotifica
                                    SET n.stato = ?
                                    WHERE r.idutente = ?
                                    AND n.idnotifica = ?");
        $stmt->bind_param('sii', $newStatus, $userID, $notifID);
        $stmt->execute();
    }

    // Elimina una notifica utente dal database
    public function deleteNotification($userID, $notifID) {
        try {
        $this->db->begin_transaction();
        
        $stmt1 = $this->db->prepare("DELETE FROM ricezioni WHERE idutente = ? AND idnotifica = ?");
        $stmt1->execute([$userID, $notifID]);
        $stmt2 = $this->db->prepare("DELETE FROM notifiche WHERE idnotifica = ?");
        $stmt2->execute([$notifID]);
        
        $this->db->commit();
        
        } catch (PDOException $e) {
            $this->db->rollback();
            echo "Errore: " . $e->getMessage();
        }
    }

    // Ricava tutte le informazioni di un determinato utente registrate nel database
    public function getUserInfo($userID) {
        $query = "SELECT nome, cognome, DATE_FORMAT(dataNascita, '%Y-%m-%d') AS dataNascita, sesso, numeroTelefono, email FROM utenti WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Aggiorna le informazioni di un determinato utente sostituendole con quelle passate in input
    public function updateUserInfo($userID, $name, $surname, $bday, $sex, $phone, $email) {
        $query = "UPDATE utenti
                    SET nome = ?,
                        cognome = ?,
                        dataNascita = ?,
                        sesso = ?,
                        numeroTelefono = ?,
                        email = ?
                    WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssi', $name, $surname, $bday, $sex, $phone, $email, $userID);
        $stmt->execute();
    }

    // Ricava la password di un determinato profilo utente
    public function getUserPwd($userID) {
        $query = "SELECT password FROM utenti WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Aggiorna la password di un determinato profilo utente
    public function updateUserPwd($userID, $newPwd) {
        $query = "UPDATE utenti
                    SET password = ?
                    WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $newPwd, $userID);
        $stmt->execute();
    }

    // Ricava tutti gli ordini appartenenti ad un determinato utente
    public function getUserOrders($userID) {
        $query = "SELECT o.idordine AS numeroOrdine, o.data AS dataOrdine, SUM(m.prezzo) AS prezzoTotale
                  FROM ordini o
                  JOIN presenze pr ON o.idordine = pr.idordine
                  JOIN prodotti p ON pr.idprodotto = p.idprodotto
                  JOIN modelli m ON p.idmodello = m.idmodello
                  WHERE o.idutente = ?
                  GROUP BY o.idordine, o.data";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Restituisce TRUE se il prodottoè valido
    public function isProductIdValid($productID) {
        $stmt = $this->db->prepare("SELECT
                                    idprodotto
                                    FROM prodotti
                                    WHERE idprodotto = ?
                                    LIMIT 1");
        $stmt->bind_param('i', $productID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    // Ricava la quantità disponibile di un determinato prodotto
    public function getProductAvailability($productID) {
        $stmt = $this->db->prepare("SELECT
                                    m.disponibilità
                                    FROM modelli m
                                    JOIN prodotti p ON m.idmodello = p.idmodello
                                    WHERE p.idprodotto = ?
                                    LIMIT 1");
        $stmt->bind_param('i', $productID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return (int) $row['disponibilità'];
    }

    // Ricava i prodotti aggiunti al carello da un determinato utente
    public function getCartItems($userID) {
        $stmt = $this->db->prepare("SELECT
                                    	m.nome AS modello,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria SEPARATOR ', ') AS categorie,
                                        m.marca,
                                        m.colore,
                                        m.prezzo,
                                        carr.quantitàAggiunta,
                                        carr.tagliaAggiunta,
                                        m.immagine,
                                        p.idmodello
									FROM modelli m
                                    JOIN prodotti p ON p.idmodello = m.idmodello
                                    JOIN carrello carr ON carr.idprodotto = p.idprodotto
                                    JOIN appartenenze a ON a.idmodello = m.idmodello
                                    JOIN categorie c ON a.idcategoria = c.idcategoria
									WHERE carr.idutente = ?
                                    GROUP BY m.idmodello, carr.tagliaAggiunta");
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Ricava uno specifico prodotto aggiunto al carrello da un determinato utente
    public function getCartItem($userID, $productID, $size) {
                $stmt = $this->db->prepare("SELECT *
                                            FROM carrello
                                            WHERE idutente = ?
                                            AND idprodotto = ?
                                            AND tagliaAggiunta = ?");
        $stmt->bind_param('iii', $userID, $productID, $size);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Restituisce la quantità del prodotto aggiunto al carrello da un determinato utente
    public function getProductAmountInCart($userID, $productID) {
        $stmt = $this->db->prepare("SELECT
                                    COALESCE(SUM(quantitàAggiunta), 0) AS quantitàTotale
                                    FROM carrello
                                    WHERE idutente = ?
                                    AND idprodotto = ?");
        $stmt->bind_param('ii', $userID, $productID);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return (int) $row['quantitàTotale'];
    }

    // Svuota il carrello di un determinato utente
    public function emptyCart($userID) {
        $stmt = $this->db->prepare("DELETE FROM carrello
                                    WHERE idutente = ?");
        $stmt->bind_param('i', $userID);
        $stmt->execute();
    }

    // Aggiunge un prodotto al carrello
    public function addItemToCart($userID, $productID, $size, $amount) {
        $stmt = $this->db->prepare("INSERT INTO carrello (idutente, idprodotto, tagliaAggiunta, quantitàAggiunta)
                                    VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiii', $userID, $productID, $size, $amount);
        $stmt->execute();
    }

    // Aggiorna un prodotto all'interno del carrello
    public function updateCartItem($userID, $productID, $oldSize, $newSize, $amount) {
        $stmt = $this->db->prepare("UPDATE carrello c
                                    SET c.quantitàAggiunta = ?,
                                        c.tagliaAggiunta = ?
                                    WHERE c.idutente = ?
                                    AND c.idprodotto = ?
                                    AND c.tagliaAggiunta = ?");
        $stmt->bind_param('iiiii', $amount, $newSize, $userID, $productID, $oldSize);
        $stmt->execute();
    }

    // Rimuove un prodotto dal carello
    public function removeItemFromCart($userID, $productID, $size) {
        $stmt = $this->db->prepare("DELETE FROM carrello
                                    WHERE idutente = ?
                                    AND idprodotto = ?
                                    AND tagliaAggiunta = ?");
        $stmt->bind_param('iii', $userID, $productID, $size);
        $stmt->execute();
    }

    // Crea un nuovo ordine
    public function createOrder($userID) {
        $stmt = $this->db->prepare("INSERT INTO ordini (idutente, stato, data)
                                    VALUES (?, 'In elaborazione', NOW())");
        $stmt->bind_param('i', $userID);
        $stmt->execute();

        $stmt = $this->db->prepare("INSERT INTO presenze (idordine, idprodotto, taglia, quantità)
                                    SELECT
                                        LAST_INSERT_ID(),
                                        c.idprodotto,
                                        c.tagliaAggiunta,
                                        c.quantitàAggiunta
                                    FROM carrello c
                                    WHERE c.idutente = ?");
        $stmt->bind_param('i', $userID);
        $stmt->execute();
    }

    // Ricava tutti i prodotti in ordine decrescente da quello con il più alto numero di ordini
    public function getBestsellerProducts() {
        $stmt = $this->db->prepare("SELECT 
                                        p.idprodotto,
                                        m.idmodello,
                                        m.nome AS modello,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria SEPARATOR ', ') AS categorie,
                                        m.marca,
                                        m.colore,
                                        m.prezzo,
                                        m.disponibilità,
                                        m.descrizione,
                                        m.dettagli,
                                        m.titoloDescrizione,
                                        m.immagine,
                                        COALESCE(SUM(pr.quantità), 0) AS vendite
                                    FROM modelli m
                                    JOIN prodotti p ON p.idmodello = m.idmodello
                                    JOIN presenze pr ON pr.idprodotto = p.idprodotto
                                    LEFT JOIN appartenenze a ON a.idmodello = m.idmodello
                                    LEFT JOIN categorie c ON a.idcategoria = c.idcategoria
                                    GROUP BY p.idprodotto, m.idmodello, m.nome, m.marca, m.colore, m.prezzo, m.disponibilità, m.descrizione, m.dettagli, m.titoloDescrizione, m.immagine
                                    ORDER BY vendite DESC");
    
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    // Ricava tutti i prodotti ordinati a seconda della loro data di inserimento
    public function getNewProducts() {
        $stmt = $this->db->prepare("SELECT 
                                        p.idprodotto,
                                        m.idmodello,
                                        m.nome AS modello,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria SEPARATOR ', ') AS categorie,
                                        m.marca,
                                        m.colore,
                                        m.prezzo,
                                        m.disponibilità,
                                        m.descrizione,
                                        m.dettagli,
                                        m.titoloDescrizione,
                                        m.immagine,
                                        p.dataInserimento
                                    FROM modelli m
                                    JOIN prodotti p ON p.idmodello = m.idmodello
                                    LEFT JOIN appartenenze a ON a.idmodello = m.idmodello
                                    LEFT JOIN categorie c ON a.idcategoria = c.idcategoria
                                    GROUP BY p.idprodotto, m.idmodello, m.nome, m.marca, m.colore, m.prezzo, m.disponibilità, m.descrizione, m.dettagli, m.titoloDescrizione, m.immagine, p.dataInserimento
                                    ORDER BY p.dataInserimento DESC");
    
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }    
    
    /*
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                                         SELLER FUNCTIONS
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */

    // Ricava i dettagli del venditore tramite il suo id
    public function getSellerDetails($sellerId) {
        $stmt = $this->db->prepare("SELECT nome, cognome, dataNascita, email, password 
                                     FROM utenti 
                                     WHERE idutente = ? AND tipo = 'venditore'");
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_assoc(MYSQLI_ASSOC);
    }

    // Ricava il numero totale di vendite di un determinato venditore
    public function getTotalSales($sellerId) {
        $stmt = $this->db->prepare("SELECT SUM(pr.quantità) AS totalSales
                                    FROM presenze pr
                                    JOIN prodotti p ON pr.idprodotto = p.idprodotto
                                    WHERE p.idvenditore = ?");
    
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $row = $result->fetch_assoc();
        return isset($row['totalSales']) ? $row['totalSales'] : 0;
    }
    
             
    // Ricava i guadagni totali di un determinato venditore
    public function getTotalEarnings($sellerId) {
        $stmt = $this->db->prepare("SELECT SUM(pr.quantità * m.prezzo) AS totalEarnings
                                    FROM presenze pr
                                    JOIN prodotti p ON pr.idprodotto = p.idprodotto
                                    JOIN modelli m ON p.idmodello = m.idmodello
                                    WHERE p.idvenditore = ?");
    
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $row = $result->fetch_assoc();
        return isset($row['totalEarnings']) ? $row['totalEarnings'] : 0;
    }
    
    // Ritorna un array associativo con i dettagli del prodotto passato in input
    public function getProductDetails($productId) {
        $stmt = $this->db->prepare("SELECT 
                                        m.nome AS modello,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria ORDER BY c.nomeCategoria SEPARATOR ', ') AS categorie,
                                        m.marca,                      
                                        m.colore,
                                        m.prezzo,
                                        m.disponibilità,
                                        m.descrizione,
                                        m.dettagli,
                                        m.titoloDescrizione,
                                        m.immagine
                                    FROM prodotti p
                                    JOIN modelli m ON p.idmodello = m.idmodello
                                    JOIN appartenenze a ON m.idmodello = a.idmodello
                                    JOIN categorie c ON a.idcategoria = c.idcategoria
                                    WHERE p.idprodotto = ?
                                    GROUP BY p.idprodotto, m.nome, m.marca, m.colore, m.prezzo, m.disponibilità, 
                                             m.descrizione, m.dettagli, m.titoloDescrizione, m.immagine");
    
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $productDetails = $result->fetch_assoc();
    
        // Converte la stringa di categorie in un array
        if ($productDetails && isset($productDetails['categorie'])) {
            $productDetails['categorie'] = explode(', ', $productDetails['categorie']);
        }
    
        return $productDetails;
    }
    
    // Ricava l'elenco di prodotti messi in vendita da un determinato venditore
    public function getProductsBySeller($sellerId) {
        $stmt = $this->db->prepare("SELECT 
                                        pr.idprodotto, 
                                        m.nome AS modello, 
                                        pr.dataInserimento, 
                                        m.disponibilità, 
                                        m.immagine,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria ORDER BY c.nomeCategoria SEPARATOR ', ') AS categorie
                                    FROM prodotti pr
                                    JOIN modelli m ON pr.idmodello = m.idmodello
                                    JOIN appartenenze a ON m.idmodello = a.idmodello
                                    JOIN categorie c ON a.idcategoria = c.idcategoria
                                    WHERE pr.idvenditore = ?
                                    GROUP BY pr.idprodotto, m.nome, pr.dataInserimento, m.disponibilità, m.immagine");
    
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $products = [];
        while ($row = $result->fetch_assoc()) {
            if (isset($row['categorie'])) {
                $row['categorie'] = explode(', ', $row['categorie']);
            }
            $products[] = $row;
        }
    
        return $products;
    }
    
    // Ritorna un array associativo con gli ordini associati ad un determinato venditore,
    // nel seguente formato:
    // [id_ordine][data_ordine][prezzo totale][prodotti[dettagli prodotto 1], [dettagli prodotto 2]]
    public function getAllOrdersBySeller($sellerId) {
        $stmt = $this->db->prepare("SELECT 
                                        o.idordine, 
                                        o.data AS data_ordine, 
                                        o.stato, 
                                        p.idprodotto, 
                                        m.nome AS prodotto_nome, 
                                        p.quantità, 
                                        m.prezzo, 
                                        (p.quantità * m.prezzo) AS prezzo_totale_prodotto 
                                    FROM ordini o
                                    JOIN presenze p ON o.idordine = p.idordine
                                    JOIN prodotti pr ON p.idprodotto = pr.idprodotto
                                    JOIN modelli m ON pr.idmodello = m.idmodello
                                    WHERE pr.idvenditore = ? 
                                    ORDER BY o.idordine, p.idprodotto");
    
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();

        $result = $stmt->get_result();

        $orders = [];
    
        // Cicla attraverso i risultati
        while ($row = $result->fetch_assoc()) {
            $orderId = $row['idordine'];
    
            // Se l'ordine non è già nell'array, lo inizializziamo
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'idordine' => $row['idordine'],
                    'data_ordine' => $row['data_ordine'],
                    'stato' => $row['stato'],
                    'prezzo_totale' => 0,
                    'prodotti' => []
                ];
            }
    
            // Aggiungi il prodotto all'ordine
            $orders[$orderId]['prodotti'][] = [
                'idprodotto' => $row['idprodotto'],
                'prodotto_nome' => $row['prodotto_nome'],
                'quantità' => $row['quantità'],
                'prezzo' => $row['prezzo'],
                'prezzo_totale_prodotto' => $row['prezzo_totale_prodotto']
            ];
    
            // Aggiungi il prezzo totale del prodotto all'ordine
            $orders[$orderId]['prezzo_totale'] += $row['prezzo_totale_prodotto'];
        }
    
        $stmt->close();
    
        return $orders;
    }    
    
    // Ricava l'ID della categoria attraverso il relativo nome
    public function getCategoryIdByName($categoryName) {
        $stmt = $this->db->prepare("SELECT idcategoria FROM categorie WHERE nomeCategoria = ?");
        
        if ($stmt === false) {
            return null;
        }
    
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $stmt->bind_result($categoryId);
        
        if ($stmt->fetch()) {
            $stmt->close();
            return $categoryId;
        }
        
        $stmt->close();
        return null;
    }
    
    
    // Aggiorna un prodotto di un determinato venditore,
    // ritorna TRUE se l'aggiornamento è andato a buon fine,
    // FALSE altrimenti
    public function updateProductBySeller($userId, $productId, $nomeProdotto, $colore, $categoryIds, $marca, $disponibilita, $titoloDescrizione, $descrizione, $dettagli, $immagine) {
        $this->db->begin_transaction();
    
        try {
            // 1. Aggiornamento del prodotto (modello)
            $query = "UPDATE modelli SET nome = ?, colore = ?, marca = ?, disponibilità = ?, titoloDescrizione = ?, descrizione = ?, dettagli = ?
                    WHERE idmodello = (SELECT idmodello FROM prodotti WHERE idprodotto = ?)";

            $stmt = $this->db->prepare($query);
            if ($stmt === false) {
                throw new Exception("Errore nella preparazione della query di aggiornamento del modello");
            }
    
            $stmt->bind_param('sssisssi', $nomeProdotto, $colore, $marca, $disponibilita, $titoloDescrizione, $descrizione, $dettagli, $productId);
            $stmt->execute();
            $stmt->close();
    
            // 2. Aggiornamento delle categorie (elimina quelle esistenti e inserisci le nuove)
            $query = "DELETE FROM appartenenze WHERE idmodello = (SELECT idmodello FROM prodotti WHERE idprodotto = ?)";
            $stmt = $this->db->prepare($query);
            if ($stmt === false) {
                throw new Exception("Errore nella preparazione della query per eliminare categorie esistenti");
            }
            $stmt->bind_param('i', $productId);
            $stmt->execute();
            $stmt->close();
    
            foreach ($categoryIds as $categoryId) {
                $query = "INSERT INTO appartenenze (idmodello, idcategoria) 
                        SELECT idmodello, ? 
                        FROM modelli 
                        WHERE idmodello = (SELECT idmodello FROM prodotti WHERE idprodotto = ?)";
                        
                $stmt = $this->db->prepare($query);
                if ($stmt === false) {
                    throw new Exception("Errore nella preparazione della query per inserire categoria");
                }
    
                $stmt->bind_param('ii', $categoryId, $productId);
                $stmt->execute();
                $stmt->close();
            }
    
            // 3. Aggiornamento dell'immagine
            if ($immagine !== null) {
                $query = "UPDATE modelli SET immagine = ? WHERE idmodello = (SELECT idmodello FROM prodotti WHERE idprodotto = ?)";
                $stmt = $this->db->prepare($query);
                if ($stmt === false) {
                    throw new Exception("Errore nella preparazione della query per aggiornare l'immagine");
                }
    
                $stmt->bind_param('si', $immagine, $productId);
                $stmt->execute();
                $stmt->close();
            }
    
            // Commit della transazione
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            // Rollback in caso di errore
            $this->db->rollback();
            throw $e;
        }
    }

    // Ritorna lo stato di un ordine attraverso il relativo ID
    public function getOrderStatusById($orderId) {
        $stmt = $this->db->prepare("SELECT stato FROM ordini WHERE idordine = ?");
        
        if ($stmt === false) {
            return null;
        }
    
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $stmt->bind_result($orderStatus);
        $stmt->fetch();
        $stmt->close();
    
        return $orderStatus ? $orderStatus : null;
    }
    
    // Aggiorna lo stato di un determinato ordine
    public function updateOrderStatus($orderId, $newStatus) {
        $stmt = $this->db->prepare("UPDATE ordini SET stato = ? WHERE idordine = ?");
        
        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("si", $newStatus, $orderId);
        
        $success = $stmt->execute();
        $stmt->close();
        
        return $success;
    }
    
    // Ricava l'ID del cliente associato ad un determinato ordine
    public function getUserIdByOrderId($orderId) {
        $stmt = $this->db->prepare("SELECT idutente FROM ordini WHERE idordine = ?");
        
        if ($stmt === false) {
            return null;
        }
    
        $stmt->bind_param("i", $orderId);
        
        $stmt->execute();
        
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();
        
        return $userId ? $userId : null; 
    }
    
    // Aggiunge una nuova notifica relativa ad un nuovo ordine
    public function createOrderStatusNotification($message, $userId, $orderId, $status) {
 
        $structuredMessage = "Lo stato dell'ordine è cambiato in: " . $status . "\n" . $message;
    
        $notificationTitle = "Aggiornamento stato ordine #" . $orderId;
    
        $stmt = $this->db->prepare("INSERT INTO notifiche (data, titolo, messaggio) VALUES (NOW(), ?, ?)");
        $stmt->bind_param("ss", $notificationTitle, $structuredMessage);
        $stmt->execute();
    
        $notificationId = $stmt->insert_id;
        $stmt->close();
    
        if ($notificationId) {
            // Collega la notifica all'ordine nella tabella `relazioni`
            $stmt = $this->db->prepare("INSERT INTO relazioni (idnotifica, idordine) VALUES (?, ?)");
            $stmt->bind_param("ii", $notificationId, $orderId);
            $stmt->execute();
            $stmt->close();
    
            // Collega la notifica al cliente nella tabella `ricezioni`
            $stmt = $this->db->prepare("INSERT INTO ricezioni (idutente, idnotifica) VALUES (?, ?)");
            $stmt->bind_param("ii", $userId, $notificationId);
            $stmt->execute();
            $stmt->close();
    
            return true;
        }
    
        return false;
    }

    // Rimuove un prodotto dal database
    public function deleteProductById($productId) {
        $stmt = $this->db->prepare("DELETE FROM prodotti WHERE idprodotto = ?");
        
        if ($stmt === false) {
            return false;
        }
    
        $stmt->bind_param("i", $productId);
        $success = $stmt->execute();
        $stmt->close();
    
        return $success;
    }    
}

?>