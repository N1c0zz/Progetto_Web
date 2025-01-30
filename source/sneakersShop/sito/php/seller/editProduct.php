<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Modifica prodotto";

if(isset($_GET["idprodotto"])){
    // Verifica che l'ID del prodotto sia presente e valido
    $idprodotto = filter_input(INPUT_GET, 'idprodotto', FILTER_VALIDATE_INT);

    if ($idprodotto !== false && $idprodotto !== null) {
        $templateParams["productDetails"] = $dbh->getProductDetails($idprodotto);
    }

    // Verifica che il prodotto esista
    if (!empty($templateParams["productDetails"])) {
        $prodotto = $templateParams["productDetails"];
    } else {
        $templateParams["errorMessage"] = "Prodotto non trovato.";
        // Puoi fare un redirect o fermare l'esecuzione qui
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Controllo se l'utente è autenticato
    if (!isset($_SESSION["idutente"])) {
        die("Accesso negato. Devi essere loggato.");
    }

    // Recupera i dati dal form
    $nomeProdotto = $_POST['nomeProdotto'];
    $colore = $_POST['colore'];
    $marca = $_POST['marca'];
    $disponibilita = $_POST['disponibilità'];
    $titoloDescrizione = $_POST['titoloDescrizione'];
    $descrizione = $_POST['descrizione'];
    $dettagli = $_POST['dettagli'];
    
    // Verifica categoria
    $categoryName = $_POST["categoria"];
    $categoryId = $dbh->getCategoryIdByName($categoryName);

    if ($categoryId === null) {
        echo "Errore: la categoria non esiste!";
    } else {
        // Gestione dell'immagine
        $immagine = null;
        if (!empty($_FILES["productImage"]["name"])) {
            $uploadDir = "../../uploads/";
            $fileName = basename($_FILES["productImage"]["name"]);
            $filePath = $uploadDir . time() . '_' . $fileName;  // Usa un timestamp per il nome del file in modo da evitare nomi duplicati

            // Verifica se il file è un'immagine
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                // Controlla che il file venga effettivamente caricato
                if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $filePath)) {
                    $immagine = $filePath;
                } else {
                    echo "Errore nel caricamento del file immagine.";
                }
            } else {
                echo "Errore: il file caricato non è un'immagine valida.";
            }
        }

        // Aggiorna il prodotto
        $update = $dbh->updateProductBySeller(
            $_SESSION["idutente"],
            $_POST["idprodotto"],
            $nomeProdotto,
            $colore,
            $categoryId,
            $marca,
            $disponibilita,
            $titoloDescrizione,
            $descrizione,
            $dettagli,
            $immagine
        );

        if ($update) {
            // Redirige l'utente dopo l'aggiornamento
            header("Location: manageProducts.php");
            exit;
        } else {
            echo "Errore nell'aggiornamento del prodotto.";
        }
    }
}

// nome del template da visualizzare
$templateParams["name"] = "template/edit-product.php";

// template html base
require("../user/template/base.php");

?>
