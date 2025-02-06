    
<!-- TODO: sostituire input ricerca con il contenuto inserito nel form ricerca-->
<h1 class="fw-semibold mt-5">Dettagli prodotto</h1>

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
        <form action="TODO" method="get" oninput="x.value=parseFloat(sizeRange.value)">
            <fieldset>
                <legend class="visually-hidden">selezione taglia</legend>
                <label for="sizeRange" class="form-label">Seleziona la taglia (EU):</label>
                <output name="x" class="fw-bold fs-5"></output>
                <input type="range" class="form-range" min="35" max="53" id="sizeRange" />
            </fieldset>
            <div class="d-flex justify-content-center pb-5 pt-3">
                <button type="submit" class="btn btn-lg btn-dark col-10 col-md-6 mt-5">AGGIUNGI AL CARRELLO</button>
            </div>
        </form>
    </div>
</div>
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