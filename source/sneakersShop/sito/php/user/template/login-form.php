<!-- form credenziali login -->

<!-- TODO: specificare action -->
<h1 class="text-center fw-semibold my-5">Accedi</h1>

<?php if(isset($templateParams["loginError"])): ?>
<div class="d-flex justify-content-center">
    <p class="text-danger mb-0"><?php echo $templateParams["loginError"]; ?></p>
</div>
<?php endif; ?>

<form action="php/login.php" method="post" class="mt-3">
    <fieldset>
        <legend class="visually-hidden">credenziali di accesso</legend>
        <div class="d-flex justify-content-center">
            <div class="form-floating mb-3 col-10 col-md-4">
                <input type="email" class="form-control" id="email" placeholder="Inserisci la tua e-mail" name="email" required autofocus />
                <label for="email">Indirizzo e-mail*</label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-floating mb-3 col-10 col-md-4">
                <input type="password" class="form-control" id="pwd" placeholder="Inserisci la password" name="password" required />
                <label for="pwd">Password*</label>
            </div>
        </div>                
    </fieldset>
    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-dark col-8 col-md-3 mt-3" value="ACCEDI" />
    </div>
</form>
<div class="d-flex justify-content-center">
    <a href="php/registration.php" class="btn btn-outline-dark col-8 col-md-3 mt-3">
        REGISTRATI
    </a>
</div>