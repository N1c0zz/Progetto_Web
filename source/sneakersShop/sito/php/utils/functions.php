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
    $_SESSION["email"] = $user["email"];
}

// Effettua il logout dell'utente
function logOut() {
    $_SESSION = array(); // unset session variables
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(), 
            '', 
            time() - 42000,
            $params["path"], 
            $params["domain"], 
            $params["secure"], 
            $params["httponly"]
        );
    }
    session_destroy();
}

?>