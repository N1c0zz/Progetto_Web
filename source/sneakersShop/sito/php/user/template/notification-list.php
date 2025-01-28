<h1 class="fw-semibold mt-5">NOTIFICHE</h1>
<ol class="list-group list-unstyled mt-3">
    <?php foreach($templateParams["notifications"] as $notif): ?>
        <li class="list-group-item">
            <div class="text-break">
                <div class="d-flex w-100">
                    <h2 class="mb-3 flex-grow-1 h5"><?php echo $notif["titolo"]; ?></h2>
                    <!-- TODO: valuta se usare AJAX per cambiare lo stato della mail -->
                    <a class="btn btn-sm bi bi-envelope-open py-0 fs-3 icon" aria-label="Segna Come letto o non letto"></a>
                    <small class="text-body-secondary mt-2"><?php echo $notif["data"]; ?></small>
                </div>
                <p class="mb-1"><?php echo $notif["messaggio"]; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ol>
