<div class="container">
    <div class="checkout-container">
        <h2 class="text-start fw-semibold my-3">Checkout</h2>

        <section class="mb-4 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Informazioni di contatto</h4>

            <div class="d-flex justify-content-center mb-4">
                <div class="text-center p-4 border rounded-3 border-dark" style="width: 300px;">
                    <h5 class="mb-3">Accedi o Registrati</h5>
                    <a href="/accedi" class="btn btn-dark w-100 mb-2">Accedi</a>
                    <a href="/registrati" class="btn btn-outline-dark w-100">Registrati</a>
                </div>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" value="Prefilled" readonly aria-readonly="true" />
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome:</label>
                <input type="text" class="form-control" id="cognome" value="Prefilled" readonly aria-readonly="true" />
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" id="telefono" value="Prefilled" readonly aria-readonly="true" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" value="Prefilled" readonly aria-readonly="true" />
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
            <form>
                <div class="mb-3">
                    <label for="titolo-carta" class="form-label">Nome e Cognome Titolare Carta:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="titolo-carta" 
                        placeholder="Inserisci nome e cognome" 
                        required 
                        maxlength="50" 
                        pattern="[A-Za-z\s]+" 
                        title="Inserisci solo lettere e spazi" />
                </div>

                <div class="mb-3">
                    <label for="numero-carta" class="form-label">Numero Carta:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="numero-carta" 
                        placeholder="Inserisci numero carta" 
                        required 
                        maxlength="16" 
                        pattern="\d{16}" 
                        title="Il numero della carta deve contenere esattamente 16 cifre" />
                </div>

                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV:</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="cvv" 
                        placeholder="Inserisci CVV" 
                        required 
                        maxlength="3" 
                        pattern="\d{3}" 
                        title="Il CVV deve contenere esattamente 3 cifre" />
                </div>
            </form>
        </section>
        
        <div class="text-end mb-4">
            <button type="button" class="btn btn-dark" aria-label="Effettua l'ordine">Effettua l'Ordine</button>
        </div>
    </div>
</div>
