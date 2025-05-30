<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

if(isset($_POST["notificationId"])) {
    $dbh->deleteNotification($_SESSION["idutente"], $_POST["notificationId"]);
    $result["notification-deleted"] = true;
    echo json_encode($result);
}

?>