<?php
require_once __DIR__.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR."DBConnection.php";
if(session_status() == PHP_SESSION_NONE) {
   session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
$IsDifferentpasswords=false;
$isInvalidEmail=false;
$alreadyExist=false;
$failedSignUp=false;
if(isset($_POST["Nome"]) && isset($_POST["Cognome"]) && isset($_POST["Email"])
          && isset($_POST["Password"]) && isset($_POST["RPassword"])&&
          isset($_POST["Indirizzo"]) && isset($_POST["Civico"]) && isset($_POST["CAP"])){
            if(!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
              $isInvalidEmail=true;
            }
            else if(($_POST["Password"])!=($_POST["RPassword"])){
              $IsDifferentpasswords=true;

            }
            else if($dbConnection->user_login($_POST["Email"],$_POST["Password"])){
              $alreadyExist=true;

            }
            else if($dbConnection->insert_user($_POST["Nome"],$_POST["Cognome"],$_POST["Email"],
                                              $_POST["Password"],$_POST["Indirizzo"],$_POST["Civico"],$_POST["CAP"])){
              $_SESSION["username"]=$_POST["Email"];
              $_SESSION["login"]=true;
              header("Location: view-account.php");
            }
            else
              $failedSignUp=true;

          }
$dbConnection->Close();
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.galleryframe').click(function() {
					window.location.href = $(this).find("a").attr("href");
				});
			});
		</script>
		<script src="script.js"></script>
		<title>Home - Colli Digitali</title>
	</head>
	<body>

		<?php  include_once('menu.php') ?>

    <?php
    if($alreadyExist)
      echo ("utente già esistente");
    else if($isInvalidEmail)
      echo ("Email non valida");
    else if($IsDifferentpasswords)
      echo ("Le due password non coincidono");
    else if($failedSignUp)
      echo ("La registrazione ha fallito");
     ?>


    <div class="content">
      <form name="auth" id="autenticazione" method="post" action="Registrazione.php">
        <fieldset>
          <legend>Autenticazione</legend>
          <div class="row">
            <label for="Nome">Nome</label>
            <input value="<?php echo isset($_POST['Nome']) ? $_POST['Nome'] : '' ?>" type="text" required="required" id="nome" name="Nome" placeholder="Mario"/>
          </div>
          <div class="row">
            <label for="Cognome">Cognome</label>
            <input value="<?php echo isset($_POST['Cognome']) ? $_POST['Cognome'] : '' ?>" type="text" required="required" id="cognome" name="Cognome" placeholder="Rossi"/>
          </div>
          <div class="row">
            <label for="email">Indirizzo email</label>
            <input value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : '' ?>" type="text" required="required" id="email" name="Email" placeholder="pincopallino@domain.it"/>
          </div>
          <div class="row">
            <label for="password">Password</label>
            <input type="password" required="required" id="password" name="Password"/>
          </div>
          <div class="row">
            <label for="RepeatPassword">Ripeti password</label>
            <input type="password" required="required" id="rpassword" name="RPassword" />
          </div>
          <div class="row">
            <label for="Indirizzo">Indirizzo</label>
            <input value="<?php echo isset($_POST['Indirizzo']) ? $_POST['Indirizzo'] : '' ?>" type="text" required="required" id="indirizzo" name="Indirizzo" />
          </div>
          <div class="row">
            <label for="Civico">Civico</label>
            <input value="<?php echo isset($_POST['Civico']) ? $_POST['Civico'] : '' ?>" type="text" required="required" id="Civico" name="Civico" />
          </div>
          <div class="row">
            <label for="CAP">CAP</label>
            <input value="<?php echo isset($_POST['CAP']) ? $_POST['CAP'] : '' ?>" type="text" required="required" id="cap" name="CAP" />
          </div>
          <input type="submit" name="submit" value="Registrati">
        </fieldset>
      </form>
    </div>

 </body>
 </html>
