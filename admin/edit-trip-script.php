<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
   session_start();
  }
if(!isset($_SESSION['login']) || $_SESSION['login'] == false || $_SESSION['admin'] != 1)  {
    header("Location: ../login.php");
  }
$id = $_POST["id"];
$nomegita = $_POST["nomegita"];
$descrizione = $_POST["descrizione"];
$data = $_POST["data"];
$ora = $_POST["ora"];
$prezzo = $_POST["prezzo"];

if(!isset($nomegita)) {
    header("Location: edit-trip.php?error=Nome+gita+non+definito"); 
    exit;
}
if(empty($descrizione)) {
    header("Location: edit-trip.php?error=Descrizione+gita+non+definita");
    exit;
}    
if(empty($data)) { 
    header("Location: edit-trip.php?error=Data+gita+non+definita");
    exit;
}
if(empty($ora)) {
    header("Location: edit-trip.php?error=Ora+gita+non+definita");
    exit;
}
if(empty($prezzo)) {
    header("Location: edit-trip.php?error=Prezzo+gita+non+definito");
    exit;
}

$data_array = array();
if(substr_count($_POST["data"], "/") == 2) {
    $data_array = explode("/", $_POST["data"]);
} elseif (substr_count($_POST["data"], "-") == 2) {
    $data_array = explode("-", $_POST["data"]);
}
else {
    header("Location: edit-trip.php?error=Formato+ora+gita+non+corretto");
    exit;
}

$ora_array = array();
if(substr_count($ora, ":") == 1) {
    $ora_array = explode(":", $ora);
} 
else {
    header("Location: edit-trip.php?error=Formato+ora+gita+non+corretto");
    exit;
}
if(!is_integer($ora_array[0]) || !is_integer($ora_array[1]) || !is_integer($data_array[0]) ||
 !is_integer($data_array[1]) || !is_integer($data_array[2])) {
     header("Locationedit-trip.php?error=Tipo+numerico+non+corretto");
 }
if(intval($ora_array[0]) > 23 || intval($ora_array[0]) < 0) {
    header("Location: edit-trip.php?error=Ora+non+corretta");
    exit;
} 
if(intval($ora_array[1]) > 59 || intval($ora_array[0]) < 0) {
    header("Location: edit-trip.php?error=Ora+non+corretta");
    exit;
}
if(intval($data_array[0]) > 31 || intval($data_array[0]) < 0) {
    header("Location: edit-trip.php?error=Numero+giorno+inserito+errato");
    exit;
}
if(intval($data_array[1]) > 12 || intval($data_array[1]) < 0) {
    header("Location: edit-trip.php?error=Numero+mese+inserito+errato");
    exit;
}
if(intval($data_array[2]) < date("Y")) {
    header("Location: edit-trip.php?error=" .urlencode("Anno inserito minore rispetto all' anno attuale."));
    exit;
}
$db = new database();
$db->connect();
$esito = $db->ModificaGita($id, $nomegita, $descrizione, $data, $ora, $prezzo);
if($esito)
    header("Location: select-trip-modify.php?done=true"); 
else
    header("Location: edit-trip.php?error=Modifica+fallita");
?>
