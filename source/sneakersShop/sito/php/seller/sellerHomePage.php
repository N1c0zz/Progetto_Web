<?php

$templateParams["pageTitle"] = "Homepage";
$templateParams["name"] = "php/seller/template/seller-homepage.php";
$templateParams["styleSheet"] = array("css/seller/seller-homepage.css");

if (!isset($_SESSION['idutente'])) {
    header("Location: ../../index.php?action=login");
    exit();
}

if ($_SESSION['tipo'] !== 'venditore') {
    header("Location: ../../index.php?action=home");
    exit();
}

if (isset($_GET['success'])){
    switch($_GET['success']){
        case 'saveProductInfo':
            $templateParams["saveNewProductMsg"] = "Prodotto modificato con successo!";
            break;
        case 'newOrderState':
            $templateParams["newOrderStateMsg"] = "Stato dell'ordine modificato con successo!";
            break;
        case 'deleteProductSuccess':
            $templateParams["deleteProductSuccess"] = "Prodotto rimosso con successo!";
            break;
        default:
            header("Location: index.php?action=home");
            exit();
    }
}

// Verifica se l'id utente è valido
if (isset($_SESSION["idutente"]) && is_numeric($_SESSION["idutente"])) {
    // Recupero vendite totali e guadagni totali dal database
    $totalSales = $dbh->getTotalSales($_SESSION["idutente"]);
    $totalEarnings = $dbh->getTotalEarnings($_SESSION["idutente"]);
    
    // Imposto il valore di default (0) se non sono disponibili
    $templateParams["totalSales"] = is_numeric($totalSales) ? $totalSales : 0;
    $templateParams["totalEarnings"] = is_numeric($totalEarnings) ? $totalEarnings : 0;
} else {
    $templateParams["totalSales"] = 0;
    $templateParams["totalEarnings"] = 0;
}

?>
