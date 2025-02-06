<?php

$templateParams["pageTitle"] = "Novità";
$templateParams["name"] = "product-list.php";
$templateParams["productList"] = $dbh->getNewProducts();
$templateParams["styleSheet"] = "css/user/products.css";

foreach ($templateParams["productList"] as &$product) {
    $product["immagine"] = IMG_DIR . $product["immagine"];
}
unset($product);

$templateParams["productAmount"] = count($templateParams["productList"]);

?>