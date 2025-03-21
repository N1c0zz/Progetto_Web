<?php

$templateParams["pageTitle"] = "Gestisci stato dell'ordine";
$templateParams["name"] = "php/seller/template/edit-order-state.php";

if (!isset($_SESSION["idutente"]) || !isset($_SESSION["tipo"])) {
    header("Location: index.php?action=login");
    exit();
}

if ($_SESSION["tipo"] !== "venditore") {
    header("Location: index.php?action=home");
    exit();
}

if (!isset($_GET["idordine"]) && ($_SERVER["REQUEST_METHOD"] !== "POST")) {
    header("Location: index.php?action=home");
    exit();
} else {
    $idordine = $_GET["idordine"];
    $statoAttuale = $dbh -> getOrderStatusById($idordine);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Validazione degli INPUT
    $nuovoStato = htmlspecialchars($_POST["newStatus"] ?? "");
    $messaggio = htmlspecialchars($_POST["nota"] ?? "");

    if (empty($nuovoStato)) {
        echo "Stato non valido.";
        exit();
    }

    $response = $dbh->updateOrderStatus($idordine, $nuovoStato);

    $idcliente = $dbh->getUserIdByOrderId($idordine);

    if ($idcliente != null) {
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

?>