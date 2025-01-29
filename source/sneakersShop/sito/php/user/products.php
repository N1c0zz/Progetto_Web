<?php

$templateParams["pageTitle"] = "Prodotti";
$templateParams["name"] = "product-list.php";
$templateParams["productList"] = $dbh->getProducts();
$templateParams["styleSheet"] = "css/user/products.css";

?>