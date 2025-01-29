<h1 class="text-center fw-semibold my-5">Modifica le informazioni dell'account</h1>

<?php if(isset($templateParams["userInfoUpdateErrorMsg"])): ?>
<div class="d-flex justify-content-center">
    <p class="text-danger mb-2"><?php echo $templateParams["userInfoUpdateErrorMsg"]; ?></p>
</div>
<?php endif; ?>

<?php $user = $templateParams["userInfo"] ?>
<form action="php/change-user-info.php" method="post">
    <fieldset>
        <legend class="visually-hidden">informazioni dell'account</legend>
        <div class="row row-cols-md-2 g-4">
            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="text" class="form-control" id="name" placeholder="Inserisci il tuo nome"
                    name="name" value="<?php echo $user["nome"]; ?>" required />
                    <label for="name">Nome*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating mb-3 col-md-8">
                    <input type="text" class="form-control" id="surname" placeholder="Inserisci il tuo Cognome"
                    name="surname" value="<?php echo $user["cognome"]; ?>" required />
                    <label for="surname">Cognome*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="date" class="form-control" id="bdate" name="bday" value="<?php echo $user["dataNascita"]; ?>" required />
                    <label for="bdate">Data di nascita*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating col-md-8">
                    <select class="form-select" id="sex" name="sex" required>
                        <option value="">Seleziona il sesso</option>
                        <option value="Maschio" <?php echo ($user["sesso"] == "Maschio") ? 'selected' : ''; ?>>Maschio</option>
                        <option value="Femmina" <?php echo ($user["sesso"] == "Femmina") ? 'selected' : ''; ?>>Femmina</option>
                        <option value="Altro" <?php echo ($user["sesso"] == "Altro") ? 'selected' : ''; ?>>Altro</option>
                    </select>
                    <label for="sex">Sesso*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-end">
                <div class="form-floating mb-3 col-md-8">
                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{10}" placeholder="Digita il tuo numero di telefono"
                    name="phone" value="<?php echo $user["numeroTelefono"]; ?>" required />
                    <label for="phone">Numero di telefono*</label>
                </div>
            </div>
            <div class="d-md-flex justify-content-start">
                <div class="form-floating mb-3 col-md-8">
                    <input type="email" class="form-control" id="email" placeholder="Inserisci la tua e-mail" name="email" value="<?php echo $user["email"]; ?>" required />
                    <label for="email">E-mail*</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-dark col-10 col-md-5 mt-3" value="SALVA MODIFICHE" />
    </div>
</form>