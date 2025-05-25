<section>
    <h1 class="fw-semibold mt-3">
        <?php
        echo (isset($_GET["search"]) && !empty($_GET["search"])) ? $_GET["search"] : "I nostri prodotti";
        ?>
    </h1>

    <p class=""><?php echo $templateParams["productAmount"] ?> risultati</p>

    <!-- lista prodotti -->
    <ul class="products-list list-unstyled row row-cols-1 row-cols-md-5 g-4 mt-5">

        <?php foreach($templateParams["productList"] as $product): ?>
        <li class="col">
            <article>
                <a href="index.php?action=user-product-details&idprodotto=<?php echo $product["idprodotto"]; ?>" class="card">
                    <img src="<?php echo $product["immagine"]; ?>" class="card-img-top" alt="<?php echo $product["modello"]; ?>" />
                    <div class="card-body">
                        <h2 class="card-title h5"><?php echo $product["modello"]; ?></h2>
                        <p class="card-text text-muted mb-0"><?php echo $product["categorie"]; ?></p>
                        <p class="card-text text-muted mb-0"><?php echo $product["colore"]; ?></p>
                        <p class="card-text <?php echo $product['disponibilità'] > 0 ? 'text-muted' : 'text-danger' ?>">
                            <?php
                                echo $product["disponibilità"] > 0 ?
                                "Disponibilità: " . $product["disponibilità"] . " pezzi"
                                : "Prodotto esaurito";
                            ?>
                        </p>
                        <p class="card-text fw-bold">&euro; <?php echo $product["prezzo"]; ?></p>
                    </div>
                </a>
            </article>
        </li>
        <?php endforeach; ?>
    </ul>
</section>