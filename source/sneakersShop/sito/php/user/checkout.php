<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

$templateParams["cartItems"] = $dbh->getCartItems($_SESSION["idutente"]);

if(empty($templateParams["cartItems"])) {
    header("location: index.php?action=cart");
    exit();
}

$templateParams["total"] = array_sum(array_column($templateParams["cartItems"], "prezzo"));
$templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"]);
$templateParams["pageTitle"] = "Checkout";
$templateParams["name"] = "checkout-page.php";
$templateParams["styleSheet"] = "css/user/checkoutPage.css";


?>