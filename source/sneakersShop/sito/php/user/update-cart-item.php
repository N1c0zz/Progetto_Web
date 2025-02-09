<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

if (isset($_POST["productId"]) && isset($_POST["oldSize"]) && isset($_POST["newSize"]) && isset($_POST["oldAmount"]) && isset($_POST["newAmount"])) {

    $user = $_SESSION["idutente"];
    $product = $_POST["productId"];
    $oldSize = $_POST["oldSize"];
    $newSize = $_POST["newSize"];
    $oldAmount = $_POST["oldAmount"];
    $newAmount = $_POST["newAmount"];

    if($dbh->isProductIdValid($product)) {

        $totalAmount = $dbh->getProductAmountInCart($user, $product);
        $availability = $dbh->getProductAvailability($product);

        if($availability > 0 && $newAmount + ($totalAmount - $oldAmount) <= $availability) {

            $item = $dbh->getCartItem($user, $product, $oldSize);

            if(!empty($item)) {
                $dbh->updateCartItem($user, $product, $oldSize, $newSize, $newAmount);
                $templateParams["itemAddedMsg"] = "Modifiche apportate con successo!";
            } else {
                $templateParams["itemAddErrorMsg"] = "Errore! Il prodotto da modificare non risulta presente nel carrello.";
            }
        } else {
            $templateParams["itemAddErrorMsg"] = "Errore! Non è possibile superare la disponibilità del prodotto.";
        }
        require("php/user/cart.php");
    }
}

?>