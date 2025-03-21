<?php

$templateParams["pageTitle"] = "Modifica prodotto";
$templateParams["name"] = "php/seller/template/edit-product.php";

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
    if (!isset($_SESSION["idutente"])) {
        die("Accesso negato. Devi essere loggato.");
    }

    $nomeProdotto = $_POST['nomeProdotto'];
    $colore = $_POST['colore'];
    $categoryName = $_POST['categoria'];
    $marca = $_POST['marca'];
    $disponibilita = $_POST['disponibilità'];
    $titoloDescrizione = $_POST['titoloDescrizione'];
    $descrizione = $_POST['descrizione'];
    $dettagli = $_POST['dettagli'];
    $idprodotto = $_POST['idprodotto'];

    // Recupera gli ID delle categorie
    $categoryParts = explode(', ', $categoryName);
    $categoryIds = [];
    foreach ($categoryParts as $category) {
        $categoryId = $dbh->getCategoryIdByName($category);
        if ($categoryId !== null) {
            $categoryIds[] = $categoryId;
        } else {
            echo "Errore: la categoria '$category' non esiste!";
            exit;
        }
    }

    // Percorso di salvataggio immagini
    $uploadDir = __DIR__ . "/../../img/";

    // Controlla se la cartella di destinazione esiste
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $immagine = null;
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES["productImage"]["name"]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions) && getimagesize($_FILES["productImage"]["tmp_name"])) {
            $newFileName = uniqid() . '_' . $fileName;
            $filePath = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $filePath)) {
                $immagine = $newFileName;
            } else {
                echo "Errore nel caricamento del file immagine.";
                exit;
            }
        } else {
            echo "Errore: il file caricato non è un'immagine valida.";
            exit;
        }
    } else {
        // Recupera l'immagine esistente se non viene caricata una nuova
        $productDetails = $dbh->getProductDetails($idprodotto);
        $immagine = $productDetails["immagine"];
    }

    // Aggiorna il prodotto
    $update = $dbh->updateProductBySeller(
        $_SESSION["idutente"],
        $idprodotto,
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

    if ($update) {
        header("Location: index.php?action=home&success=saveProductInfo");
        exit;
    } else {
        $templateParams["errorMessage"] = "Errore nell'aggiornamento del prodotto.";
    }
}

?>
