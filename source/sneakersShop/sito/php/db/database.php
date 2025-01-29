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
    // N.B valutare se fare metodi separati per le query di prodotti utente e seller o se fare una query unica per entrambi
    public function getProducts() {
        $stmt = $this->db->prepare("SELECT nome, colore, prezzo, descrizione, immagine FROM modelli");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSellerDetails($sellerId) {
        $stmt = $this->db->prepare("SELECT nome, cognome, dataNascita, email, password 
                                     FROM utenti 
                                     WHERE idutente = ? AND tipo = 'venditore'");
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_assoc(MYSQLI_ASSOC);
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
}

?>