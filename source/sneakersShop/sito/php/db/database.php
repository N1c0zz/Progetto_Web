<?php

class DatabaseHelper{
    private $db;

    public function __contruct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error) {
            die("Connessione al db fallita.");
        }
    }

    // METODO GENERICO PER FARE QUERY AL DB
    // fa una query al database e restituisce il risultato in un array associativo
    public function getSomething($eventualiParametri) {
        $stmt = $this->db->prepare("inserire query con parametro ? ");
        $stmt->bind_param("inserire come parametri il formato e il parametro da bindare");
        $stmt->execute();
        $result-> $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // legge tutti i prodotti disponibili
    // N.B valutare se fare metodi separati per le query di prodotti utente e seller o se fare una query unica per entrambi
    public function getProducts() {
        $stmt = this->db->prepare("SELECT nome, colore1, prezzo, descrizione, immagine FROM modelli");
        $stmt->execute();
        $result-> $stmt->get_result();

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
}

?>