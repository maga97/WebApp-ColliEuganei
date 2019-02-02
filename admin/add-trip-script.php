<?php
require_once "../DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
   session_start();
  }
if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header("Location: login.php");
  }
//add-trip-script.php
$nomegita = $_POST["nomegita"];
$descrizione = $_POST["descrizione"];
$data = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["data"])));
$ora = $_POST["ora"] . ":00";
$prezzo = $_POST["prezzo"];
if(!isset($nomegita))
    header("Location: add-trip.php?error=Nome+gita+non+definito");
if(empty($descrizione))
    header("Location: add-trip.php?error=Descrizione+gita+non+definita");
if(empty($data))
    header("Location: add-trip.php?error=Data+gita+non+definita");
if(empty($ora))
    header("Location: add-trip.php?error=Ora+gita+non+definita");
if(empty($prezzo))
    header("Location: add-trip.php?error=Prezzo+gita+non+definito");
$db = new database();
$db->connect();
$esito = $db->AggiungiGita($nomegita, $descrizione, $data, $ora, $prezzo);
if($esito)
    header("Location: add-trip.php?done=true"); 
else
    header("Location: add-trip.php?error=Inserimento+fallito");
?>