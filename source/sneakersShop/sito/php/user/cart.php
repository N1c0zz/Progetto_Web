<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

$templateParams["pageTitle"] = "Carrello";
$templateParams["name"] = "php/user/template/cart-page.php";
$templateParams["styleSheet"] = "css/user/cartPage.css";

$templateParams["cartItems"] = $dbh->getCartItems($_SESSION["idutente"]);
if(!empty($templateParams["cartItems"])) {
    $templateParams["total"] = array_sum(array_column($templateParams["cartItems"], "prezzo"));
    foreach ($templateParams["cartItems"] as &$cartItem) {
        $cartItem["immagine"] = IMG_DIR . $cartItem["immagine"];
    }
    unset($cartItem);
} else {
    $templateParams["noItemsFound"] = "Non hai ancora aggiunto prodotti al tuo carrello";
}

?>