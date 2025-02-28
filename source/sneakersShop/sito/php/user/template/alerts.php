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

<?php if(isset($templateParams["orderCreationMsg"])): ?>
<!-- conferma di creazione ordine  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["orderCreationMsg"]; ?>
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

<?php if(isset($templateParams["deleteProductSuccess"])): ?>
<!-- conferma aggiornamento nuovo stato dell'ordine -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["deleteProductSuccess"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["itemAddedMsg"])): ?>
<!-- conferma di aggiunta del prodotto al carrello -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $templateParams["itemAddedMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>

<?php if(isset($templateParams["itemAddErrorMsg"])): ?>
<!-- Errore di superamento della disponibilità del prodotto durante l'aggiunta al carrello -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $templateParams["itemAddErrorMsg"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
</div>
<?php endif; ?>