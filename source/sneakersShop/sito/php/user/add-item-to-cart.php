<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

if (isset($_POST["productId"]) && isset($_POST["size"]) && isset($_POST["amount"])) {

    $user = $_SESSION["idutente"];
    $product = $_POST["productId"];
    $size = $_POST["size"];
    $amount = $_POST["amount"];

    if($dbh->isProductIdValid($product)) {

        $totalAmount = $dbh->getProductAmountInCart($user, $product);
        $availability = $dbh->getProductAvailability($product);

        if($availability > 0 && $amount + $totalAmount <= $availability) {

            $item = $dbh->getCartItem($user, $product, $size);

            if(empty($item)) {
                $dbh->addItemToCart($user, $product, $size, $amount);
                $templateParams["itemAddedMsg"] = "Il prodotto è stato aggiunto al carrello!";
            } else {
                $dbh->updateCartItem($user, $product, $size, $size, $amount + $item[0]["quantitàAggiunta"]);
                $templateParams["itemAddedMsg"] = "Prodotto già presente nel carrello. Quantità aggiornata!";
            }
        } else {
            $templateParams["itemAddErrorMsg"] = "Errore! Non è possibile superare la disponibilità del prodotto.";
        }
        require("php/user/cart.php");
    }
}

?>