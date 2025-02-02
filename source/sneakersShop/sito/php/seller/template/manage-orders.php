<h1 class="mb-4">Gestione Ordini</h1>

    <div class="order-list">
    <?php foreach ($templateParams["sellerOrders"] as $order): ?>
        <a href="index.php?action=edit-order&idordine=<?php echo $order["idordine"]; ?>" class="text-decoration-none text-dark">
            <div class="order-card border rounded p-3 mb-3">
                <h4 class="mb-2">Ordine #<?php echo $order["idordine"]; ?></h4>
                <ul class="list-unstyled mb-2">
                    <?php foreach ($order["prodotti"] as $prodotto): ?>
                    <li><?php echo $prodotto["prodotto_nome"]; ?> - Quantità: <?php echo $prodotto["quantità"]; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p class="mb-1"><strong>Data ordine:</strong> <?php echo $order["data_ordine"]; ?></p>
                <p class="mb-0"><strong>Prezzo totale: </strong>&euro; <?php echo $order["prezzo_totale"]; ?></p>
            </div>
        </a>
    <?php endforeach; ?>
    </div>