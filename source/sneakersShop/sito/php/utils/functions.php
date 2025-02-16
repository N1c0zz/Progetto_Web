<?php

// FUNZIONI DI UTILITA'

// avvio della sessione
function sec_session_start() {
    $session_name = 'sec_session_id';
    $secure = false; // impostare a true per usare 'https'.
    $httponly = true; // impedisce a javascript di essere in grado di accedere all'id di sessione.
    ini_set('session.use_only_cookies', 1); // forza la sessione ad utilizzare solo i cookie.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
    session_name($session_name);
    session_start();
    session_regenerate_id(); // rigenera la sessione e cancella quella creata in precedenza (impedisce hijacking della sessione).
}

// controlla se l'utente è loggato
function isUserLoggedIn() {
    if(isset($_SESSION['idutente'], $_SESSION['login_string'])) {
        $user_id = $_SESSION['idutente'];
        $login_string = $_SESSION['login_string'];
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        global $dbh;
        return $dbh->login_check($user_id, $login_string, $user_browser); // controllo hijacking
    } else {
        return false;
    }
}

// imposta le variabili di sessione per l'utente loggato
function registerLoggedUser($user) {
    $_SESSION["idutente"] = $user["idutente"];
    $_SESSION["tipo"] = $user["tipo"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["login_string"] = $user["login_string"];
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

// valida le credenziali di pagamento inserite
function validateCardCredentials() {
    return true;
}

// esegue la transazione monetaria per l'ordine
function executeTransaction() {}

?>