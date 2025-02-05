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
if (!isset($_GET["idordine"]) && ($_SERVER["REQUEST_METHOD"] !== "POST")) {
    header("Location: index.php?action=home");
    exit();
} else {
    $idordine = $_GET["idordine"];
    $statoAttuale = $dbh -> getOrderStatusById($idordine);
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

    if ($response) {
        header("Location: index.php?action=home&success=newOrderState");
    } else {
        echo "Aggiornamento fallito.";
    }
}

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci stato dell'ordine";

// Nome del template da visualizzare
$templateParams["name"] = "php/seller/template/edit-order-state.php";
?>