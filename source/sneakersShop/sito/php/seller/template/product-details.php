<section>
    <h1 class="fw-semibold mt-5">Dettagli Prodotto</h1>

    <section>
        <div class="row row-cols-1 row-cols-md-2 section-border mt-3 bg-body">
            <div class="col-md-7 d-flex justify-content-center">
                <img src="<?php echo IMG_DIR.$prodotto["immagine"]; ?>" alt="Immagine prodotto" class="img-fluid" />
            </div>
            <div class="col-md-5 bg-body-secondary">
                <h2 class="fw-semibold mt-5 mb-3"><?php echo $prodotto["modello"]; ?></h2>
                <?php $categorie = implode(', ', $prodotto["categorie"]); ?>
                <p class="mb-1"><?php echo $categorie; ?></p>
                <p class="mb-1"><?php echo $prodotto["marca"]; ?></p>
                <p class="fw-light mb-5"><?php echo $prodotto["colore"]; ?></p>
                <p class="fs-4 mb-3">&euro; <?php echo $prodotto["prezzo"]; ?></p>
                <p class="mb-3">Disponibilità: <?php echo $prodotto["disponibilità"]; ?> pezzi</p>
                <div class="d-flex justify-content-center pt-3">
                    <a href="index.php?action=edit-product&idprodotto=<?php echo $_GET['idprodotto']; ?>" class="btn btn-lg btn-dark col-10 col-md-6 mt-5">MODIFICA</a>
                </div>
                <div class="d-flex justify-content-center pb-5">
                    <a href="index.php?action=delete-product&idprodotto=<?php echo $_GET['idprodotto']; ?>" class="btn btn-lg btn-danger col-10 col-md-6 mt-5">RIMUOVI PRODOTTO</a>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="row mb-5">
            <h3 class="fw-semibold mt-5">Descrizione</h3>
            <p>
                Product #: <?php echo $_GET['idprodotto']; ?><br>
            </p>
            <h4 class="fw-semibold"><?php echo $prodotto["titoloDescrizione"]; ?></h4>
            <p>
                <?php echo $prodotto["descrizione"]; ?>
            </p>
            <?php
            if (isset($prodotto["dettagli"]) && !empty($prodotto["dettagli"])) {
                $dettagliArray = explode(';', $prodotto["dettagli"]);
                
                echo '<h3 class="fw-semibold">Caratteristiche:</h3>';
                echo '<ul class="clist">';
                
                foreach ($dettagliArray as $dettaglio) {
                    $dettaglio = trim($dettaglio);
                    
                    echo '<li><p>' . htmlspecialchars($dettaglio) . '</p></li>';
                }
                
                echo '</ul>';
            } else {
                echo '<p>Caratteristiche non disponibili.</p>';
            }
            ?>
        </div>
    </section>
</section>