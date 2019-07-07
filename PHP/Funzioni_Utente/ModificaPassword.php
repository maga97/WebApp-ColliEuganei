<?php
$pwd = validaCampo($_POST["vecchia-password"]);
$newpwd = validaCampo($_POST["password"]);
$newpwd2 = validaCampo($_POST["password2"]);
if (!$pwd || !$newpwd || !$newpwd2)
    $errorepassword = "Hai lasciato vuoti dei campi necessari alla modifica della password";
else if (!$db->user_login($_SESSION["username"], $_POST["vecchia-password"]))
    $errorepassword = "La tua vecchia password inserita non &egrave; corretta";
else if ($_POST["password"] != $_POST["password2"])
    $errorepassword = "Le due nuove password non coincidono";
else
    $db->AggiornaPWDUtente($_SESSION["username"], $_POST["password"]);


?>
