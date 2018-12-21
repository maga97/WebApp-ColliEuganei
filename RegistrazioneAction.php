<?php
require_once __DIR__.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR."DBConnection.php";
if(session_status() == PHP_SESSION_NONE) {
 session_start();
}

function validaCampo($campo) {
    return strlen($campo) > 0;
}

$dbConnection = new database();
$dbConnection->Connect();

$isSetEmail=validaCampo($_POST["email"]);
$wrongEmail=false;
$isSetNome=validaCampo($_POST["nome"]);
$wrongNome=false;
$isSetCognome=validaCampo($_POST["cognome"]);
$wrongCognome=false;
$isSetPassword=validaCampo($_POST["password"]);
$isSetPassword2=validaCampo($_POST["password2"]);
$passwordsNotEquals=false;
$userAlreadyExist=false;

if($isSetNome){
  $nome = trim(filter_var($_POST["nome"],FILTER_SANITIZE_STRING));
  if(strlen(filter_var($nome, FILTER_SANITIZE_NUMBER_INT))>0)
    $wrongNome=true;
}
if($isSetCognome){
  $cognome = trim(filter_var($_POST["cognome"],FILTER_SANITIZE_STRING));
  if(strlen(filter_var($cognome, FILTER_SANITIZE_NUMBER_INT))>0)
    $wrongCognome=true;
}
if($isSetEmail){
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    $wrongEmail=true;
  if($dbConnection->user_already_exists($_POST["email"]))
    $userAlreadyExist=true;
}
if($isSetPassword && $isSetPassword2){
  if(!($_POST["password"]==$_POST["password2"]))
    $passwordsNotEquals=true;
}

if($isSetNome && $isSetEmail && $isSetCognome && $isSetPassword && $isSetPassword2 && !$wrongEmail && !$wrongNome && !$wrongCognome && !$passwordsNotEquals )
  echo "entro";

if($isSetNome && $isSetEmail && $isSetCognome && $isSetPassword && $isSetPassword2
  && !$wrongEmail && !$wrongNome && !$wrongCognome && !$userAlreadyExist && !$passwordsNotEquals
){
  if($dbConnection->insert_user($_POST["nome"],$_POST["cognome"],$_POST["email"],
     $_POST["password"],$_POST["indirizzo"],$_POST["civico"],$_POST["citta"],$_POST["CAP"]))
    {
          $_SESSION["username"]=$_POST["Email"];
          $_SESSION["login"]=true;
          header("Location: pages/view-account.php");
    }
    else {
      echo "fallito  vecio";
    }
}
else{
  echo "non entrato";
}
$dbConnection->Close();
?>
