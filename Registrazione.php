
<?php
"DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$errore = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <!-- <script src="js/registrazione.js"></script> -->
    <script type="text/javascript" src="js/global.js"></script>
    <title>Registrazione - Colli Digitali</title>
  </head>
  <body>
    <a href="#content" class="skip">Vai al contenuto</a>
    <div id="container">
      <div class="header">
        <div class="header-picture">
          <div class="header-title">
            <h1>Colli Euganei</h1>
            <h2>Natura e storia in digitale</h2>
          </div>
        </div>
      </div>
      <div id="menuprincipale-bar" role="menubar">
              <ul id="menuprincipale">
                  <li><a href="index.php" tabindex="0">Home</a></li>
                  <li class="dropdown" ><a aria-haspopup="true" aria-expanded="false" tabindex="0">Luoghi</a>
                      <ul class="dropdown-content button-right" role="menu">
                          <li role="none"><a href="luoghi/chiesette.php" tabindex="0" role="menuitem">Sette Chiesette</a></li>
                          <li role="none"><a href="luoghi/catajo.php" tabindex="0" role="menuitem">Castello del Catajo</a></li>
                          <li role="none"><a href="luoghi/praglia.php" tabindex="0" role="menuitem">Abbazia di Praglia</a></li>
                          <li role="none"><a href="luoghi/carrareseeste.php" tabindex="0" role="menuitem">Castello carrarese di Este</a></li>
                          <li role="none"><a href="luoghi/lispida.php" tabindex="0" role="menuitem">Castello di Lispida</a></li>
                          <li role="none"><a href="luoghi/pelagio.php" tabindex="0" role="menuitem">Castello San Pelagio</a></li>
                      </ul>
                  </li>
                  <li><a href="gite.php" tabindex="0">Gite</a></li>
                  <?php
                  if (isset($_SESSION['username'])):
                  ?>
                     <li class="dropdown button-right"><a aria-haspopup="true" aria-expanded="false" tabindex="0">Account</a>
                          <ul class="dropdown-content" role="menu">
	                          <li><a href="view-account.php" tabindex="0" role="menuitem">Impostazioni</a></li>
	                          <li><a href="view-my-trip.php" tabindex="0" role="menuitem">Le mie gite</a></li>
                            <li><a href="logout.php" tabindex="0" role="menuitem">Logout</a></li>
                          </ul>
                      </li>

                  <?php
                  else:
                  ?>
                     <li class="button-right"><a href="login.php" tabindex="0">Accedi</a></li>
                     <li class="button-right"><a class="active" href="Registrazione.php" tabindex="0">Registrati</a></li>
                  <?php
                  endif;
                  ?>
                 <li class="icon">
                      <a href="#" id="mobile">&#9776;</a>
                  </li>
              </ul>
      </div>
        <div id="content" >
          <ul class="breadcrumb">
            <li><a href="Registrazione.php">Registrazione</a></li>
          </ul>
          <?php
          if (isset($_SESSION["ErroreUtenteEsistente"]))
              $errore = "<div id='errore-form' class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'>
                            <p class='intestazione-alert'>
                              l'email che stai provando ad inserire appartiene ad un'altro utente
                            </p>
                          </div>";
          else if (isset($_SESSION["ErroreForm"]) && $_SESSION["ErroreForm"]) {
              $errore = "<div id='errore-form'class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'><p class='intestazione-alert'>Errore:</p>";
              if (isset($_SESSION["ErroreCampiVuoti"]) && $_SESSION["ErroreCampiVuoti"])
                  $errore .= "<p>Alcuni campi obbligatori non sono stati inseriti</p>";
              else {
                  if (isset($_SESSION["ErroreNome"]) && $_SESSION["ErroreNome"])
                      $errore .= "<p>Ricontrollare il nome</p>";
                  if (isset($_SESSION["ErroreCognome"]) && $_SESSION["ErroreCognome"])
                      $errore .= "<p>Ricontrollare il cognome</p>";
                  if (isset($_SESSION["ErroreEmail"]) && $_SESSION["ErroreEmail"])
                      $errore .= "<p>Inserire un email valida</p>";
                  if (isset($_SESSION["ErrorePasswordDiverse"]) && $_SESSION["ErroreEmail"])
                      $errore .= "<p>Le password non combaciano</p>";
              }
              $errore .= "</div>";
          } else if (isset($_SESSION["ErroreInserimento"]) && $_SESSION["ErroreInserimento"])
              $errore = "<div id='errore-form' class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'>
                              <p class='intestazione-alert'>Abbiamo dei problemi interni.
                                Ti preghiamo di riprovare più avanti
                              </p>
                        </div>";
         ?>
         <div class="form container_form" >
            <form action="RegistrazioneAction.php" method="post" class="log-form" onsubmit="return validaFormUtente(true,$('.alert.errore'),$('form'))">

             <h1>Crea <span xml:lang="en">account</span></h1>
             <?php
             if ($errore != ""):
               echo $errore;
             endif;
             ?>
             <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true" aria-relevant="all"><p class="intestazione-alert">Errore:</p></div>
              <div id="sectionPersonalData" role="registration">
                <div class="log-field-container">
                  <label for="nome" class="log-label">Nome: (obbligatorio)</label>
                  <input type="text" id="nome" name="nome" accesskey="n" aria-required="true" aria-label="nome"/>
                </div>
                <div class="log-field-container">
                  <label for="cognome" class="log-label">Cognome: (obbligatorio)</label>
                  <input type="text" id="cognome" name="cognome" accesskey="c" aria-required="true" aria-label="cognome"/>
                </div>
                <div class="log-field-container" id="indirizzo-container">
                  <label for="indirizzo" class="log-label">Indirizzo: </label>
                  <input type="text" id="indirizzo" name="indirizzo" accesskey="i" aria-required="false" aria-label="indirizzo"/>
                </div>
                <div class="log-field-container" id="civico-container">
                  <label for="civico" class="log-label mobile-align">Civico: </label>
                  <input type="text" size="4" id="civico" name="civico" accesskey="c" aria-required="false" aria-label="civico"/>
              </div>
                <div class="log-field-container" id="citta-container">
                  <label for="citta" class="log-label">Citt&agrave;: </label>
                  <input type="text" id="citta" name="citta" accesskey="c" aria-required="false" aria-label="citt&agrave;"/>
                </div>
                <div class="log-field-container" id="cap-container">
                  <label for="CAP" class="log-label mobile-align"> <abbr title="Codice di avviamento postale">CAP</abbr>: </label>
                  <input type="text" size="4" id="CAP" name="CAP" accesskey="c" aria-required="false" aria-label="codive avviamento postale"/>
                </div>
              </div>
              <div id="sectionAccountData">
                <div class="field-container">
                  <label for="email" xml:lang="en" class="log-label">Email: (obbligatorio)</label>
                  <input type="text" id="email" name="email" accesskey="e" aria-required="true" aria-label="email"/>
                </div>
                <div class="log-field-container">
                  <label for="password" class="log-label"><span xml:lang="en">Password</span>: (obbligatorio)</label>
                  <input type="password" id="password" name="password" accesskey="p" aria-required="true" aria-label="password"/>
                </div>
                <div class="log-field-container">
                  <label for="password2" class="log-label">Ripeti <span xml:lang="en">password</span>: (obbligatorio)</label>
                  <input type="password" id="password2" name="password2" accesskey="p" aria-required="true" aria-label="ripeti password"/>
                </div>
              </div>
              <div class="button-holder">
              	<input type="submit" value="Registrati" name="registrazione" class="btn btn-primary" aria-label="Bottone per confermare i dati inseriti e completare la registrazione."/>
              </div>
            </form>
          </div>
        </div>
        <?php
        include_once('footer.php');
        ?>
   </div>
  </body>
</html>
<?php
$errore = "";
session_destroy();
?>
