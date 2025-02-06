<h1 class="mb-4">Gestione Prodotti</h1>
    <div class="d-flex justify-content-center">
        <ul class="products-list list-unstyled mt-3 col-md-9">
            <?php foreach ($templateParams["sellerProducts"] as $product): ?>
            <li>
                <a href="index.php?action=seller-product-details&idprodotto=<?php echo $product["idprodotto"]; ?>" class="product col d-flex section-border">
                    <div class="col-6 col-md-3 me-3 mt-2 mt-0 mt-md-0 ps-md-3 ">
                        <img src="<?php echo IMG_DIR.$product["immagine"]; ?>" class="img-fluid" alt="Immagine prodotto" />
                    </div>
                    <div class="col-6 col-md-8">
                        <div class="ms-md-5 mt-md-4">
                            <h2 class="mb-4 fs-6 fs-mn-5 fw-semibold" ><?php echo $product["modello"]; ?></h2> 
                            <p>Codice: <?php echo $product["idprodotto"]; ?></p>
                            <p>Data creazione: <?php echo $product["dataInserimento"]; ?></p>
                            <p>Disponibilità: <?php echo $product["disponibilità"]; ?> pezzi</p>
                        </div>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>