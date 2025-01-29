<?php

require_once("../../bootstrap.php");

$templateParams["pageTitle"] = "Dettagli prodotto";

if (isset($_GET['idprodotto'])) {
    $templateParams["productDetails"] = $dbh -> getProductDetails((int) $_GET['idprodotto']);
}

if (isset($templateParams["productDetails"]) && !empty($templateParams["productDetails"])) {
    $prodotto = $templateParams["productDetails"];
}

$templateParams["name"] = "template/product-details.php";

require("../user/template/base.php");

?>