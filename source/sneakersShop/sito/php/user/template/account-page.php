<?php $user = $templateParams["userInfo"] ?>
<div class="container">
    <div class="account-container">
        <h2 class="text-start fw-semibold my-3">Il mio account</h2>

        <section class="mb-5 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Informazioni account</h4>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" value="<?php echo $user["nome"]; ?>" readonly />
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome:</label>
                <input type="text" class="form-control" id="cognome" value="<?php echo $user["cognome"]; ?>" readonly />
            </div>
            <div class="mb-3">
                <label for="dataNascita" class="form-label">Data di nascita:</label>
                <input type="date" class="form-control" id="dataNascita" value="<?php echo $user["dataNascita"]; ?>" readonly />
            </div>
            <div class="mb-3">
                <label for="sesso" class="form-label">Sesso:</label>
                <input type="text" class="form-control" id="sesso" value="<?php echo $user["sesso"]; ?>" readonly />
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Numero di telefono:</label>
                <input type="tel" class="form-control" id="telefono" value="<?php echo $user["numeroTelefono"]; ?>" readonly />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $user["email"]; ?>" readonly />
            </div>
            <div class="d-flex justify-content-center">
                <a href="index.php?action=change-user-info" class="btn btn-lg btn-dark col-10 col-md-4 mt-3">Modifica</a>
            </div>
        </section>
        <section class="mb-4 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Modifica Password</h4>
            <?php if (isset($templateParams["oldPwdError"])): ?>
                <div class="d-flex justify-content-center">
                    <p class="text-danger mb-0"><?php echo $templateParams["oldPwdError"]; ?></p>
                </div>
            <?php endif; ?>
            <?php if (isset($templateParams["pwdConfError"])): ?>
                <div class="d-flex justify-content-center">
                    <p class="text-danger mb-0"><?php echo $templateParams["pwdConfError"]; ?></p>
                </div>
            <?php endif; ?>
            <form action="index.php?action=account" method="post" class="form-with-pwd">
                <fieldset>
                    <legend class="visually-hidden">Modifica password</legend>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control pwd-input" id="oldPassword" placeholder="Inserisci la vecchia password" name="oldPassword" required />
                        <label for="oldPassword">Vecchia password*</label>
                        <button type="button" class="toggle-password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control pwd-input" id="newPassword" placeholder="Inserisci la nuova password" name="newPassword" required />
                        <label for="newPassword">Nuova password*</label>
                        <button type="button" class="toggle-password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control pwd-input" id="confirmPassword" placeholder="Inserisci la nuova password" name="newPasswordConf" required />
                        <label for="confirmPassword">Conferma nuova password*</label>
                        <button type="button" class="toggle-password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-lg btn-dark col-10 col-md-4 my-3" aria-label="Conferma la modifica della password">Modifica</button>
                </div>
            </form>
        </section>

        <?php if (isset($templateParams["showOrderList"]) && $templateParams["showOrderList"] == true): ?>
            <section class="orders-table section-border">
                <h4 class="fs-4 mb-3 fw-semibold">I miei ordini</h4>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th style="width: 42%;">Numero Ordine</th>
                            <th style="width: 28%;">Data</th>
                            <th style="width: 30%;">Prezzo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($templateParams["orders"] as $order): ?>
                            <tr>
                                <td class="fs-6"><?php echo $order["numeroOrdine"]; ?></td>
                                <td class="fs-6"><?php echo $order["dataOrdine"]; ?></td>
                                <td class="fs-6">&euro; <?php echo $order["prezzoTotale"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
        <div class="d-flex justify-content-center my-5">
            <a href="index.php?action=logout" class="btn btn-danger col-10 col-md-4 mt-4">ESCI DALL'ACCOUNT</a>
        </div>
    </div>
</div>