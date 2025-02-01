<h1 class="mb-4">Modifica Stato Ordine</h1>

    <div class="card border rounded p-3 mb-3">
        <h4 class="mb-3">Ordine #<?php echo $idordine ?></h4>
        <form action="index.php?action=save-new-order-state" method="post">
            <div class="mb-3">
                <label for="orderStatus" class="form-label"><strong>Stato attuale:</strong></label>
                <select class="form-select" id="orderStatus" aria-label="Seleziona lo stato dell'ordine">
                    <option value="In elaborazione">In elaborazione</option>
                    <option value="Spedito">Spedito</option>
                    <option value="Consegnato">Consegnato</option>
                    <option value="Annullato">Annullato</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="orderNote" class="form-label"><strong>Nota (opzionale):</strong></label>
                <textarea class="form-control" id="orderNote" rows="3" placeholder="Aggiungi una nota per il cliente..."></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php?action=manage-orders" class="btn btn-outline-secondary">Annulla</a>
                <button type="submit" class="btn btn-dark">Salva modifiche</button>
            </div>
        </form>
    </div>