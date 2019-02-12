<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION["username"])){
  header("Location: ../login.php");
  exit;
}
function validaCampo($campo) {
    return strlen($campo) > 0;
}
$db = new database();
$db->connect();
$ErroreEmail=false;
$ErroreNome=false;
$ErroreCognome=false;
$ErroreCampiVuoti=false;
$ErroreForm=false;
$ErroreUtenteEsistente=false;
$Errorecambiamento=false;
$pwdempty=false;
$pwderror=false;
$pwdNotEquals=false;
if(isset($_POST["conferma_modifica"])) {
    $Email=validaCampo($_POST["email"]);
    $Nome=validaCampo($_POST["nome"]);
    $Cognome=validaCampo($_POST["cognome"]);
    if($Email && $Nome && $Cognome ){
       if(strlen(filter_var($_POST["nome"], FILTER_SANITIZE_NUMBER_INT))>0) // controllo che il nome non contenga numeri
          $ErroreNome=true;
       if(strlen(filter_var($_POST["cognome"], FILTER_SANITIZE_NUMBER_INT))>0) // controllo che il cognome non contenga numeri
          $ErroreCognome=true;
       if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) // controllo che l'email sia nel formato giusto
          $ErroreEmail=true;
       if($_POST["email"]!=$_SESSION["username"] && $db->user_already_exists($_POST["email"])) // controllo che l'utente non sia già registrato con quell'email
          $ErroreUtenteEsistente=true;
       if(!$ErroreUtenteEsistente) { // se l'utente è gia registrato => errore
            if(!$ErroreNome && !$ErroreCognome && !$ErroreEmail && !$ErroreUtenteEsistente) {// se i campi obbligatori non contengono errori
                 if($db->update_user($_POST["nome"],$_POST["cognome"],$_POST["email"],$_POST["indirizzo"],$_POST["citta"],
                                     $_POST["civico"],$_POST["CAP"],$_SESSION['username']))// provo ad aggiornare i dati nel db
                   $_SESSION["username"]=$_POST["email"];
                 else
                   $Errorecambiamento=true;
            }
       }
   }
   else{
     $ErroreForm=true;
     $ErroreCampiVuoti=true;
   }
}
else if(isset($_POST["modifica_password"])) {
      $pwd=validaCampo($_POST["vecchia-password"]);
      $newpwd=validaCampo($_POST["password"]);
      $newpwd2=validaCampo($_POST["password2"]);
      if($pwd && $newpwd && $newpwd2) {
          if($db->user_login($_SESSION["username"],$_POST["vecchia-password"])) {
              if($_POST["password"]==$_POST["password2"])
                $db->AggiornaPWDUtente($_SESSION["username"],$_POST["password"]);
              else
                $pwdNotEquals=true;
          }
          else
              $pwderror=true;
      }
      else
        $pwdempty=true;
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
 "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile.css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Pannello Utente - Colli Digitali</title>
  </head>
  <body>
    <div>
      <a href="#content" class="skip">Vai al contenuto</a>
    </div>
    <div id="container">
      <div class="header">
        <div class="header-picture">
          <div class="header-title">
            <h1>Colli Euganei</h1>
            <h2>Natura e storia in digitale</h2>
          </div>
        </div>
      </div>
      	<div id="menuprincipale-bar">
			<ul id="menuprincipale">
				<li><a href="index.php"tabindex="0">Home</a></li>
				<li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione gite</a>
                  	<ul class="dropdown-content" role="menu">
                      <li><a href="add-trip.php" tabindex="0" role="menuitem">Aggiungi nuova gita</a></li>
                      <li><a href="select-trip-modify.php" tabindex="0" role="menuitem">Modifica dati gita</a></li>
                      <li><a href="remove-trip.php" tabindex="0" role="menuitem">Rimuovi gita</a></li>
                  	</ul>
                </li>
                <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione utente</a>
                  	<ul class="dropdown-content" role="menu">
                      <li><a href="add-admin.php" tabindex="0" role="menuitem">Aggiungi admin</a></li>
                      <li><a href="remove-admin.php" tabindex="0" role="menuitem">Rimuovi admin</a></li>
                  	</ul>
                </li>
				<?php if(isset($_SESSION['username'])): ?>
					<li class="dropdown button-right"><a aria-haspopup="true"  class="active"  tabindex="0">Account</a>
	                  	<ul class="dropdown-content" role="menu">
	                      <li><a href="view-account-admin.php"  class="active" tabindex="0" role="menuitem">Impostazioni</a></li>
	                      <li><a href="../logout.php" tabindex="0" role="menuitem">Logout</a></li>
	                  	</ul>
                    </li>
				<?php else: ?>
					<li><a href="../login.php" tabindex="0">Accedi</a></li>
					<li><a href="../Registrazione.php" tabindex="0">Registrati</a></li>
				<?php endif; ?>
				<li class="icon">
					<a href="#" id="mobile">&#9776;</a>
				</li>
				</ul>
		</div>
      	<div id="content">
      		<ul class="breadcrumb">
				<li>Impostazioni account</li>
			</ul>
          <div class="form container_form">
              <div class="titolo-form">
                  <h1 id="titolo">Riepilogo dati <span xml:lang="en">account</span></h1>
              </div>
              <?php
                    $errore="";
                    if(isset($_POST["conferma_modifica"])){
                      if($ErroreUtenteEsistente){
                        $errore="<div class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'>
                                    <p class='intestazione-alert'>La mail che stai provando ad inserire appartiene ad un'altro utente</p>
                                </div>";
                      }
                      else if($ErroreCampiVuoti){
                        $errore="<div class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'>
                                    <p class='intestazione-alert'>hai lasciato dei campi obbligatori vuoti</p>
                                </div>";
                      }
                    }
                    if(isset($_POST["modifica_password"])){
                      if($pwderror || $pwdempty || $pwdNotEquals){
                        $errore="<div class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'><p class='intestazione-alert'>Errore:</p>";
                        if($pwdempty){
                          $errore.="<p> Non hai compilato tutti i campi necessari alla modifica della password</p>";
                        }
                        else if($pwderror){
                          $errore.="<p> La password corrente inserita è sbagliata</p>";
                        }
                        else if($pwdNotEquals){
                          $errore.="<p> Le due password non combaciano</p>";
                        }
                        $errore.="</div>";
                      }
                    }

              ?>
              <form id="dati-utente" method="post" action="view-account-admin.php">
                <?php
                      if($errore=="" && isset($_POST["conferma_modifica"])){
                        echo "<div class='alertnojs success' aria-live='assertive' role='alert' aria-atomic='true'>
                                <p>Dati modificati con successo</p>
                              </div>";
                      }
                      if($errore!="")
                        echo $errore;

                ?>
                <div class="log-field-container">
                        <label for="email" xml:lang="en">Email: </label>
                        <div class="input-container">
                          <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                            <input type="text" class="disabilita" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email']: $_SESSION['username'];?>" />
                            <?php else:?>
                             <input type="text" class="disabilita" disabled="disabled" id="email" name="email" value="<?php echo $_SESSION['username'];?>" />
                           <?php endif; ?>
                        </div>
                </div>
                <div class="log-field-container">
                    <label for="nome" >Nome: </label>
                    <div class="input-container">
                      <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                        <input type="text" class="disabilita" id="nome" name="nome" value="<?php echo $db->GetName($_SESSION['username']);?>" />
                        <?php else:?>
                        <input type="text" class="disabilita" disabled="disabled" id="nome" name="nome" value="<?php echo $db->GetName($_SESSION['username']);?>" />
                       <?php endif; ?>
                    </div>
                </div>
                <div class="log-field-container">
                    <label for="cognome" >Cognome: </label>
                    <div class="input-container">

                      <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                      <input type="text" class="disabilita" id="cognome" name="cognome" value="<?php echo isset($_POST["cognome"]) ? $_POST["cognome"] :$db->GetSurname($_SESSION['username']);?>"/>
                        <?php else:?>
                         <input type="text" class="disabilita" disabled="disabled" id="cognome" name="cognome" value="<?php echo $db->GetSurname($_SESSION['username']);?>" />
                       <?php endif; ?>
                    </div>
                </div>
                <div class="log-field-container">
                    <label for="indirizzo" >Indirizzo: </label>
                    <div class="input-container">
                      <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                        <input type="text" class="disabilita" id="indirizzo" name="indirizzo" value="<?php echo isset($_POST["indirizzo"]) ? $_POST["indirizzo"] :$db->GetAddress($_SESSION['username']);?>" />
                        <?php else:?>
                         <input type="text" class="disabilita" disabled="disabled" id="indirizzo" value="<?php echo $db->GetAddress($_SESSION['username']);?>" />
                       <?php endif; ?>
                    </div>
                </div>
                <div class="log-field-container" >
                    <label for="civico" >Civico: </label>
                    <div class="input-container">
                      <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                        <input type="text" class="disabilita" id="civico" name="civico" value="<?php echo isset($_POST["civico"]) ? $_POST["civico"] :$db->GetCivico($_SESSION['username']);?>" />
                      <?php else:?>
                        <input type="text" class="disabilita" disabled="disabled" id="civico" name="civico" value="<?php echo $db->GetCivico($_SESSION['username']);?>" />
                      <?php endif; ?>
                    </div>
                </div>
                <div class="log-field-container">
                    <label for="citta" >Citt&agrave;: </label>
                    <div class="input-container">
                      <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                        <input type="text" class="disabilita" id="citta" name="citta" value="<?php echo isset($_POST["citta"]) ? $_POST["citta"] :$db->GetCity($_SESSION['username']);?>" />
                      <?php else:?>
                        <input type="text" class="disabilita" disabled="disabled" id="citta" name="citta" value="<?php echo $db->GetCity($_SESSION['username']);?>" />
                      <?php endif; ?>
                    </div>
                </div>
                <div class="log-field-container">
                    <label for="CAP"><abbr title="Codice di avviamento postale">CAP</abbr>: </label>
                    <div class="input-container">
                      <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente ): ?>
                        <input type="text" class="disabilita" id="CAP" name="CAP" value="<?php echo isset($_POST["CAP"]) ? $_POST["CAP"] :$db->GetCAP($_SESSION['username']);?>" />
                      <?php else:?>
                        <input type="text" class="disabilita" disabled="disabled" id="CAP" name="CAP" value="<?php echo $db->GetCAP($_SESSION['username']);?>" />
                      <?php endif; ?>
                    </div>
                </div>
                <div class="button-holder" >
                    <?php if(isset($_POST["modifica_dati"]) || $ErroreForm || $ErroreUtenteEsistente): ?>
                      <button type="submit" id="conferma_modifica" name="conferma_modifica" class="btn btn-primary">Conferma le modifiche</button>
                      <button id="annulla_modifica" name="annulla_modifica" class="btn btn-primary">Annulla le modifiche e torna indietro</button>
                    <?php else:?>
                      <button id="bottone-modifica-dati" name="modifica_dati" class="btn btn-primary">Modifica dati</button>
                    <?php endif;?>
                </div>
              </form>
              <div class="titolo-form">
                        <h2>Modifica <span xml:lang="en">password</span></h2>
                    </div>
                    <form id="mod-pwd-form" method="post" action="view-account-admin.php">
                        <div class="log-field-container">
                            <label for="vecchia-password" >Password corrente: (obbligatorio)</label>
                            <div class="input-container">
                                <input type="password" id="vecchia-password" name="vecchia-password" class="disabilita"/>
                            </div>
                        </div>
                        <div class="log-field-container">
                            <label for="password" >Nuova <span xml:lang="en">password</span>: (obbligatorio)</label>
                            <div class="input-container">
                                <input type="password" id="password" name="password" class="disabilita"/>
                            </div>
                        </div>
                        <div class="log-field-container">
                            <label for="password2">Ripeti nuova <span xml:lang="en">password</span>: (obbligatorio)</label>
                            <div class="input-container">
                                <input type="password" id="password2" name="password2" class="disabilita"/>
                            </div>
                        </div>
                        <div class="button-holder" >
                            <button type="submit" id="bottone-modifica-password" name="modifica_password" class="btn btn-primary">Modifica <span xml:lang="en">password</span></button>

                        </div>
                    </form>
          </div>
      </div>
      <?php echo include_once("../footer.php"); ?>
    </div>
  </body>
</html>
