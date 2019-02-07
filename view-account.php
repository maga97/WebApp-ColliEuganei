<?php
require_once "DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION["username"])){
  header("Location: login.php");
  exit;
}

function validaCampo($campo) {
    return strlen($campo) > 0;
}

$db = new database();
$db->connect();
if(isset($_POST["conferma_modifica"])){
    $ErroreEmail=false;
    $ErroreNome=false;
    $ErroreCognome=false;
    $ErroreCampiVuoti=false;
    $ErroreForm=false;
    $ErroreUtenteEsistente=false;
    $Errorecambiamento=false;
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
     if(!$ErroreUtenteEsistente){
        if(!$ErroreNome && !$ErroreCognome && !$ErroreEmail && !$ErroreUtenteEsistente){ // se i campi non contengono errori
          if($db->update_user($_POST["nome"],$_POST["cognome"],$_POST["email"],$_POST["indirizzo"],$_POST["citta"],
                                        $_POST["civico"],$_POST["CAP"],$_SESSION['username']))
          { // provo ad aggiornare i dati nel db
            $_SESSION["username"]=$_POST["email"];
          }
          else {
            $Errorecambiamento=true;
          }
        }
     }
   }
   else{
     $ErroreForm=true;
     $ErroreCampiVuoti=true;
   }
}
else if(isset($_POST["modifica_password"])){
      $pwd=validaCampo($_POST["vecchia-password"]);
      $newpwd=validaCampo($_POST["password"]);
      $newpwd2=validaCampo($_POST["password2"]);
      $pwdempty=false;
      $pwderror=false;
      $pwdNotEquals=false;
      if($pwd && $newpwd && $newpwd2){
        if($db->user_login($_SESSION["username"],$_POST["vecchia-password"])){
          if($_POST["password"]==$_POST["password2"])
            $db->AggiornaPWDUtente($_SESSION["username"],$_POST["password"]);
          else
            $pwdNotEquals=true;
        }
        else
          $pwderror=true;
      }
      else{
        $pwdempty=true;
      }
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
 "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <title>Pannello Utente - Colli Digitali</title>
  </head>
  <body>
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
  				<li><a href="index.php" tabindex="1">Home</a></li>
  				<li class="dropdown"><a>Luoghi</a>
  					<ul class="dropdown-content button-right">
  						<li><a href="luoghi/chiesette.php">Sette Chiesette</a></li>
  						<li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
  						<li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
  						<li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
  						<li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
  						<li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
  					</ul>
  				</li>
  				<li><a href="gite.php" tabindex="2">Gite</a></li>
  				<?php if(isset($_SESSION['username'])): ?>
  					<li class="dropdown button-right"><a class="active">Account</a>
  						<ul class="dropdown-content">
  						<li><a href="logout.php">Logout</a></li>
  						<li><a href="view-account.php">Impostazioni</a></li>
  						<li><a>Le mie gite</a></li>
  						</ul>
  					</li>
  				<?php
        else:
          ?>
  					<li class="button-right"><a href="login.php" tabindex="3">Accedi</a></li>
  					<li class="button-right"><a href="Registrazione.php" tabindex="4">Registrati</a></li>
  				<?php
        endif;
          ?>
  				<li class="icon">
  					<a href="#" id="mobile">&#9776;</a>
  				</li>
  				</ul>
  			</div>
      <div id="content">
          <div class="form container_form">
              <div class="titolo-form">
                  <h1 id="titolo">Riepilogo dati <span lang="en">account</span></h1>
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
              <form id="dati-utente" method="POST">
                <?php if($errore!="") echo $errore; ?>
                <div class="log-field-container">
                        <label for="email" lang="en">Email: </label>
                        <div class="input-container">
                          <input type="text" class="disabilita"
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            id="email" name="email" value="<?php echo $_SESSION['username'];?>">
                            <?php else:?>

                             disabled="disabled" id="username" name="username" value="<?php echo $_SESSION['username'];?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="log-field-container">
                        <label for="nome" >Nome: </label>
                        <div class="input-container">
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            <input type="text" class="disabilita" id="nome" name="nome" value="<?php echo $db->GetName($_SESSION['username']);?>" >
                            <?php else:?>
                            <input type="text" class="disabilita" disabled="disabled" id="nome" name="nome" value="<?php echo $db->GetName($_SESSION['username']);?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="log-field-container">
                        <label for="cognome" >Cognome: </label>
                        <div class="input-container">
                          <input type="text" class="disabilita"
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            id="cognome" name="cognome" value="<?php echo $db->GetSurname($_SESSION['username']);?>" >
                            <?php else:?>

                             disabled="disabled" id="cognome" name="cognome" value="<?php echo $db->GetSurname($_SESSION['username']);?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="log-field-container">
                        <label for="indirizzo" >Indirizzo: </label>
                        <div class="input-container">
                          <input type="text" class="disabilita"
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            id="indirizzo" name="indirizzo" value="<?php echo $db->GetAddress($_SESSION['username']);?>" >
                            <?php else:?>

                             disabled="disabled" id="indirizzo" value="<?php echo $db->GetAddress($_SESSION['username']);?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="log-field-container" >
                        <label for="civico" >Civico: </label>
                        <div class="input-container">
                          <input type="text" class="disabilita"
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            id="civico" name="civico" value="<?php echo $db->GetCivico($_SESSION['username']);?>" >
                            <?php else:?>

                             disabled="disabled" id="civico" name="civico" value="<?php echo $db->GetCivico($_SESSION['username']);?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="log-field-container">
                        <label for="citta" >Citt&agrave;: </label>
                        <div class="input-container">
                          <input type="text" class="disabilita"
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            id="citta" name="citta" value="<?php echo $db->GetCity($_SESSION['username']);?>" >
                            <?php else:?>
                             disabled="disabled" id="citta" name="citta" value="<?php echo $db->GetCity($_SESSION['username']);?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="log-field-container">
                        <label for="CAP"><abbr title="Codice di avviamento postale">CAP</abbr>: </label>
                        <div class="input-container">
                          <input type="text" class="disabilita"
                          <?php if(isset($_POST["modifica_dati"])): ?>
                            id="CAP" name="CAP" value="<?php echo $db->GetCAP($_SESSION['username']);?>" >
                            <?php else:?>

                             disabled="disabled" id="CAP" name="CAP" value="<?php echo $db->GetCAP($_SESSION['username']);?>" >
                           <?php endif; ?>
                        </div>
                    </div>
                    <div class="button-holder" >
                        <?php
                        if(isset($_POST["modifica_dati"])):
                         ?>
                         <button type="submit" id="conferma_modifica" name="conferma_modifica" class="btn btn-primary">Conferma le modifiche</button>
                         <button id="annulla_modifica" name="conferma_modifica" class="btn btn-primary">Annulla le modifiche e torna indietro</button>
                        <?php
                        else:
                        ?>
                          <button id="bottone-modifica-password" name="modifica_dati" class="btn btn-primary">Modifica dati</button>
                      <?php endif;?>
                    </div>
              </form>
              <div class="titolo-form">
                        <h2>Modifica <span lang="en">password</span></h2>
                    </div>
                    <form id="mod-pwd-form" method="POST">
                        <div class="log-field-container">
                            <label for="vecchia-password" >Password corrente: (obbligatorio)</label>
                            <div class="input-container">
                                <input type="password" id="vecchia-password" name="vecchia-password" placeholder="Password corrente" class="disabilita">
                            </div>
                        </div>
                        <div class="log-field-container">
                            <label for="password" >Nuova <span lang="en">password</span>: (obbligatorio)</label>
                            <div class="input-container">
                                <input type="password" id="password" name="password" placeholder="Inserisci la nuova password" class="disabilita">
                            </div>
                        </div>
                        <div class="log-field-container">
                            <label for="password2">Ripeti nuova <span lang="en">password</span>: (obbligatorio)</label>
                            <div class="input-container">
                                <input type="password" id="password2" name="password2" placeholder="Ripeti la nuova password" class="disabilita">
                            </div>
                        </div>
                        <div class="button-holder" >
                            <button type="submit" id="bottone-modifica-password" name="modifica_password" class="btn btn-primary">Modifica <span lang="en">password</span></button>

                        </div>
                    </form>
                    <button id="elimina-account" class="btn btn-red">Elimina <span lang="en">account</span></button>
          </div>

      </div>
      <?php echo include_once("footer.php"); ?>
    </div>
  </body>
</html>
