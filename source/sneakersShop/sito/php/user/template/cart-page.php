<h1 class="fw-semibold mt-5 mb-4">Il mio carrello</h1>

<section id="cart-section">
    <?php if(!isset($templateParams["noItemsFound"])): ?>
    <!-- Utente loggato con prodotti -->
    <ul class="list-unstyled cart-list">
        <?php foreach($templateParams["cartItems"] as $item): ?>
        <li class="d-flex justify-content-center cart-item" data-id="<?php echo $item["idmodello"]; ?>">
            <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"></path>
                                </svg>
                                Modifica
                            </a>
                            <button type="button" class="btn btn-outline-danger ms-3 cart-rm-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"></path>
                                </svg>
                                Rimuovi
                            </button>
                        </div>
                    </div>
                <div class="row g-0 d-flex justify-content-between">

                    <div class="col-4 col-md-3 mx-md-2">
                        <img src="<?php echo $item["immagine"]; ?>" class="img-fluid rounded-start" alt="<?php echo $item["modello"]; ?>" style="aspect-ratio: 1 / 1; object-fit: cover;" />
                    </div>
                        <div class="card-body ps-3 d-flex justify-content-between col-8">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="card-title mb-3"><?php echo $item["modello"]; ?></h6>
                                <p class="card-text mb-3" style="font-size: 0.9rem;"><?php echo $item["categorie"]; ?></p>
                                <p class="card-text mb-3" style="font-size: 0.9rem;"><?php echo $item["colore"]; ?></p>
                                <p class="card-text fw-bold" style="font-size: 1rem;">€<?php echo $item["prezzo"]; ?></p>
                            </div>
                            <div class="d-flex align-items-end justify-content-end flex-column">
                                <div class="d-flex justify-items-end flex-column">
                                    <p class="text-end m-0 product-size">Taglia: <?php echo $item["tagliaAggiunta"]; ?></p>
                                    <p class="text-end m-0">Quantità: <?php echo $item["quantitàAggiunta"]; ?></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <div class="cart-info">
        <div class="fw-bold text-center text-md-end">Totale: €<?php echo $templateParams["total"]; ?></div>
        <div class="text-center text-md-end mt-3">
            <a href="index.php?action=checkout" class="btn btn-dark btn-lg">Vai al pagamento</a>
        </div>
    </div>
    <?php else: ?>
    <!-- Utente loggato senza prodotti -->
        <p class="text-center"><?php echo $templateParams["noItemsFound"]; ?></p>
    <?php endif; ?>
</section>