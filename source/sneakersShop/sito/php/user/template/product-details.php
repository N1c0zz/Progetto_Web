<section>
    <h1 class="fw-semibold mt-5">Dettagli prodotto</h1>

    <div class="row row-cols-1 row-cols-md-2 section-border mt-3 bg-body">
        <div class="col-md-7 d-flex justify-content-center">
            <img src="<?php echo IMG_DIR.$prodotto["immagine"]; ?>" alt="Immagine prodotto" class="img-fluid" />
        </div>
        <div class="col-md-5 bg-body-secondary">
            <section>
                <h2 class="fw-semibold mt-5 mb-3"><?php echo $prodotto["modello"]; ?></h2>
                <?php $categorie = implode(', ', $prodotto["categorie"]); ?>
                <p class="mb-1"><?php echo $categorie; ?></p>
                <p class="mb-1"><?php echo $prodotto["marca"]; ?></p>
                <p class="fw-light mb-1"><?php echo $prodotto["colore"]; ?></p>
                <p class="fw-light mb-5 <?php echo $prodotto['disponibilità'] > 0 ? '' : 'text-danger' ?>">
                    <?php echo $prodotto["disponibilità"] > 0 ?
                        "Disponibilità: " . $prodotto["disponibilità"] . " pezzi"
                        : "Prodotto esaurito"
                    ?>
                </p>
                <p class="fs-4 mb-3">&euro; <?php echo $prodotto["prezzo"]; ?></p>
                <?php if($prodotto["disponibilità"] > 0): ?>
                <form action="index.php?action=add-item-to-cart" method="POST" oninput="x.value=parseFloat(sizeRange.value)">
                    <fieldset>
                        <legend class="visually-hidden">selezione taglia e quantità</legend>
                        <input type="hidden" name="productId" value="<?php echo $_GET['idprodotto']; ?>" />
                        <label for="sizeRange" class="form-label">Seleziona la taglia (EU):</label>
                        <output name="x" class="fw-bold fs-5">44</output>
                        <input type="range" class="form-range" min="35" max="53" id="sizeRange" name="size" value="44" />
                        <label for="amount" class="form-label">Seleziona la quantità:</label>
                        <input type="number" class="mt-3" min="1" max="<?php echo $prodotto["disponibilità"]; ?>" id="amount" name="amount" value="1" required />
                    </fieldset>
                    <div class="d-flex justify-content-center pb-5 pt-3">
                        <button type="submit" class="btn btn-lg btn-dark col-10 col-md-6 mt-5">AGGIUNGI AL CARRELLO</button>
                    </div>
                </form>
                <?php endif; ?>
            </section>
        </div>
    </div>
    <div class="row mb-5">
        <section>
            <h2 class="fw-semibold mt-5">Descrizione</h2>
            <p>
                Product #: <?php echo $_GET['idprodotto']; ?><br>
            </p>
            <section>
                <h3 class="fw-semibold"><?php echo $prodotto["titoloDescrizione"]; ?></h3>
                <p>
                    <?php echo $prodotto["descrizione"]; ?>
                </p>
            </section>
            <?php
            if (isset($prodotto["dettagli"]) && !empty($prodotto["dettagli"])) {
                $dettagliArray = explode(';', $prodotto["dettagli"]);
                
                echo '<section>';
                echo '<h3 class="fw-semibold">Caratteristiche:</h3>';
                echo '<ul class="clist">';
                
                foreach ($dettagliArray as $dettaglio) {
                    $dettaglio = trim($dettaglio);
                    
                    echo '<li><p>' . htmlspecialchars($dettaglio) . '</p></li>';
                }
                
                echo '</ul>';
                echo '</section>';
            } else {
                echo '<p>Caratteristiche non disponibili.</p>';
            }
            ?>
        </section>
    </div>
</section>