<?php
require_once "DataBase/DBConnection.php";
if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
if(isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
function validaCampo($campo) {
    return strlen($campo) > 0;
}

$dbConnection = new database();
$dbConnection->Connect();
$_SESSION["Errore"]=""; // sessione utilizzata per gli errori del form

//controllo che i campi obbligatori non siano vuoti
if(isset($_POST["email"], $_POST["nome"], $_POST["cognome"], $_POST["password"], $_POST["password2"])) {
$email=validaCampo($_POST["email"]);
$nome=validaCampo($_POST["nome"]);
$cognome=validaCampo($_POST["cognome"]);
$Password=validaCampo($_POST["password"]);
$Password2=validaCampo($_POST["password2"]);

  if(!$email || !$nome || !$cognome || !$Password || !$Password2){
    $_SESSION["Errore"]="Non hai inserito tutti i campi obbligatori";
    header("Location: Registrazione.php");
    exit;
  }
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){ // controllo che l'email sia nel formato giusto
    $_SESSION["Errore"]="Ricontrolla che l'email inserita sia nel formato corretto";
    header("Location: Registrazione.php");
    exit;
  }
  else if($_POST["password"]!=$_POST["password2"]){ // controllo che le due password comabacino
    $_SESSION["Errore"]="Le due password inserite non coincidono";
    header("Location: Registrazione.php");
    exit;
  }
  else if($dbConnection->user_already_exists($_POST["email"])){ // controllo che l'utente non sia già registrato con quell'email
    $_SESSION["Errore"]="La mail inserita appartiene ad un altro utente";
    header("Location: Registrazione.php");
    exit;
  }
  else if($dbConnection->insert_user($_POST["nome"],$_POST["cognome"],$_POST["email"],
                                $_POST["password"],$_POST["indirizzo"],$_POST["citta"],
                                $_POST["civico"],$_POST["CAP"]))
  { // provo ad inserire i dati nel db
    unset($_SESSION["Errore"]);
    $_SESSION["username"]=$_POST["email"];
    $_SESSION["login"]=true;
    header("Location: view-account.php");
    exit;
  }
  else {
    $_SESSION["Errore"]="L'inserimento non è andato a buon fine. Ti preghiamo di riprovare";
    header("Location: Registrazione.php");
    exit;
  }

}

$dbConnection->Close();
?>
