<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION["username"]))
  header("Location: index.php");
require_once("DataBase/DBConnection.php");
$db= new database();
$db->connect();
if($db->deletePrenotazione($_GET["id"]))
  header("Location: view-my-trip.php");
else
  echo "errore";

?>
