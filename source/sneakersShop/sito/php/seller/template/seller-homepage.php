<h1 class="fw-semibold text-start">Profilo venditore</h1>

    <div class="row mt-4 g-2">
        <div class="col-12 col-lg-6 d-flex align-items-center">
            <div class="border border-dark p-3 text-center w-100">
                <h4 class="mb-1">Vendite totali</h4>
                <p class="fs-5 mb-0"><?php echo $templateParams["totalSales"]; ?></p>
            </div>
        </div>

        <div class="col-12 col-lg-6 d-flex align-items-center"> 
            <div class="border border-dark p-3 text-center w-100">
                <h4 class="mb-1">Guadagni totali</h4>
                <p class="fs-5 mb-0">&euro; <?php echo $templateParams["totalEarnings"]; ?></p>
            </div>
        </div>
    </div>

    <a href="index.php?action=manage-orders" class="text-decoration-none text-dark">
        <div class="mt-4 border border-dark p-4">
            <h3 class="fw-semibold text-md-start text-center">Gestisci ordini</h3>
            <div class="d-flex align-items-center mt-4 flex-column flex-md-row">
                <img src="<?php echo IMG_DIR."gestioneOrdini.png"; ?>" 
                    alt="Gestisci ordini" 
                    class="img-fluid img-custom flex-shrink-0" />
                <p class="mb-0 fs-5 ms-md-5 mt-3 mt-md-0 text-center text-md-start flex-grow-1">
                    Visualizza e gestisci lo stato di ogni ordine
                </p>
            </div>
        </div>
    </a>

    <a href="index.php?action=manage-products" class="text-decoration-none text-dark">
        <div class="mt-4 border border-dark p-4">
            <h3 class="fw-semibold text-md-start text-center">Gestisci i prodotti</h3>
            <div class="d-flex align-items-center mt-4 flex-column flex-md-row">
                <img src="<?php echo IMG_DIR."gestioneProdotti.png"; ?>" 
                    alt="Gestisci prodotti" 
                    class="img-fluid img-custom flex-shrink-0" />
                <p class="mb-0 fs-5 ms-md-5 mt-3 mt-md-0 text-center text-md-start flex-grow-1">
                    Aggiungi, modifica ed elimina i tuoi prodotti dalla lista
                </p>
            </div>
        </div>
    </a>

