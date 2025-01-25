<!-- form credenziali login -->

<!-- TODO: specificare action -->
<h1 class="text-center fw-semibold my-5">Accedi</h1>
<?php if(ifset($templateParams["loginError"])): ?>
<p><?php echo $templateParams["loginError"]; ?></p>
<?php endif; ?>
<form action="login.php" method="post" class="mt-5">
    <fieldset>
        <legend class="visually-hidden">credenziali di accesso</legend>
        <div class="d-flex justify-content-center">
            <div class="form-floating mb-3 col-md-4">
                <input type="email" class="form-control" id="email" placeholder="Inserisci la tua e-mail" required autofocus />
                <label for="email">Indirizzo e-mail*</label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="form-floating mb-3 col-md-4">
                <input type="password" class="form-control" id="pwd" placeholder="Inserisci la password" required />
                <label for="pwd">Password*</label>
            </div>
        </div>                
    </fieldset>
    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-dark col-10 col-md-3 mt-3" value="ACCEDI" />
    </div>
</form>
<div class="d-flex justify-content-center">
    <a href="./registration.html" class="btn btn-outline-dark col-10 col-md-3 mt-3">
        REGISTRATI
    </a>
</div>