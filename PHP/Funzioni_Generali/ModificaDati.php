<?php
$db = new database();
$db->connect();
$Email = validaCampo($_POST["email"]);
$Nome = validaCampo($_POST["nome"]);
$Cognome = validaCampo($_POST["cognome"]);
if (!$Email || !$Nome || !$Cognome)
    return "non hai inserito tutti i campi obbligatori";
if (strlen(filter_var($_POST["nome"], FILTER_SANITIZE_NUMBER_INT)) > 0) // controllo che il nome non contenga numeri
    return "Hai inserito dei valori non consentiti nel campo nome";
if (strlen(filter_var($_POST["cognome"], FILTER_SANITIZE_NUMBER_INT)) > 0) // controllo che il cognome non contenga numeri
    return "Hai inserito dei valori non consentiti nel campo cognome";
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) // controllo che l'email sia nel formato giusto
    return "Hai inserito dei valori non consentiti nel campo E-mail";
if ($_POST["email"] != $_SESSION["username"] && $db->user_already_exists($_POST["email"])) // controllo che l'utente non sia già registrato con quell'email
    return "non hai inserito tutti i campi obbligatori";
if ($db->update_user($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["indirizzo"], $_POST["citta"],
    $_POST["civico"], $_POST["CAP"], $_SESSION['username'])) {// provo ad aggiornare i dati nel db
    $_SESSION["username"] = $_POST["email"];
    return "";
} else
    return "Qualcosa e' andato storto per colpa nostra. Ti chiediamo di provare piu tardi";
$db->Close();
unset($db);
?>
