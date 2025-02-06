<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

// simulazione pagamento
if(isset($_POST["card-name"]) && isset($_POST["card-number"]) && isset($_POST["card-cvv"])) {
    // controllo se il carrello è vuoto
    $cart = $dbh->getCartItems($_SESSION["idutente"]);
    if(!empty($cart)) {
        if(validateCardCredentials()) {
            executeTransaction();
            $dbh->createOrder($_SESSION["idutente"]);
            $dbh->emptyCart($_SESSION["idutente"]);
            // redirect alla home
            $templateParams["pageTitle"] = "Homepage";
            $templateParams["name"] = "php/user/template/homepage.php";
            $templateParams["orderCreationMsg"] = "Ordine effettuato, grazie!";
        } else {
            header("location: index.php?action=home");
            exit();
        }
    }
}

?>