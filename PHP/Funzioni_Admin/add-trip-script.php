<?php
require_once "../DataBase/DBConnection.php";
if (!isset($_SESSION['login']) || $_SESSION['login'] == false || $_SESSION['admin'] != 1) {
    header("Location: ../Accedi.php");
    exit;
}
//add-trip-script.php
$nomegita = $_POST["nomegita"];
$descrizione = $_POST["descrizione"];
$immagine = $_FILES["immagine"];
$data = $_POST["data"];
$ora = $_POST["ora"];
$prezzo = $_POST["prezzo"];

if (!isset($nomegita)) {
    return "Nome gita non definito";

} else if (empty($descrizione)) {
    return "Descrizione gita non definita";
} else if ($_FILES['immagine']['size'] == 0) {
    return "immagine gita non definita";
} else if (strlen($_FILES["immagine"]["name"]) > 0 && $_FILES["immagine"]["size"] == 0) {
    return "Errore provare con un altro file";

} else if ($_FILES['immagine']['size'] > 2097152) {
    return "Immagine troppo grande. Deve essere al massimo 2 Mb.";
}
$ext_ok = array('jpeg', 'jpg', 'png', 'PNG', 'JPEG', 'JPG');
$temp = explode('.', $_FILES['immagine']['name']);
$ext = end($temp);
if (!in_array($ext, $ext_ok)) {
    return "Estensione immagine non ammessa";

}

if (empty($data)) {
    return "Data gita non definita";
}
if (empty($ora)) {
    return "Ora gita non definita.";
}
if (empty($prezzo)) {
    return "Prezzo Gita non definito.";
}

$data_array = array();
if (substr_count($_POST["data"], "/") == 2) {
    $data_array = explode("/", $_POST["data"]);
} elseif (substr_count($_POST["data"], "-") == 2) {
    $data_array = explode("-", $_POST["data"]);
} else {
    return "formato data non corretto.";

}

$ora_array = array();
if (substr_count($ora, ":") == 1) {
    $ora_array = explode(":", $ora);
} else {
    return "formato ora non corretto.";

}

if (substr_count($prezzo, ",") == 1) {
    $prezzo = str_replace(",", ".", $prezzo);
}

if (!is_numeric($ora_array[0]) || !is_numeric($ora_array[1]) || !is_numeric($data_array[0]) ||
    !is_numeric($data_array[1]) || !is_numeric($data_array[2])) {
    header("Location: add-trip.php?error=Tipo+numerico+non+corretto");
}
if (intval($ora_array[0]) > 23 || intval($ora_array[0]) < 0) {
    return "Ora non corretta";
}
if (intval($ora_array[1]) > 59 || intval($ora_array[0]) < 0) {
    return "formato ora non corretta.";
}
if (intval($data_array[0]) > 31 || intval($data_array[0]) < 0) {
    return "Numero giorno inserito errato";
}
if (intval($data_array[1]) > 12 || intval($data_array[1]) < 0) {
    return "Numero mese inserito non corretto.";
}
if (intval($data_array[2]) < date("Y")) {
    return "Anno inserito minore rispetto all'anno attuale.";
}

$db = new database();
$db->connect();
$data = $data_array[2] . "-" . $data_array[1] . "-" . $data_array[0];
if (strtotime($data) < strtotime(date("Y-m-d"))) {
    ;
    return "Data inserita antecedente a quella odierna";
}

$esito = $db->AggiungiGita($nomegita, $descrizione, file_get_contents($_FILES['immagine']['tmp_name']), $data, $ora, $prezzo);

if ($esito) {
    return false;
} else {
    return "Inserimento fallito. Ti chiediamo di riprovare piu' tardi.";
}
