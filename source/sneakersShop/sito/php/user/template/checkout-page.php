<?php $userInfo = $templateParams["userInfo"][0]; ?>
<div class="container">
    <div class="checkout-container">
        <h2 class="text-start fw-semibold my-3">Checkout</h2>

        <section class="orders-table section-border mb-4">
            <h4 class="fs-4 mb-3 fw-semibold">Riepilogo ordine</h4>

            <!-- Tabella visibile solo su desktop -->
            <div class="d-none d-md-block">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Modello</th>
                            <th>Colore</th>
                            <th>Prezzo</th>
                            <th>Taglia</th>
                            <th>Quantità</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($templateParams["cartItems"] as $item): ?>
                        <tr>
                            <td><?php echo $item["modello"]; ?></td>
                            <td><?php echo $item["colore"]; ?></td>
                            <td><?php echo $item["prezzo"]; ?> €</td>
                            <td><?php echo $item["tagliaAggiunta"]; ?></td>
                            <td><?php echo $item["quantitàAggiunta"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Lista di card visibile solo su mobile -->
            <div class="d-md-none">
                <?php foreach($templateParams["cartItems"] as $item): ?>
                <div class="order-item p-3 border rounded mb-3">
                    <p class="mb-1"><strong>Modello:</strong> <?php echo $item["modello"]; ?></p>
                    <p class="mb-1"><strong>Colore:</strong> <?php echo $item["colore"]; ?></p>
                    <p class="mb-1"><strong>Prezzo:</strong> <?php echo $item["prezzo"]; ?> €</p>
                    <p class="mb-1"><strong>Taglia:</strong> <?php echo $item["tagliaAggiunta"]; ?></p>
                    <p class="mb-0"><strong>Quantità:</strong> <?php echo $item["quantitàAggiunta"]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <p class="text-center text-md-start mt-4 fw-bold fs-3 mb-1">
                Totale: &euro; <?php echo $templateParams["total"]; ?>
            </p>
        </section>
        
        <section class="mb-4 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Informazioni di contatto</h4>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" value="<?php echo $userInfo["nome"]; ?>" readonly aria-readonly="true" />
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome:</label>
                <input type="text" class="form-control" id="cognome" value="<?php echo $userInfo["cognome"]; ?>" readonly aria-readonly="true" />
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" id="telefono" value="<?php echo $userInfo["numeroTelefono"]; ?>" readonly aria-readonly="true" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $userInfo["email"]; ?>" readonly aria-readonly="true" />
            </div>
        </section>

        <section class="mb-4 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Spedizione</h4>
            <p class="mb-1">Spedizione predefinita presso:</p>
            <p class="mb-0">Campus di Architettura ed Ingegneria UniBo</p>
            <p class="mb-0">Via dell'Università</p>
            <p>Cesena</p>
        </section>

        <section class="mb-4 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Pagamento</h4>
            <form action="index.php?action=create-order" method="post">
                <fieldset>
                    <legend class="visually-hidden"></legend>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="titolo-carta" name="card-name" placeholder="Inserisci nome e cognome" required maxlength="50" pattern="[A-Za-z\s]+" title="Inserisci solo lettere e spazi" />
                        <label for="titolo-carta" class="form-label">Nome e Cognome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="numero-carta" name="card-number" placeholder="Inserisci numero carta" required maxlength="16" pattern="\d{16}" title="Il numero della carta deve contenere esattamente 16 cifre" />
                        <label for="numero-carta" class="form-label">Numero Carta</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="cvv" name="card-cvv" placeholder="Inserisci CVV" required maxlength="3" pattern="\d{3}" title="Il CVV deve contenere esattamente 3 cifre" />
                        <label for="cvv" >CVV</label>
                    </div>
                </fieldset>
                <div class="text-end mt-2 d-flex justify-content-center">
                    <input type="submit" class="btn btn-dark btn-lg" aria-label="Effettua l'ordine" value="Effettua l'ordine" />
                </div>
            </form>
        </section>
    </div>
</div>
