<?php
// Controllo della sessione e autorizzazione
if (!isset($_SESSION["idutente"]) || !isset($_SESSION["tipo"])) {
    header("Location: index.php?action=login");
    exit();
}

if ($_SESSION["tipo"] !== "venditore") {
    header("Location: index.php?action=home");
    exit();
}

// Controllo di idordine
if (!isset($_GET["idordine"])) {
    header("Location: index.php?action=home");
    exit();
} else {
    $idordine = $_GET["idordine"];
}

// Gestione della richiesta POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validazione degli input
    $nuovoStato = htmlspecialchars($_POST["newStatus"] ?? "");
    $messaggio = htmlspecialchars($_POST["nota"] ?? "");

    if (empty($nuovoStato)) {
        echo "Stato non valido.";
        exit();
    }

    // Aggiorna lo stato dell'ordine
    $response = $dbh->updateOrderStatus($idordine, $nuovoStato);

    if ($response) {
        echo "Stato dell'ordine cambiato con successo.";
    } else {
        echo "Aggiornamento fallito.";
    }

    // Ottieni l'ID del cliente associato all'ordine
    $idcliente = $dbh->getUserIdByOrderId($idordine);

    if ($idcliente != null) {
        // Crea una notifica per il cliente
        $response = $dbh->createOrderStatusNotification($messaggio, $idcliente, $idordine, $nuovoStato);

        if ($response) {
            echo "Notifica inviata con successo.";
        } else {
            echo "Errore nella creazione della notifica.";
        }
    } else {
        echo "Nessun cliente associato a questo ordine.";
    }
}

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci gli ordini";

// Nome del template da visualizzare
$templateParams["name"] = "php/seller/template/manage-orders.php";
?>