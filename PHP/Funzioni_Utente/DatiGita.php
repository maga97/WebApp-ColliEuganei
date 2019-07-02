<?php
$dbConnection = new database();
$dbConnection->Connect();
$attivita = $dbConnection->GetAttivita($_GET["id"]);
$_SESSION["ID"] = $_GET["id"];
$_SESSION["prezzo"] = $attivita["Prezzo"];
$_SESSION["data"] = $attivita["Data"];
$_SESSION["ora"] = $attivita["Ore"];
$dbConnection->Close();
?>
