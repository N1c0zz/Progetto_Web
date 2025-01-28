<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="<?php echo BASE_PATH; ?>" />
    <title><?php echo $templateParams["pageTitle"]; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Link al file CSS generale -->
    <link rel="stylesheet" href="../css/general.css" />
    <!-- Link al file CSS personalizzato -->
    <link rel="stylesheet" href="../css/homepage.css" />
</head>
<body class="d-flex flex-column min-vh-100">
<header class="bg-light py-2">
    <div class="container">
        <nav class="d-flex" aria-label="Navigazione principale">
            <a href="./notifications.php" class="bi bi-bell me-auto p-2 fs-3 icon" aria-label="Vai alla sezione notifiche"></a>
            <a href="php/login.php" class="bi bi-person-circle p-2 fs-3 icon" aria-label="Esegui il login o vai alla tua pagina personale"></a>
            <a href="./cartPage.php" class="bi bi-cart p-2 fs-3 icon" aria-label="Vai al tuo carrello"></a>
        </nav>
        <div class="container-fluid">
            <form class="d-flex" role="search" aria-label="Cerca prodotti">
              <label for="searchInput" class="visually-hidden">Cerca prodotto</label>
              <input class="form-control me-2" type="search" placeholder="Cerca prodotto" aria-label="cerca prodotto" />
              <button class="btn btn-outline-dark" type="submit">Cerca</button>
            </form>
          </div>
    </div>
</header>

<main class="container overflow-auto py-3">
    <!-- messaggio di logout -->
    <?php if(isset($templateParams["logoutMsg"])): ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $templateParams["logoutMsg"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
    </div>
    <?php endif; ?>

    <?php if(isset($templateParams["registrationMsg"])): ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $templateParams["registrationMsg"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
    </div>
    <?php endif; ?>
    
    <?php
        require($templateParams["name"]); // import del template specificio
    ?>
</main>

<footer class="footer mt-auto bg-light py-3">
    <div class="container">
        <div class="text-center mb-3">
            <a href="index.php">
                <img src="<?php echo IMG_DIR."logo.png"; ?>" alt="Logo" style="width: 100px; height: auto;" />
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <nav class="text-start" aria-label="Navigazione pagine informative per l'utente">
                <a href="#" class="d-block mb-1">Informativa Privacy</a>
                <a href="#" class="d-block mb-1">Informativa Cookie</a>
                <a href="#" class="d-block mb-1">Termini e Condizioni</a>
            </nav>
            <div class="text-end">
                <p class="mb-0">
                    Nome Sede<br>
                    Indirizzo<br>
                    Città, CAP<br>
                    Telefono
                </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
