<?php

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Modifica prodotto";

if (isset($_GET["idprodotto"])) {
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
    $categoryName = $_POST['categoria'];
    $marca = $_POST['marca'];
    $disponibilita = $_POST['disponibilità'];
    $titoloDescrizione = $_POST['titoloDescrizione'];
    $descrizione = $_POST['descrizione'];
    $dettagli = $_POST['dettagli'];

    // Elenco delle categorie separato da virgola
    $categoryParts = explode(', ', $categoryName);

    // Recupera gli ID delle categorie
    $categoryIds = [];
    foreach ($categoryParts as $category) {
        $categoryId = $dbh->getCategoryIdByName($category);
        if ($categoryId !== null) {
            $categoryIds[] = $categoryId;
        } else {
            // Mostra un errore se una delle categorie non esiste
            echo "Errore: la categoria '$category' non esiste!";
            exit;
        }
    }

    // Gestione dell'immagine
    $immagine = null;
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] === UPLOAD_ERR_OK) {
        $uploadDir = "../../uploads/";
        $fileName = basename($_FILES["productImage"]["name"]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    
        // Verifica che il file sia effettivamente un'immagine
        if (in_array($fileExtension, $allowedExtensions) && getimagesize($_FILES["productImage"]["tmp_name"])) {
            $newFileName = uniqid() . '_' . $fileName;
            $filePath = $uploadDir . $newFileName;
    
            // Sposta il file nella cartella uploads
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $filePath)) {
                $immagine = $newFileName;  // Salva solo il nome del file
            } else {
                echo "Errore nel caricamento del file immagine.";
                exit;
            }
        } else {
            echo "Errore: il file caricato non è un'immagine valida.";
            exit;
        }
    }
    
    // Aggiorna il prodotto
    $update = $dbh->updateProductBySeller(
        $_SESSION["idutente"],
        $_POST["idprodotto"],
        $nomeProdotto,
        $colore,
        $categoryIds,
        $marca,
        $disponibilita,
        $titoloDescrizione,
        $descrizione,
        $dettagli,
        $immagine
    );

    // Success message
    if ($update) {
        header("Location: index.php?action=home&success=saveProductInfo");
    } else {
        $templateParams["errorMessage"] = "Errore nell'aggiornamento del prodotto.";
    }
}

// nome del template da visualizzare
$templateParams["name"] = "php/seller/template/edit-product.php";
?>
