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
//uso delle session per poter ripopolare i dati del form in Registrazione.php in caso qualcosa vada storto
$_SESSION["ErroreEmail"]=false;
$_SESSION["ErroreNome"]=false;
$_SESSION["ErroreCognome"]=false;
$_SESSION["ErrorePassword"]=false;
$_SESSION["ErrorePassword2"]=false;
$_SESSION["ErrorePasswordDiverse"]=false;
$_SESSION["ErroreCampiVuoti"]=false;
$_SESSION["ErroreForm"]=false;
$_SESSION["ErroreUtenteEsistente"]=false;
$_SESSION["ErroreInserimento"]=false;

//controllo che i campi obbligatori non siano vuoti
$Email=validaCampo($_POST["email"]);
$Nome=validaCampo($_POST["nome"]);
$Cognome=validaCampo($_POST["cognome"]);
$Password=validaCampo($_POST["password"]);
$Password2=validaCampo($_POST["password2"]);

if($Email && $Nome && $Cognome && $Password && $Password2){
  if(strlen(filter_var($_POST["nome"], FILTER_SANITIZE_NUMBER_INT))>0) // controllo che il nome non contenga numeri
    $_SESSION["ErroreNome"]=true;
  if(strlen(filter_var($_POST["cognome"], FILTER_SANITIZE_NUMBER_INT))>0) // controllo che il cognome non contenga numeri
    $_SESSION["ErroreCognome"]=true;
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) // controllo che l'email sia nel formato giusto
    $_SESSION["ErroreEmail"]=true;
  if($_POST["password"]!=$_POST["password2"]) // controllo che le due password comabacino
    $_SESSION["ErrorePasswordDiverse"]=true;
  if($dbConnection->user_already_exists($_POST["email"])) // controllo che l'utente non sia già registrato con quell'email
    $_SESSION["ErroreUtenteEsistente"]=true;
  if(!$_SESSION["ErroreUtenteEsistente"]){
    if(!$_SESSION["ErroreNome"] && !$_SESSION["ErroreCognome"] &&
       !$_SESSION["ErroreEmail"] && !$_SESSION["ErrorePasswordDiverse"]){ // se i campi non contengono errori
            if($dbConnection->insert_user($_POST["nome"],$_POST["cognome"],$_POST["email"],
                                          $_POST["password"],$_POST["indirizzo"],$_POST["citta"],
                                          $_POST["civico"],$_POST["CAP"]))
            { // provo ad inserire i dati nel db
              session_destroy(); // per cancellare tutte le variabili per gli errori del form di regitrazione
              session_start();   // faccio ripartire la sessione per far loggare l'utente
              $_SESSION["username"]=$_POST["email"];
              $_SESSION["login"]=true;
              header("Location: view-account.php");
            }
            else {
              $_SESSION["ErroreInserimento"]=true;
              header("Location: Registrazione.php");
              exit;
            }
    }
    else {
      $_SESSION["ErroreForm"]=true;
      header("Location: Registrazione.php");
      exit;
    }
  }
  else {
    header("Location: Registrazione.php");
  }
}
else{
  $_SESSION["ErroreForm"]=true;
  $_SESSION["ErroreCampiVuoti"]=true;
  header("Location: Registrazione.php");
}

$dbConnection->Close();
?>
