<?php

$templateParams["pageTitle"] = "Bestseller";
$templateParams["name"] = "product-list.php";
$templateParams["productList"] = $dbh->getBestsellerProducts();
$templateParams["styleSheet"] = "css/user/products.css";

foreach ($templateParams["productList"] as &$product) {
    $product["immagine"] = IMG_DIR . $product["immagine"];
}
unset($product);

$templateParams["productAmount"] = count($templateParams["productList"]);

?>