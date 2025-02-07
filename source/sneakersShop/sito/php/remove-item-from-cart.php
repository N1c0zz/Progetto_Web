<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

if (isset($_POST["productId"]) && isset($_POST["size"])) {
    $dbh->removeItemFromCart($_SESSION["idutente"], $_POST["productId"], $_POST["size"]);
    $cart = $dbh->getCartItems($_SESSION["idutente"]);
    if(empty($cart)) {
        $result["cart-empty"] = true;
        $result["empty-cart-msg"] = 'Non hai ancora aggiunto prodotti al tuo carrello';
    } else {
        $result["item-removed"] = true;
    }
    echo json_encode($result);
}

?>