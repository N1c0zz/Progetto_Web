<?php

if (!isset($_SESSION["idutente"]) || !isset($_SESSION["tipo"])) {
    header("Location: index.php?action=login");
    exit();
}

if ($_SESSION["tipo"] !== "venditore") {
    header("Location: index.php?action=home");
    exit();
}

if(!isset($_GET["idprodotto"])){
    header("Location: index.php?action=home");
    exit();
} else {
    $idprodotto = $_GET["idprodotto"];
    $response = $dbh -> deleteProductById($idprodotto);

    if($response){
        header("Location: index.php?action=home&success=deleteProductSuccess");
        exit();
    } else {
        header("Location: index.php?action=home");
        exit();
    }
}
?>