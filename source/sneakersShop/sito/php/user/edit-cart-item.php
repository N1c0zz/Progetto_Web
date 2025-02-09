<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

$templateParams["pageTitle"] = "Modifica prodotto del carrello";
$templateParams["name"] = "php/user/template/cart-item-edit-page.php";
$templateParams["styleSheet"] = "css/user/productDetails.css";

if (isset($_POST["productId"]) && isset($_POST["size"]) && isset($_POST["amount"])) {
    $templateParams["productDetails"] = $dbh->getProductDetails($_POST["productId"]);
}

if (!empty($templateParams["productDetails"])) {
    $prodotto = $templateParams["productDetails"];
    $templateParams["cartItem"] = $dbh->getCartItem($_SESSION["idutente"], $_POST["productId"], $_POST["size"])[0];
} else {
    $templateParams["errorMessage"] = "Prodotto non trovato.";
}

?>