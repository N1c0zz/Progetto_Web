<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

if(isset($_POST["currentAmount"])) {
    $result["new-notifications"] = false;
    $notifs = $dbh->getUserNotifications($_SESSION["idutente"]);
    $missingNotifs = count($notifs) - $_POST["currentAmount"];
    if ($missingNotifs > 0) {
        $result["new-notifications"] = true;
        $result["notifications"] = array_slice($notifs, 0, $missingNotifs);
        header('Content-Type application/json');
    }
    echo json_encode($result);
}

?>