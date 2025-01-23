<h1 class="mb-4">Il mio carrello</h1>

<!-- Utente loggato con prodotti -->
<section id="logged-with-products" class="d-none"> <!-- la classe d-none di Bootstrap serve a rendere un elemento nascosto dalla visualizzazione-->
    <div class="card mb-3">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <img src="../img/prodotto.jpg" class="img-fluid rounded-start" alt="Immagine prodotto" style="aspect-ratio: 1 / 1; object-fit: cover;" />
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h6 class="card-title mb-1">Nome prodotto</h6>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">Categoria: Categoria prodotto</p>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">Colore: Colore prodotto</p>
                    <p class="card-text fw-bold" style="font-size: 1rem;">Prezzo: €XX.XX</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end fw-bold">Totale: €XX.XX</div>
    <div class="text-end mt-3">
        <button class="btn btn-dark">Vai al pagamento</button>
    </div>
</section>

<!-- Utente loggato senza prodotti -->
<div id="logged-no-products" class="d-none text-center">
    <p>Non hai ancora aggiunto prodotti al tuo carrello</p>
</div>

<!-- Utente non loggato senza prodotti -->
<div id="not-logged-no-products" class="d-none text-center">
    <div class="border border-dark p-3 d-inline-block">
        <a href="/accedi" class="btn btn-dark w-100 mb-2">Accedi</a>
        <a href="/registrati" class="btn btn-outline-dark w-100">Registrati</a>
    </div>
    <p class="mt-3">Non hai ancora aggiunto prodotti al tuo carrello</p>
</div>

<!-- Utente non loggato con prodotti -->
<div id="not-logged-with-products" class="d-none">
    <div class="border border-dark p-3 mb-3">
        <a href="/accedi" class="btn btn-dark w-100 mb-2">Accedi</a>
        <a href="/registrati" class="btn btn-outline-dark w-100">Registrati</a>
    </div>
    <div class="card mb-3">
        <div class="row g-0 align-items-center">
            <div class="col-4">
                <img src="../img/prodotto.jpg" class="img-fluid rounded-start" alt="Immagine prodotto" style="aspect-ratio: 1 / 1; object-fit: cover;" />
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h6 class="card-title mb-1">Nome prodotto</h6>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">Categoria: Categoria prodotto</p>
                    <p class="card-text mb-1" style="font-size: 0.9rem;">Colore: Colore prodotto</p>
                    <p class="card-text fw-bold" style="font-size: 1rem;">Prezzo: €XX.XX</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end fw-bold">Totale: €XX.XX</div>
    <div class="text-end mt-3">
        <a href="checkoutPage.html" class="btn btn-dark" aria-label="Vai al pagamento">Vai al pagamento</a>
    </div>          
</div>