<?php
require_once "../../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
    exit;
}

if (isset($_GET["id"])):
    $db = new database();
    $db->connect();
    $esito = $db->RimuoviGita($_GET["id"]);
    if ($esito == true) {
        header("Location: ../../admin/remove-trip.php?done=true");
    } else {
        header("Location: ../../admin/remove-trip.php?error=Cancellazione+non+riuscita");
    }
else:
    header("Location: ../../admin/remove-trip.php");
endif;
?>