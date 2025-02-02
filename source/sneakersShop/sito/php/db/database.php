<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error) {
            die("Connessione al db fallita.");
        }
    }

    // legge tutti i prodotti disponibili
    public function getProducts() {
        $stmt = $this->db->prepare("SELECT 
                                        m.nome AS modello,
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria SEPARATOR ', ') AS categorie,
                                        m.marca,
                                        m.colore,
                                        m.prezzo,
                                        COALESCE(SUM(p.quantità), 0) AS disponibilità,
                                        m.descrizione,
                                        m.dettagli,
                                        m.titoloDescrizione,
                                        m.immagine
                                    FROM modelli m
                                    LEFT JOIN prodotti p ON p.idmodello = m.idmodello
                                    LEFT JOIN appartenenze a ON a.idmodello = m.idmodello
                                    LEFT JOIN categorie c ON a.idcategoria = c.idcategoria
                                    GROUP BY m.idmodello");
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // controlla se esiste un'utente registrato con le credenziali fornite
    public function checkLogin($email, $password) {
        $query = "SELECT idutente, tipo, email FROM utenti WHERE email = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // conrolla se una email è già registrata nel db
    public function getUser($email) {
        $query = "SELECT email FROM utenti WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // registra un nuovo utente
    public function registerUser($name, $surname, $bday, $sex, $phone, $email, $password) {
        do {
            // creazione ID utente univoco
            $userID = random_int(0, PHP_INT_MAX);
            $usedIDs = $this->db->query("SELECT COUNT(*) AS usedIDs FROM utenti WHERE idutente = $userID");
            $result = $usedIDs->fetch_assoc();
        } while($result['usedIDs'] != 0);
        // registrazione utente
        $query = "INSERT INTO utenti (idutente, nome, cognome, dataNascita, numeroTelefono, sesso, email, password, tipo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'cliente')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isssssss', $userID, $name, $surname, $bday, $phone, $sex, $email, $password);
        $stmt->execute();
    }

    // legge le notifiche dell'utente
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

    public function getUserInfo($userID) {
        $query = "SELECT nome, cognome, DATE_FORMAT(dataNascita, '%Y-%m-%d') AS dataNascita, sesso, numeroTelefono, email FROM utenti WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

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

    public function getUserPwd($userID) {
        $query = "SELECT password FROM utenti WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateUserPwd($userID, $newPwd) {
        $query = "UPDATE utenti
                    SET password = ?
                    WHERE idutente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $newPwd, $userID);
        $stmt->execute();
    }

    /*
    ------------------------------------------------
    SELLER FUNCTIONS
    ------------------------------------------------
    */

    // ritorna i dettagli del venditore tramite il suo id
    public function getSellerDetails($sellerId) {
        $stmt = $this->db->prepare("SELECT nome, cognome, dataNascita, email, password 
                                     FROM utenti 
                                     WHERE idutente = ? AND tipo = 'venditore'");
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_assoc(MYSQLI_ASSOC);
    }

    // ritorna il numero di vendite del venditore
    // funzione SQL COALESCE --> se il valore trovato è NULL lo ritorna come zero
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
    
             
    // ritorna i guadagni totali del venditore
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
    
    
    // ritorna un array associativo con i dettagli del prodotto passato in input
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
                                        m.titoloDescrizione
                                    FROM prodotti p
                                    JOIN modelli m ON p.idmodello = m.idmodello
                                    JOIN appartenenze a ON m.idmodello = a.idmodello
                                    JOIN categorie c ON a.idcategoria = c.idcategoria
                                    WHERE p.idprodotto = ?
                                    GROUP BY p.idprodotto, m.nome, m.marca, m.colore, m.prezzo, m.disponibilità, m.descrizione, m.dettagli, m.titoloDescrizione");
    
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $productDetails = $result->fetch_assoc();
    
        // Convertire la stringa di categorie in un array
        if ($productDetails && isset($productDetails['categorie'])) {
            $productDetails['categorie'] = explode(', ', $productDetails['categorie']);
        }
    
        return $productDetails;
    }
    
    
    // ritorna l'elenco di prodotti di un seller
    public function getProductsBySeller($sellerId) {
        $stmt = $this->db->prepare("SELECT 
                                        pr.idprodotto, 
                                        m.nome AS modello, 
                                        pr.dataInserimento, 
                                        m.disponibilità, 
                                        GROUP_CONCAT(DISTINCT c.nomeCategoria ORDER BY c.nomeCategoria SEPARATOR ', ') AS categorie
                                    FROM prodotti pr
                                    JOIN modelli m ON pr.idmodello = m.idmodello
                                    JOIN appartenenze a ON m.idmodello = a.idmodello
                                    JOIN categorie c ON a.idcategoria = c.idcategoria
                                    WHERE pr.idvenditore = ?
                                    GROUP BY pr.idprodotto, m.nome, pr.dataInserimento, m.disponibilità");
    
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $products = [];
        while ($row = $result->fetch_assoc()) {
            // Convertire le categorie in array
            if (isset($row['categorie'])) {
                $row['categorie'] = explode(', ', $row['categorie']);
            }
            $products[] = $row;
        }
    
        return $products;
    }
    

    // ritorna un array associativo con gli ordini associati ad un venditore,
    // nel formato
    // [id_ordine][data_ordine][prezzo totale][prodotti[dettagli prodotto 1], [dettagli prodotto 2]]
    public function getAllOrdersBySeller($sellerId) {
        // Prepara la query per ottenere gli ordini e i dettagli dei prodotti
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
    
        // Associa il parametro del venditore alla query
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        
        // Ottieni il risultato
        $result = $stmt->get_result();
    
        // Array per memorizzare gli ordini
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
    
        // Chiudi la dichiarazione
        $stmt->close();
    
        // Ritorna l'array degli ordini
        return $orders;
    }    
    
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
    
    
    // aggiorna un prodotto di un determinato venditore, ritorna true se l'aggiornamento è andato a buon fine, false altrimenti
    public function updateProductBySeller($sellerId, $productId, $name, $color, $categoryId, $brand, $availability, $descriptionTitle, $description, $details) {
        $stmt = $this->db->prepare("UPDATE prodotti p
                                    JOIN modelli m ON p.idmodello = m.idmodello
                                    SET m.nome = ?, m.colore = ?, p.idcategoria = ?, m.marca = ?, 
                                        p.quantità = ?, m.titoloDescrizione = ?, m.descrizione = ?, m.dettagli = ?
                                    WHERE p.idprodotto = ? AND p.idutente = ?");
        
        if ($stmt === false) {
            return false;
        }
    
        // Associa i parametri
        $stmt->bind_param("ssissssss", 
                          $name, $color, $categoryId, $brand, 
                          $availability, $descriptionTitle, $description, $details, 
                          $productId, $sellerId);
        $success = $stmt->execute();
        $stmt->close();
        
        return $success;
    }
    
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
    
}
?>