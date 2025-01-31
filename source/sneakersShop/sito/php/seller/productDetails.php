<?php

$templateParams["pageTitle"] = "Dettagli prodotto";

$templateParams["styleSheet"] = "css/seller/productDetails.css";

// Verifica che l'ID del prodotto sia presente e valido
$idprodotto = filter_input(INPUT_GET, 'idprodotto', FILTER_VALIDATE_INT);

if ($idprodotto !== false && $idprodotto !== null) {
    $templateParams["productDetails"] = $dbh->getProductDetails($idprodotto);
}

// Verifica che il prodotto esista
if (!empty($templateParams["productDetails"])) {
    $prodotto = $templateParams["productDetails"];
} else {
    $templateParams["errorMessage"] = "Prodotto non trovato.";
}

// Imposta il template corretto
$templateParams["name"] = "php/seller/template/product-details.php";

?>
