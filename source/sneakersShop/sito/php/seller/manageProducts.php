<?php

$templateParams["pageTitle"] = "Gestisci i prodotti";
$templateParams["name"] = "php/seller/template/manage-products.php";
$templateParams["styleSheet"] = array("css/seller/manageProducts.css");

if (!isset($_SESSION["idutente"])) {
    header("Location: index.php?action=login");
    exit();
}

if ($_SESSION["tipo"] !== "venditore") {
    header("Location: index.php?action=home");
    exit();
}

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

?>
