<!-- form registrazione -->

<h1 class="text-center fw-semibold my-5">Crea un account</h1>

<?php if (isset($templateParams["registrationError"])): ?>
    <div class="d-flex justify-content-center">
        <p class="text-danger mb-2"><?php echo $templateParams["registrationError"]; ?></p>
    </div>
<?php endif; ?>

<form action="index.php?action=registration" method="post" class="form-with-pwd">
    <fieldset>
        <legend class="visually-hidden">credenziali di registrazione</legend>
        <div class="row row-cols-md-2 g-4">
            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="text" class="form-control" id="name" placeholder="Inserisci il tuo nome" name="name" required />
                    <label for="name">Nome*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating mb-3 col-md-8">
                    <input type="text" class="form-control" id="surname" placeholder="Inserisci il tuo Cognome" name="surname" required />
                    <label for="surname">Cognome*</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="date" class="form-control" id="bdate" name="bday" required />
                    <label for="bdate">Data di nascita*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating col-md-8">
                    <select class="form-select" id="sex" name="sex" required>
                        <option selected value="">Seleziona il sesso</option>
                        <option value="Maschio">Maschio</option>
                        <option value="Femmina">Femmina</option>
                        <option value="Altro">Altro</option>
                    </select>
                    <label for="sex">Sesso*</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{10}" placeholder="Digita il tuo numero di telefono" name="phone" required />
                    <label for="phone">Numero di telefono*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating mb-3 col-md-8">
                    <input type="email" class="form-control" id="email" placeholder="Inserisci la tua e-mail" name="email" required />
                    <label for="email">E-mail*</label>
                </div>
            </div>

            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="password" class="form-control pwd-input" id="pwd" placeholder="Scegli una password" name="password" required />
                    <label for="pwd">Password*</label>
                    <button type="button" class="toggle-password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

        </div>
    </fieldset>
    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-dark col-10 col-md-5 mt-3" value="COMPLETA LA REGISTRAZIONE" />
    </div>
</form>