<?php
require_once("../DataBase/DBConnection.php"); 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
}

$db = new database();
$db->connect();
if(isset($_GET["action"], $_GET["id"])) {
    $action = $_GET["action"];
    $id = $_GET["id"];
    switch($action) {
        case "promote":
            if($db->UpdateUserRole($id, "amministratore")) {
                header("Location: add-admin.php?done=true");
            }
            else {
                header("Location: add-admin.php?error=Impossibile+completare+la+modifica");
            }
        break;
        case "remove":
            if($db->UpdateUserRole($id, "utente")) {
                header("Location: remove-admin.php?done=true");
            }
            else {
                header("Location: remove-admin.php?error=Impossibile+completare+la+modifica");
            }
        break;
    }
}

?>