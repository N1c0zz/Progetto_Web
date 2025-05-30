<section>
    <h1 class="fw-semibold mt-5">Notifiche</h1>
    <ol class="list-group list-unstyled mt-3" id="notification-list">
        <?php foreach($templateParams["notifications"] as $notif): ?>
            <li class="list-group-item notification <?php if($notif["stato"] == 'da_leggere') echo 'bg-body-secondary' ?>">
                <article>
                    <div class="text-break">
                        <div class="d-flex w-100">
                            <h2 class="mb-3 flex-grow-1 h5"><?php echo $notif["titolo"]; ?></h2>
                            <a class="btn btn-sm bi bi bi-trash3 py-0 pe-1 fs-3 icon delete_notif" id="<?php echo $notif["idnotifica"]; ?>" aria-label="Elimina notifica"></a>
                            <a class="btn btn-sm bi <?php echo $notif["stato"] == 'da_leggere' ? 'bi-envelope-open' : 'bi-envelope' ; ?> py-0 ps-1 fs-3 icon <?php echo $notif["stato"]; ?>" id="<?php echo $notif["idnotifica"]; ?>" aria-label="Segna Come già letto/da leggere"></a>
                            <small class="text-body-secondary mt-2"><?php echo $notif["data"]; ?></small>
                        </div>
                        <p class="mb-1"><?php echo $notif["messaggio"]; ?></p>
                    </div>
                </article>
            </li>
        <?php endforeach; ?>
    </ol>
</section>