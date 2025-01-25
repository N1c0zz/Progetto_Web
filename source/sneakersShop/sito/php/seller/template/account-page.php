<div class="container">
        <div class="account-container">
            <h2 class="text-start fw-semibold my-3">Il mio account</h2>

            <section class="mb-4 section-border">
                <?php foreach($templateParams["sellerDetails"] as $sellerDetails): ?>
                <h4 class="fs-4 mb-3 fw-semibold">Informazioni account</h4>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" value="<?php echo $sellerDetails["nome"]; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="cognome" class="form-label">Cognome:</label>
                    <input type="text" class="form-control" id="cognome" value="<?php echo $sellerDetails["cognome"]; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="dataNascita" class="form-label">Data di nascita:</label>
                    <input type="text" class="form-control" id="dataNascita" value="<?php echo $sellerDetails["dataNascita"]; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $sellerDetails["email"]; ?>" readonly />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" value="<?php echo $sellerDetails["password"]; ?>" readonly />
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword" aria-label="Mostra password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
                                            
            <section class="mb-4 section-border">
                <h4 class="fs-4 mb-3 fw-semibold">Modifica Password</h4>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Inserisci vecchia password:</label>
                        <input type="password" class="form-control" id="oldPassword" />
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Inserisci nuova password:</label>
                        <input type="password" class="form-control" id="newPassword" />
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Conferma nuova password:</label>
                        <input type="password" class="form-control" id="confirmPassword" />
                    </div>
                    <button type="submit" class="btn btn-dark" aria-label="Conferma la modifica della password">Modifica password</button>
                </form>
            </section>       
        </div>
    </div>