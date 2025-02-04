<?php if(isset($templateParams["logoutMsg"])): ?>
<!-- conferma di logout -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["logoutMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["registrationMsg"])): ?>
<!-- conferma di registrazione -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["registrationMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["userInfoUpdateMsg"])): ?>
<!-- conferma di aggiornamento dei dettagli dell'account -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["userInfoUpdateMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["pwdUpdateMsg"])): ?>
<!-- conferma di aggiornamento della password dell'utente  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["pwdUpdateMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["saveNewProductMsg"])): ?>
<!-- conferma aggiornamento nuovi dettagli prodotto -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["saveNewProductMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["newOrderStateMsg"])): ?>
<!-- conferma aggiornamento nuovo stato dell'ordine -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["newOrderStateMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>