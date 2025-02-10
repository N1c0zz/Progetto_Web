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
    <link rel="stylesheet" href="css/general.css" />
    <?php if (isset($templateParams["styleSheet"])): ?>
        <?php foreach ($templateParams["styleSheet"] as $sheet): ?>
            <link rel="stylesheet" href="<?php echo $sheet; ?>" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="bg-light py-2">
        <div class="container d-flex flex-column align-items-center">
            <nav class="d-flex w-100 justify-content-center align-items-center position-relative" aria-label="Navigazione principale">
                <a href="index.php?action=notifications" class="bi bi-bell p-2 fs-1 icon" aria-label="Vai alla sezione notifiche"></a>
                <a href="index.php?action=home" class="logo-container">
                    <img src="<?php echo IMG_DIR . "logo.png"; ?>" alt="Logo" class="header-logo" />
                </a>
                <div class="d-flex align-items-center gap-1">
                    <a href="index.php?action=login" class="bi bi-person-circle p-2 fs-1 icon" aria-label="Esegui il login o vai alla tua pagina personale"></a>
                    <?php if (!isUserLoggedIn() || $_SESSION["tipo"] != "venditore"): ?>
                        <a href="index.php?action=cart" class="bi bi-cart p-2 fs-1 icon" aria-label="Vai al tuo carrello"></a>
                </div>
            </nav>
            <div class="container-fluid">
                <form action="index.php" method="get" class="d-flex" role="search" aria-label="Cerca prodotti">
                    <legend class="visually-hidden">Ricerca prodotti</legend>
                    <fieldset class="flex-grow-1 me-2">
                        <label for="searchInput" class="visually-hidden">Cerca prodotto</label>
                        <input class="form-control" type="search" placeholder="Cerca prodotto" name="search" aria-label="cerca prodotto" />
                    </fieldset>
                    <button class="btn btn-outline-dark" name="action" value="products" type="submit">Cerca</button>
                </form>
            </div>
        <?php endif; ?>
        </div>
    </header>

    <main class="container overflow-auto py-3">
        <?php
        require("php/user/template/alerts.php");
        require($templateParams["name"]); // import del template specificio
        ?>
    </main>

    <footer class="footer mt-auto bg-light py-3">
        <div class="container">
            <div class="text-center mb-3">
                <a href="index.php?action=home">
                    <img src="<?php echo IMG_DIR . "logo.png"; ?>" alt="Logo" style="width: 100px; height: auto;" />
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
    <?php
    if ((isset($templateParams["js"]))) {
        foreach ($templateParams["js"] as $script) {
            echo "<script src=$script></script>";
        }
    }
    ?>
</body>

</html>