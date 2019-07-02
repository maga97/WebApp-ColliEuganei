<?php
$db = new database();
$db->connect();
$pwd = validaCampo($_POST["vecchia-password"]);
$newpwd = validaCampo($_POST["password"]);
$newpwd2 = validaCampo($_POST["password2"]);
if ($pwd && $newpwd && $newpwd2) {
    if ($db->user_login($_SESSION["username"], $_POST["vecchia-password"])) {
        if ($_POST["password"] == $_POST["password2"])
            $db->AggiornaPWDUtente($_SESSION["username"], $_POST["password"]);
        else
            return "la due password inserite non coincidono";
    } else
        return "la tua password attuale non e' quella giusta";
} else
    return "Non hai inserito tutti i campi obbligatori per la modifica della password";
$db->Close();
unset($db);
?>
