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
            <div class="d-flex justify-content-start">
                <a href="index.php?action=change-user-info" class="btn btn-dark col-4 col-md-3 mt-3">Modifica</a>
            </div>
        </section>

        <section class="mb-4 section-border">
            <h4 class="fs-4 mb-3 fw-semibold">Modifica Password</h4>
            <?php if(isset($templateParams["oldPwdError"])): ?>
            <div class="d-flex justify-content-center">
                <p class="text-danger mb-0"><?php echo $templateParams["oldPwdError"]; ?></p>
            </div>
            <?php endif; ?>
            <?php if(isset($templateParams["pwdConfError"])): ?>
            <div class="d-flex justify-content-center">
                <p class="text-danger mb-0"><?php echo $templateParams["pwdConfError"]; ?></p>
            </div>
            <?php endif; ?>
            <form action="index.php?action=account" method="post">
                <fieldset>
                    <legend class="visually-hidden">Modifica password</legend>
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Inserisci vecchia password:</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required />
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Inserisci nuova password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required />
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Conferma nuova password:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="newPasswordConf" required />
                    </div>
                </fieldset>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <input type="submit" class="btn btn-dark col-4 col-md-3 mt-3 mb-4" aria-label="Conferma la modifica della password" value="Modifica password"></button>
                </div>
            </form>
        </section>

        <?php if(isset($templateParams["showOrderList"]) && $templateParams["showOrderList"] == true): ?>
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
        <section class="d-flex justify-content-center my-5">
            <a href="index.php?action=logout" class="btn btn-danger mt-5">ESCI DALL'ACCOUNT</a>
        </section>
    </div>
</div>