<!-- categorie -->
<nav class="d-flex gap-2 my-3 justify-content-center" aria-label="Navigazione categorie di vendita">
    <a href="/products.php?search=uomo" class="btn btn-light mr-2 border">Uomo</a>
    <a href="/donna" class="btn btn-light mr-2 border">Donna</a>
    <a href="/bambino" class="btn btn-light mr-2 border">Bambino</a>
</nav>

<!-- sezione offerte-->
<div class="mb-3 text-center">
    <h5>OFFERTE</h5>
    <a href="/offerte">
        <div class="border rounded p-3 mx-auto" style="width: 90%; height: 150px;">
            <!-- Immagine con link -->
            <img src="offerte.jpg" alt="Banner delle offerte speciali" style="width: 100%; height: 100%; object-fit: cover;" />
        </div>
    </a>
</div>

<!-- novità e bestseller -->
<div class="row">
    <div class="col-6 mb-3">
        <h6 class="text-center">NOVITÀ</h6>
        <a href="/novita">
            <div class="border rounded p-3 mx-auto" style="width: 90%; height: 100px;">
                <!-- Immagine con link -->
                <img src="novita.jpg" alt="Banner delle novità disponibili" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </a>
    </div>
    <div class="col-6">
        <h6 class="text-center">BESTSELLER</h6>
        <a href="/bestseller">
            <div class="border rounded p-3 mx-auto" style="width: 90%; height: 100px;">
                <!-- Immagine con link -->
                <img src="bestseller.jpg" alt="Banner dei bestseller" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </a>
    </div>
</div>

<!-- Icons Row with Clickable Logos -->
<div class="text-center my-4">
    <h5 class="mb-3">MARCHE</h5>
    <div class="d-flex justify-content-center">
        <a href="#" class="mx-2">
            <img src="<?php echo IMG_DIR."nike.png"; ?>" alt="Nike" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="#" class="mx-2">
            <img src="<?php echo IMG_DIR."adidas.png"; ?>" alt="Adidas" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="#" class="mx-2">
            <img src="<?php echo IMG_DIR."puma.png"; ?>" alt="Puma" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="#" class="mx-2">
            <img src="<?php echo IMG_DIR."newBalance.png"; ?>" alt="New Balance" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="#" class="mx-2">
            <img src="<?php echo IMG_DIR."timberland.png"; ?>" alt="Timberland" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
    </div>
    <div class="mt-3"> <!-- DA SISTEMARE -->
        <a href="/marche" class="text-decoration-none d-block" style="font-size: 1.2em; color: inherit;">
            Tutte le marche
        </a>
    </div>
</div>

<!-- Categories Section -->
<div class="text-center mb-4">
    <h5>Acquista per categoria</h5>
    <a href="/scarpe-uomo" class="btn btn-outline-secondary category-btn">Scarpe uomo</a>
    <a href="/scarpe-donna" class="btn btn-outline-secondary category-btn">Scarpe donna</a>
    <a href="/scarpe-bambino" class="btn btn-outline-secondary category-btn">Scarpe bambino</a>
    <a href="/bestseller" class="btn btn-outline-secondary category-btn">Bestseller</a>
    <a href="/novita" class="btn btn-outline-secondary category-btn">Novità</a>
    <a href="/offerte" class="btn btn-outline-secondary category-btn">Offerte</a>
</div>

<!-- Social Section -->
<div class="text-center my-4">
    <hr class="mb-4" /> <!-- DA SISTEMARE -->
    <div class="d-flex justify-content-center">
        <a href="https://www.facebook.com" target="_blank" class="mx-3 icon" aria-label="Vai alla pagina Facebook">
            <i class="bi bi-facebook fs-3"></i>
        </a>
        <a href="https://www.twitter.com" target="_blank" class="mx-3 icon" aria-label="Vai alla pagina Twitter">
            <i class="bi bi-twitter fs-3"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank" class="mx-3 icon" aria-label="Vai alla pagina Instagram">
            <i class="bi bi-instagram fs-3"></i>
        </a>
    </div>
</div>