
<!-- GENERAZIONE ARTICOLI NELLA PAGINA DEI PRODOTTI -->
<!-- N.B SISTEMARE NOMI PARAMETRI -->

<!-- TODO: sostituire input ricerca con il contenuto inserito nel form ricerca-->
<h1 class="fw-semibold mt-3">
    <?php
    echo (isset($_GET["search"]) && !empty($_GET["search"])) ? $_GET["search"] : "I nostri prodotti";
    ?>
</h1>
<!-- TODO: sostituire N con il numero effettivo -->
<p class=""><?php echo $templateParams["productAmount"] ?> risultati</p>

<!-- lista prodotti -->
<ul class="products-list list-unstyled row row-cols-1 row-cols-md-5 g-4 mt-5">
    <!-- Prodotto 1 -->
    <?php foreach($templateParams["productList"] as $product): ?>
    <li class="col">
        <a href="index.php?action=user-product-details&idprodotto=<?php echo $product["idprodotto"]; ?>" class="card">
            <img src="<?php echo $product["immagine"]; ?>" class="card-img-top" alt="<?php echo $product["modello"]; ?>" />
            <div class="card-body">
                <h2 class="card-title h5"><?php echo $product["modello"]; ?></h2>
                <p class="card-text text-muted">
                    <?php echo $product["categorie"]; ?><br >
                    <?php echo $product["colore"]; ?><br>
                    <?php echo "Disponibilità: " . $product["disponibilità"] . " pezzi"; ?><br>
                </p>
                <p class="card-text fw-bold">&euro; <?php echo $product["prezzo"]; ?></p>
            </div>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
