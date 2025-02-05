<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

if(isset($_POST["currentStatus"]) && isset($_POST["notificationID"])) {
    $newStatus = $_POST["currentStatus"] == 'da_leggere' ? 'letta' : 'da_leggere';
    $dbh->changeNotificationStatus($_SESSION["idutente"], $_POST["notificationID"], $newStatus);
    $result["status-changed"] = true;
    echo json_encode($result);
}

?>