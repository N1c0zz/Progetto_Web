<?php

$templateParams["styleSheet"] = "css/seller/seller-ordersManagement.css";

// Controllo autenticazione
if (!isset($_SESSION["idutente"])) {
    header("Location: index.php?action=login");
    exit();
}

// Controllo ruolo (se necessario)
if ($_SESSION["tipo"] !== "venditore") {
    header("Location: index.php?action=home");
    exit();
}

// Recupero l'ID del venditore e sanitizzazione
$idVenditore = filter_var($_SESSION["idutente"], FILTER_VALIDATE_INT);

if ($idVenditore) {
    $templateParams["sellerOrders"] = $dbh->getAllOrdersBySeller($idVenditore);
} else {
    $templateParams["sellerOrders"] = [];
}

// Se il venditore non ha ordini
if (empty($templateParams["sellerOrders"])) {
    $templateParams["errorMessage"] = "Non hai ancora ricevuto ordini.";
}

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci gli ordini";

// Nome del template da visualizzare
$templateParams["name"] = "php/seller/template/manage-orders.php";

?>
