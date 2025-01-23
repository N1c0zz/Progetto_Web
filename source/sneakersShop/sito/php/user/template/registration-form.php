
<!-- form registrazione -->

<h1 class="text-center fw-semibold my-5">Crea un account</h1>

<form action="" method="post">
    <fieldset>
        <div class="row row-cols-md-2 g-4">
            <legend class="visually-hidden">credenziali di registrazione</legend>
            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="text" class="form-control" id="name" placeholder="Inserisci il tuo nome" required />
                    <label for="name">Nome*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating mb-3 col-md-8">
                    <input type="text" class="form-control" id="surname" placeholder="Inserisci il tuo Cognome" required />
                    <label for="surname">Cognome*</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="date" class="form-control" id="bdate" placeholder="Seleziona la data di nascita" required />
                    <label for="bdate">Data di nascita*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating col-md-8">
                    <select class="form-select" id="sex" required>
                        <option selected>Seleziona il sesso</option>
                        <option value="M">Maschio</option>
                        <option value="F">Femmina</option>
                        <option value="O">Altro</option>
                    </select>
                    <label for="sex">Sesso*</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{10}" placeholder="Digita il tuo numero di telefono" required />
                    <label for="phone">Numero di telefono*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating mb-3 col-md-8">
                    <input type="email" class="form-control" id="email" placeholder="Inserisci la tua e-mail" required />
                    <label for="email">E-mail*</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Crea la password" required />
                    <label for="phone">Password*</label>
                </div>
            </div>

        </div>
    </fieldset>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark col-10 col-md-5 mt-3">COMPLETA LA REGISTRAZIONE</button>
    </div>
</form>