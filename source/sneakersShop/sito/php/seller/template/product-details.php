<h1 class="fw-semibold mt-5">DETTAGLI PRODOTTO</h1>

    <div class="row row-cols-1 row-cols-md-2 section-border mt-3 bg-body">
        <div class="col-md-7 d-flex justify-content-center">
            <img src="../../img/314311775804_01.png" alt="TODO" class="img-fluid" />
        </div>
        <div class="col-md-5 bg-body-secondary">
            <h2 class="fw-semibold mt-5 mb-3"><?php echo $prodotto["modello"]; ?></h2>
            <p class="mb-1"><?php echo $prodotto["categoria"]; ?></p>
            <p class="mb-1"><?php echo $prodotto["marca"]; ?></p>
            <p class="fw-light mb-5"><?php echo $prodotto["colore"]; ?></p>
            <p class="fs-4 mb-3">&euro; <?php echo $prodotto["prezzo"]; ?></p>
            <p class="mb-3">Disponibilità: <?php echo $prodotto["disponibilità"]; ?> pezzi</p>
            <div class="d-flex justify-content-center pt-3">
                <a href="index.php?action=edit-product&idprodotto=<?php echo $_GET['idprodotto']; ?>" class="btn btn-lg btn-dark col-10 col-md-6 mt-5">MODIFICA</a>
            </div>
            <div class="d-flex justify-content-center pb-5">
                <button type="button" class="btn btn-lg btn-danger col-10 col-md-6 mt-5">RIMUOVI PRODOTTO</button>
            </div>
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
            $dettagliArray = explode(',', $prodotto["dettagli"]);
            
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