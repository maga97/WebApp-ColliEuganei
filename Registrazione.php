<?php require_once __DIR__.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR."DBConnection.php";
if(session_status() == PHP_SESSION_NONE) {
 session_start();
} ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <!-- <script src="js/registrazione.js"></script> -->
    <script src="js/global.js"></script>
    <title>Home - Colli Digitali</title>
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
          <li class="dropdown"><a href="index.php">Home</a></li>
          <li class="dropdown"><a>Luoghi</a>
            <ul class="dropdown-content">
              <li><a href="pages/luoghi/chiesette.php">7 Chiesette</a></li>
              <li><a href="pages/luoghi/catajo.php">Castello del Catajo</a></li>
              <li><a href="pages/luoghi/praglia.php">Abbazia di Praglia</a></li>
              <li><a href="pages/luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
              <li><a href="pages/luoghi/lispida.php">Castello di Lispida</a></li>
              <li><a href="pages/luoghi/pelagio.php">Castello San Pelagio</a></li>
            </ul>
          </li>
          <li><a href="pages/gite.php">Gite</a></li>
          <?php if(isset($_SESSION['username'])): ?>
            <li><a href="pages/view-account.php">Account</a></li>
            <?php else: ?>
              <li><a href="pages/login.php">Accedi</a></li>
              <li><a href="Registrazione.php" class="active">Registrati</a></li>
            <?php endif; ?>
            <li class="icon">
              <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
            </li>
          </ul>
        </div>
        <div id="content" >
          <ul class="breadcrumb">
            <li><a href="Registrazione.php">Registrazione</a></li>
          </ul>
          <div class="form container_form" >
            <form action="RegistrazioneAction.php" method="POST" class="log-form" onsubmit="return validaFormUtente(true,$('.alert.errore'),$('form'))">
              <!-- <div class="alert successo" aria-live="assertive" role="alert" aria-atomic="true">Registrazione effettuata con successo. Clicca <a href="login.php">qua</a> per andare al <span lang="en">login</span>.</div>
              -->
              <h1>Crea <span lang="en">account</span></h1>
              <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true"><p class="intestazione-alert">Errore:</p></div>
              <div id="sectionPersonalData">
                <div class="log-field-container">
                  <label for="nome">Nome: (obbligatorio)</label>
                  <input type="text" id="nome" name="nome" placeholder="Inserisci il tuo nome">
                </div>
                <div class="log-field-container">
                  <label for="cognome" class="log-label">Cognome: (obbligatorio)</label>
                  <input type="text" id="cognome" name="cognome" placeholder="Inserisci il tuo cognome">
                </div>
                <div class="log-field-container" id="indirizzo-container">
                  <label for="indirizzo" class="log-label">Indirizzo: </label>
                  <input type="text" id="indirizzo" name="indirizzo" placeholder="Inserisci il tuo indirizzo di residenza">
                </div>
                <div class="log-field-container" id="civico-container">
                  <label for="civico" class="log-label mobile-align">Civico: </label>
                  <input type="number"  size="4" id="civico" name="civico" placeholder="N.">
              </div>
                <div class="log-field-container" id="citta-container">
                  <label for="citta" class="log-label">Citt&agrave;: </label>
                  <input type="text" id="citta" name="citta" placeholder="Inserisci la tua città di residenza">
                </div>
                <div class="log-field-container" id="cap-container">
                  <label for="CAP" class="log-label mobile-align"> <abbr title="Codice di avviamento postale">CAP</abbr>: </label>
                  <input type="number" size="4" id="CAP" name="CAP" placeholder="CAP...">
                </div>
              </div>
              <div id="sectionAccountData">
                <div class="field-container">
                  <label for="email" lang="en" class="log-label">Email: (obbligatorio)</label>
                  <input type="text" id="email" name="email" placeholder="Inserisci email">
                </div>
                <div class="log-field-container">
                  <label for="password" class="log-label"><span lang="en">Password</span>: (obbligatorio)</label>
                  <input type="password" id="password" name="password" placeholder="Password...">
                </div>
                <div class="log-field-container">
                  <label for="password2" class="log-label">Ripeti <span lang="en">password</span>: (obbligatorio)</label>
                  <input type="password" id="password2" name="password2" placeholder="Ripeti password..">
                </div>
              </div>
              <div class="button-holder">  <input type="submit" value="Registrati" name="registrazione" class="btn btn-primary"></div>
            </form>
          </div>
        </div>
        <?php include_once('footer.php')?>
    </div>
  </body>
</html>
