<h1 class="text-start">Profilo venditore</h1>

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

<a href="../manageOrders.php" class="text-decoration-none">
    <div class="mt-4 border border-dark p-4">
        <h3>Gestisci ordini</h3>
        <div class="d-flex align-items-center mt-3">
            <img src="" alt="Gestisci ordini" class="me-3 img-custom" />
            <p class="mb-0">Visualizza e gestisci lo stato di ogni ordine</p>
        </div>
    </div>
</a>

<a href="../manageProducts.php" class="text-decoration-none">
    <div class="mt-4 border border-dark p-4">
        <h3>Gestisci i prodotti</h3>
        <div class="d-flex align-items-center mt-3">
            <img src="" alt="Gestisci ordini" class="me-3 img-custom" />
            <p class="mb-0">Aggiungi, modifica ed elimina i tuoi prodotti dalla lista</p>
        </div>
    </div>
</a>