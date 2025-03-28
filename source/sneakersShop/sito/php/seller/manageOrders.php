<?php

$templateParams["pageTitle"] = "Gestisci gli ordini";
$templateParams["name"] = "php/seller/template/manage-orders.php";
$templateParams["styleSheet"] = array("css/seller/seller-ordersManagement.css");

if (!isset($_SESSION["idutente"])) {
    header("Location: index.php?action=login");
    exit();
}

if ($_SESSION["tipo"] !== "venditore") {
    header("Location: index.php?action=home");
    exit();
}

$idVenditore = filter_var($_SESSION["idutente"], FILTER_VALIDATE_INT);

if ($idVenditore) {
    // Prova a ottenere gli ordini dal database
    $orders = $dbh->getAllOrdersBySeller($idVenditore);
    // Verifica se ci sono ordini
    if (empty($orders)) {
        // Se non ci sono ordini, setta sellerOrders come array vuoto
        $templateParams["sellerOrders"] = [];
    } else {
        // Altrimenti setta gli ordini trovati
        $templateParams["sellerOrders"] = $orders;
    }
} else {
    $templateParams["sellerOrders"] = [];
}

?>
