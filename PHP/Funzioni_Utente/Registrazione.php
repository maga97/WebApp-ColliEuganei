<?php
require_once "DataBase/DBConnection.php";
require_once "PHP/Funzioni_Generali/ValidaCampo.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}


$dbConnection = new database();
$dbConnection->Connect();
//controllo che i campi obbligatori non siano vuoti
$email = validaCampo($_POST["email"]);
$nome = validaCampo($_POST["nome"]);
$cognome = validaCampo($_POST["cognome"]);
$Password = validaCampo($_POST["password"]);
$Password2 = validaCampo($_POST["password2"]);

if (!$email || !$nome || !$cognome || !$Password || !$Password2) {
    $errore = "Non hai inserito tutti i campi obbligatori";
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { // controllo che l'email sia nel formato giusto
    $errore = "Ricontrolla che l'email inserita sia nel formato corretto";
} else if ($_POST["password"] != $_POST["password2"]) { // controllo che le due password comabacino
    $errore = "Le due password inserite non coincidono";
} else if ($dbConnection->user_already_exists($_POST["email"])) { // controllo che l'utente non sia gia' registrato con quell'email
    $errore = "La mail inserita appartiene ad un altro utente";
} else if ($dbConnection->insert_user($_POST["nome"], $_POST["cognome"], $_POST["email"],
    $_POST["password"], $_POST["indirizzo"], $_POST["citta"],
    $_POST["civico"], $_POST["CAP"])) { // provo ad inserire i dati nel db
    $_SESSION["username"] = $_POST["email"];
    $_SESSION["login"] = true;
    header("Location: Impostazioni.php");
    exit;
} else {
    $errore = "L'inserimento non &egrave; andato a buon fine. Ti preghiamo di riprovare";
}


$dbConnection->Close();
?>
