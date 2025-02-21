<!-- categorie -->
<nav class="d-flex gap-2 my-3 justify-content-center" aria-label="Navigazione categorie di vendita">
    <a href="index.php?action=products&search=uomo" class="btn btn-light mr-2 border">Uomo</a>
    <a href="index.php?action=products&search=donna" class="btn btn-light mr-2 border">Donna</a>
    <a href="index.php?action=products&search=bambino" class="btn btn-light mr-2 border">Bambino</a>
</nav>

<!-- banner di apertura-->
<div class="mt-5 mb-3 text-center">
    <h5>ESPLORA I NOSTRI PRODOTTI</h5>
    <a href="index.php?action=products">
        <div class="border rounded p-3 mx-auto" style="width: 90%; height: 150px;">
            <img src="<?php echo IMG_DIR."esplora.png"; ?>" style="width: 100%; height: 100%; object-fit: cover;" />
        </div>
    </a>
</div>

<!-- novità e bestseller -->
<div class="row">
    <div class="col-6 mb-3">
        <h6 class="text-center">NOVITÀ</h6>
        <a href="index.php?search=novità">
            <div class="border rounded p-3 mx-auto" style="width: 90%; height: 100px;">
                <!-- Immagine con link -->
                <img src="<?php echo IMG_DIR."novita.png"; ?>" alt="Banner delle novità disponibili" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </a>
    </div>
    <div class="col-6">
        <h6 class="text-center">BESTSELLER</h6>
        <a href="index.php?search=bestseller">
            <div class="border rounded p-3 mx-auto" style="width: 90%; height: 100px;">
                <!-- Immagine con link -->
                <img src="<?php echo IMG_DIR."bestseller.png"; ?>" alt="Banner dei bestseller" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </a>
    </div>
</div>

<!-- Icons Row with Clickable Logos -->
<div class="text-center my-4">
    <h5 class="mb-3">MARCHE</h5>
    <div class="d-flex justify-content-center">
        <a href="index.php?search=nike" class="mx-2">
            <img src="<?php echo IMG_DIR."nike.png"; ?>" alt="Nike" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="index.php?search=adidas" class="mx-2">
            <img src="<?php echo IMG_DIR."adidas.png"; ?>" alt="Adidas" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="index.php?search=puma" class="mx-2">
            <img src="<?php echo IMG_DIR."puma.png"; ?>" alt="Puma" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="index.php?search=new balance" class="mx-2">
            <img src="<?php echo IMG_DIR."newBalance.png"; ?>" alt="New Balance" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
        <a href="index.php?search=timberland" class="mx-2">
            <img src="<?php echo IMG_DIR."timberland.png"; ?>" alt="Timberland" style="width: 3.5em; height: 3.5em; object-fit: contain;" />
        </a>
    </div>
</div>

<!-- Categories Section -->
<div class="text-center mb-4">
    <h5>Acquista per categoria</h5>
    <a href="index.php?action=products&search=uomo" class="btn btn-outline-secondary category-btn">Scarpe uomo</a>
    <a href="index.php?action=products&search=donna" class="btn btn-outline-secondary category-btn">Scarpe donna</a>
    <a href="index.php?action=products&search=bambino" class="btn btn-outline-secondary category-btn">Scarpe bambino</a>
    <a href="index.php?search=bestseller" class="btn btn-outline-secondary category-btn">Bestseller</a>
    <a href="index.php?search=novità" class="btn btn-outline-secondary category-btn">Novità</a>
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