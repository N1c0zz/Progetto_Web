
<!-- GENERAZIONE ARTICOLI NELLA PAGINA DEI PRODOTTI -->
<!-- N.B SISTEMARE NOMI PARAMETRI -->

<!-- TODO: sostituire input ricerca con il contenuto inserito nel form ricerca-->
<h1 class="fw-semibold mt-3">INPUT RICERCA</h1>
<!-- TODO: sostituire N con il numero effettivo -->
<p class="">N risultati</p>

<!-- lista prodotti -->
<ul class="products-list list-unstyled row row-cols-1 row-cols-md-5 g-4 mt-5">
    <!-- Prodotto 1 -->
    <?php foreach($templateParams["productList"] as $product): ?>
    <li class="col">
        <a href="#" class="card">
            <img src="<?php echo $product["immagine"]; ?>" class="card-img-top" alt="<?php echo $product["modello"]; ?>" />
            <div class="card-body">
                <h2 class="card-title h5"><?php echo $product["modello"]; ?></h2>
                <p class="card-text text-muted">
                    <!-- ?php echo $product["categoria"]; ?><br -->
                    <?php echo $product["colore"]; ?><br>
                    <?php echo "Disponibilità: " . $product["disponibilità"] . " pezzi"; ?><br>
                </p>
                <p class="card-text fw-bold">$<?php echo $product["prezzo"]; ?></p>
            </div>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
