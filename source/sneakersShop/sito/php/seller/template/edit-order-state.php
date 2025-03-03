<h1 class="fw-semibold mb-4">Modifica stato ordine</h1>

    <div class="card border rounded p-3 mb-3">
        <h4 class="mb-3">Ordine #<?php echo $idordine ?></h4>
        <form action="index.php?action=save-new-order-state&idordine=<?php echo $idordine ?>" method="post">
            <div class="mb-3">
                <label for="orderStatus" class="form-label"><strong>Stato attuale:</strong></label>
                <select class="form-select" id="orderStatus" name="newStatus" aria-label="Seleziona lo stato dell'ordine">
                    <option value="In elaborazione" <?php echo ($statoAttuale == "In elaborazione") ? 'selected' : ''; ?>>In elaborazione</option>
                    <option value="Spedito" <?php echo ($statoAttuale == "Spedito") ? 'selected' : ''; ?>>Spedito</option>
                    <option value="Consegnato" <?php echo ($statoAttuale == "Consegnato") ? 'selected' : ''; ?>>Consegnato</option>
                    <option value="Annullato" <?php echo ($statoAttuale == "Annullato") ? 'selected' : ''; ?>>Annullato</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="orderNote" class="form-label"><strong>Nota (opzionale):</strong></label>
                <textarea class="form-control" id="orderNote" rows="3" name="nota" placeholder="Aggiungi una nota per il cliente..."></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php?action=manage-orders" class="btn btn-outline-secondary">Annulla</a>
                <button type="submit" class="btn btn-dark">Salva modifiche</button>
            </div>
        </form>
    </div>