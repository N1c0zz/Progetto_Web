<h1 class="fw-semibold mt-5">Notifiche</h1>
<ol class="list-group list-unstyled mt-3" id="notification-list">
    <?php foreach($templateParams["notifications"] as $notif): ?>
        <li class="list-group-item <?php if($notif["stato"] == 'da_leggere') echo 'bg-body-secondary' ?>">
            <div class="text-break">
                <div class="d-flex w-100">
                    <h2 class="mb-3 flex-grow-1 h5"><?php echo $notif["titolo"]; ?></h2>
                    <a class="btn btn-sm bi <?php echo $notif["stato"] == 'da_leggere' ? 'bi-envelope-open' : 'bi-envelope' ; ?> py-0 fs-3 icon <?php echo $notif["stato"]; ?>" id="<?php echo $notif["idnotifica"]; ?>" aria-label="Segna Come già letto/da leggere"></a>
                    <small class="text-body-secondary mt-2"><?php echo $notif["data"]; ?></small>
                </div>
                <p class="mb-1"><?php echo $notif["messaggio"]; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ol>
