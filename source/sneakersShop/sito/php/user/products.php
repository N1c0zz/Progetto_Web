<?php

$templateParams["pageTitle"] = "Prodotti";
$templateParams["name"] = "product-list.php";
$templateParams["productList"] = $dbh->getProducts();
$templateParams["styleSheet"] = array("css/user/products.css");

foreach ($templateParams["productList"] as &$product) {
    $product["immagine"] = IMG_DIR . $product["immagine"];
}
unset($product);

if(isset($_GET["search"]) && !empty($_GET["search"])) {
    $filteredList = applyFilter($templateParams["productList"], $_GET["search"]);
    $templateParams["productList"] = $filteredList;
}

$templateParams["productAmount"] = count($templateParams["productList"]);

function applyFilter($productList, $userInput) {
    // input utente
    $userInput = normalizeString($userInput);
    $keywords = explode(' ', $userInput);

    foreach($productList as $product) {
        // testo di ricerca
        $productText = implode(' ', $product);
        $productText = normalizeString($productText);

        $score = 0;
        $foundKeywords = [];

        // Calcolo punteggio per ogni parola chiave
        foreach ($keywords as $keyword) {
            if (empty($keyword)) continue;
            // Ricerca esatta
            if (stripos($productText, $keyword) !== false) {
                $score += 10;
                $foundKeywords[] = $keyword;
                continue;
            }
            // Ricerca approssimata (per errori di battitura)
            similar_text($keyword, $productText, $similarity);
            if ($similarity > 50) {
                $score += 5;
                $foundKeywords[] = $keyword;
            }
        }
        if ($score > 0) {
            $results[] = [
                'product' => $product,
                'score' => $score,
                'keywords' => array_unique($foundKeywords)
            ];
        }
    }
    if(isset($results)) {
        // Ordina i risultati per rilevanza
        usort($results, function($a, $b) {
            return $b['score'] - $a['score'];
        });
        $result = array_column($results, "product");
        return $result;
    } else {
        $result = [];
    }
    return $result;

}

// Funzione per normalizzare il testo
function normalizeString($str) {
    $str = mb_strtolower(trim($str));                      // Minuscolo
    $str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $str);   // Rimuove caratteri speciali
    $str = preg_replace('/\s+/', ' ', $str);               // Multipli spazi => singolo
    return $str;
}

?>