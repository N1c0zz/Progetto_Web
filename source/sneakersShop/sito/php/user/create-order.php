<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

// simulazione pagamento
if(isset($_POST["card-name"]) && isset($_POST["card-number"]) && isset($_POST["card-cvv"])) {
    if(validateCardCredentials()) {
        executeTransaction();
    }
}

$dbh->createOrder($_SESSION["idutente"]);
$dbh->emptyCart($_SESSION["idutente"]);

?>