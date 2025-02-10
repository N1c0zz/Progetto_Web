<?php

$templateParams["pageTitle"] = "Dettagli prodotto";
$templateParams["name"] = "php/user/template/product-details.php";
$templateParams["styleSheet"] = array("css/user/productDetails.css");

$idprodotto = filter_input(INPUT_GET, 'idprodotto', FILTER_VALIDATE_INT);

if ($idprodotto !== false && $idprodotto !== null) {
    $templateParams["productDetails"] = $dbh->getProductDetails($idprodotto);
}

if (!empty($templateParams["productDetails"])) {
    $prodotto = $templateParams["productDetails"];
} else {
    $templateParams["errorMessage"] = "Prodotto non trovato.";
}


?>