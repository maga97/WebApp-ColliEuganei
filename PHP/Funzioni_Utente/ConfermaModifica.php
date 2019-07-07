<?php
$Email = validaCampo($_POST["email"]);
$Nome = validaCampo($_POST["nome"]);
$Cognome = validaCampo($_POST["cognome"]);
if (!$Email || !$Nome || !$Cognome)
    $erroredati = "Hai lasciato dei campi obbligatori vuoti";
else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) // controllo che l'email sia nel formato giusto
    $erroredati = "controllare che la mail sia nel formato giusto";
else if ($_POST["email"] != $_SESSION["username"] && $db->user_already_exists($_POST["email"])) // controllo che l'utente non sia gia' registrato con quell'email
    $erroredati = "la nuova  mail appartiene ad un altro utente";
else if ($db->update_user($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["indirizzo"], $_POST["citta"],
    $_POST["civico"], $_POST["CAP"], $_SESSION['username']))// provo ad aggiornare i dati nel db
    $_SESSION["username"] = $_POST["email"];
else
    $erroredati = "Abbiamo dei problemi interni. Ti preghiamo di riprovare pi&ugrave; tardi";
?>
