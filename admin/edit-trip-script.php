<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login']) || $_SESSION['login'] == false || $_SESSION['admin'] != 1) {
    echo "script";
}
$id = $_POST["id"];
$nomegita = $_POST["nomegita"];
$descrizione = $_POST["descrizione"];
$data = $_POST["data"];
$ora = $_POST["ora"];
$prezzo = $_POST["prezzo"];
$errore = false;

if (!isset($nomegita)) {
    header("Location: edit-trip.php?id=" . $id . "&error=Nome+gita+non+definito");
    $errore = true;
}
if (empty($descrizione)) {
    header("Location: edit-trip.php?id=" . $id . "&error=Descrizione+gita+non+definita");
    $errore = true;
}
if (empty($data)) {
    header("Location: edit-trip.php?id=" . $id . "&error=Data+gita+non+definita");
    $errore = true;
}
if (empty($ora)) {
    header("Location: edit-trip.php?id=" . $id . "&error=Ora+gita+non+definita");
    $errore = true;
}
if (empty($prezzo)) {
    header("Location: edit-trip.php?id=" . $id . "&error=Prezzo+gita+non+definito");
    $errore = true;
}

$data_array = array();
if (substr_count($_POST["data"], "/") == 2) {
    $data_array = explode("/", $_POST["data"]);
} elseif (substr_count($_POST["data"], "-") == 2) {
    $data_array = explode("-", $_POST["data"]);
} else {
    header("Location: edit-trip.php?id=" . $id . "&error=Formato+data+gita+non+corretto");
    $errore = true;
}

$ora_array = array();
if (substr_count($ora, ":") == 1) {
    $ora_array = explode(":", $ora);
} else {
    header("Location: edit-trip.php?id=" . $id . "&error=Formato+ora+gita+non+corretto");
    $errore = true;
}
if (!is_numeric($ora_array[0]) || !is_numeric($ora_array[1]) || !is_numeric($data_array[0]) ||
    !is_numeric($data_array[1]) || !is_numeric($data_array[2])) {
    header("Location: edit-trip.php?id=" . $id . "&error=Tipo+numerico+non+corretto");
    $errore = true;
}
if (intval($ora_array[0]) > 23 || intval($ora_array[0]) < 0) {
    header("Location: edit-trip.php?id=" . $id . "&error=Ora+non+corretta");
    $errore = true;
}
if (intval($ora_array[1]) > 59 || intval($ora_array[0]) < 0) {
    header("Location: edit-trip.php?id=" . $id . "&error=Ora+non+corretta");
    $errore = true;
}
if (intval($data_array[0]) > 31 || intval($data_array[0]) < 0) {
    header("Location: edit-trip.php?id=" . $id . "&error=Numero+giorno+inserito+errato");
    $errore = true;
}
if (intval($data_array[1]) > 12 || intval($data_array[1]) < 0) {
    header("Location: edit-trip.php?id=" . $id . "&error=Numero+mese+inserito+errato");
    $errore = true;
}
if (intval($data_array[2]) < date("Y")) {
    header("Location: edit-trip.php?id=" . $id . "&error=" . urlencode("Anno inserito minore rispetto all' anno attuale."));
    $errore = true;
}
if ($errore == false) {
    $db = new database();
    $db->connect();
    $data = $data_array[2] . "-" . $data_array[1] . "-" . $data_array[0];
    $esito = $db->ModificaGita($id, $nomegita, $descrizione, $data, $ora, $prezzo);
    if ($esito) {
        header("Location: select-trip-modify.php?done=true");
    } else {
        header("Location: edit-trip.php?id=" . $id . "&error=Modifica+fallita");
    }

}
