    
<h1 class="fw-semibold mt-5">Modifica prodotto del carrello</h1>

<div class="row row-cols-1 row-cols-md-2 section-border mt-3 bg-body">
    <div class="col-md-7 d-flex justify-content-center">
        <img src="<?php echo IMG_DIR.$prodotto["immagine"]; ?>" alt="Immagine prodotto" class="img-fluid" />
    </div>
    <div class="col-md-5 bg-body-secondary">
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
        <form action="index.php?action=update-cart-item" method="POST" oninput="x.value=parseFloat(sizeRange.value)">
            <fieldset>
                <legend class="visually-hidden">selezione taglia e quantità</legend>
                <label for="sizeRange" class="form-label">Seleziona la taglia (EU):</label>
                <output name="x" class="fw-bold fs-5">
                    <?php echo $templateParams["cartItem"]["tagliaAggiunta"]; ?>
                </output>
                <input type="hidden" id="oldSize" name="oldSize" value="<?php echo $templateParams["cartItem"]["tagliaAggiunta"]; ?>" required />
                <input type="hidden" id="oldAmount" name="oldAmount" value="<?php echo $templateParams["cartItem"]["quantitàAggiunta"]; ?>" required />
                <input type="range" class="form-range" min="35" max="53" id="sizeRange" name="newSize"
                    value="<?php echo $templateParams["cartItem"]["tagliaAggiunta"]; ?>" required />
                <label for="newAmount" class="form-label">Seleziona la quantità:</label>
                <input type="number" class="mt-3" min="1" max="<?php echo $prodotto["disponibilità"]; ?>" id="newAmount" name="newAmount"
                    value="<?php echo $templateParams["cartItem"]["quantitàAggiunta"]; ?>" required />
                <input type="hidden" name="productId" value="<?php echo $_POST["productId"]; ?>">
            </fieldset>
            <div class="d-flex justify-content-center pb-5 pt-3">
                <button type="submit" class="btn btn-lg btn-dark col-10 col-md-6 mt-5">
                    <?php echo "SALVA MODIFICHE";?>
                </button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</div>
<div class="row mb-5">
        <h3 class="fw-semibold mt-5">Descrizione</h3>
        <p>
            Product #: <?php echo $_POST["productId"]; ?><br>
        </p>
        <h4 class="fw-semibold"><?php echo $prodotto["titoloDescrizione"]; ?></h4>
        <p>
            <?php echo $prodotto["descrizione"]; ?>
        </p>
        <?php
        if (isset($prodotto["dettagli"]) && !empty($prodotto["dettagli"])) {
            $dettagliArray = explode(';', $prodotto["dettagli"]);
            
            echo '<h4 class="fw-semibold">Caratteristiche:</h4>';
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