<!-- conferma di logout -->
<?php if(isset($templateParams["logoutMsg"])): ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["logoutMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<!-- conferma di registrazione -->
<?php if(isset($templateParams["registrationMsg"])): ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["registrationMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<!-- conferma di aggiornamento dei dettagli dell'account -->
<?php if(isset($templateParams["userInfoUpdateMsg"])): ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["userInfoUpdateMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<!-- conferma di aggiornamento della password dell'utente  -->
<?php if(isset($templateParams["pwdUpdateMsg"])): ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["pwdUpdateMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>