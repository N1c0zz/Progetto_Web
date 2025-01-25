<?php

// FUNZIONI DI UTILITA'

// controlla se l'utente è loggato
function isUserLoggedIn() {
    return !empty($_SESSION['idutente']);
}

// imposta le variabili di sessione per l'utente loggato
function registerLoggedUser($user) {
    $_SESSION["idutente"] = $user["idutente"];
    $_SESSION["tipo"] = $user["tipo"];
}

// TODO
function logOut($user) {
    session_unset();
}

?>