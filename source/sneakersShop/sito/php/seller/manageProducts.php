<?php

// Connessione al database
require_once("../../bootstrap.php");

// Controllo autenticazione
if (!isset($_SESSION["idutente"])) {
    header("Location: ../../index.php?action=login");
    exit();
}

// Controllo ruolo (se necessario)
if ($_SESSION["role"] !== "vendor") {
    header("Location: ../../index.php?action=home");
    exit();
}

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci i prodotti";

// Recupero prodotti del venditore
$sellerid = filter_var($_SESSION["idutente"], FILTER_VALIDATE_INT);

if ($sellerid) {
    $templateParams["sellerProducts"] = $dbh->getProductsBySeller($sellerid);
} else {
    $templateParams["sellerProducts"] = [];
}

// Se il venditore non ha prodotti
if (empty($templateParams["sellerProducts"])) {
    $templateParams["errorMessage"] = "Non hai ancora aggiunto prodotti.";
}

// Nome del template da visualizzare
$templateParams["name"] = "template/manage-products.php";

// Template HTML base
require("../user/template/base.php");

?>
