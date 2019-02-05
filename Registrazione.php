<?php "DataBase/DBConnection.php";
if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
if(isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
$errore="";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <!-- <script src="js/registrazione.js"></script> -->
    <script src="js/global.js"></script>

    <title>Registrazione - Colli Digitali</title>
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
  					<li class="dropdown button-right"><a>Account</a>
  						<ul class="dropdown-content">
  						<li><a href="logout.php">Logout</a></li>
  						<li><a href="view-account.php">Impostazioni</a></li>
  						<li>Le mie gite</li>
  						</ul>
  					</li>

  				<?php else: ?>
  					<li class="button-right"><a href="login.php" tabindex="3">Accedi</a></li>
  					<li class="button-right"><a class="active"href="Registrazione.php" tabindex="4">Registrati</a></li>
  				<?php endif; ?>
  				<li class="icon">
  					<a href="#" id="mobile">&#9776;</a>
  				</li>
  				</ul>
  			</div>
        <div id="content" >
          <ul class="breadcrumb">
            <li><a href="Registrazione.php">Registrazione</a></li>
          </ul>
          <?php if(isset($_SESSION["ErroreForm"]) && $_SESSION["ErroreForm"]){
                  $errore="<div class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'><p class='intestazione-alert'>Errore:</p>";
                  if(isset($_SESSION["ErroreCampiVuoti"]) && $_SESSION["ErroreCampiVuoti"])
                    $errore.="<p>Alcuni campi obbligatori non sono stati inseriti</p>";
                  else{
                    if(isset($_SESSION["ErroreNome"]) && $_SESSION["ErroreNome"])
                      $errore.="<p>Ricontrollare il nome</p>";
                    if(isset($_SESSION["ErroreCognome"]) && $_SESSION["ErroreCognome"])
                      $errore.="<p>Ricontrollare il cognome</p>";
                    if(isset($_SESSION["ErroreEmail"]) && $_SESSION["ErroreEmail"])
                      $errore.="<p>Inserire un email valida</p>";
                    if(isset($_SESSION["ErrorePasswordDiverse"]) && $_SESSION["ErroreEmail"])
                      $errore.="<p>Le password non combaciano</p>";
                  }
                  $errore.="</div>";
                }
                else if(isset($_SESSION["ErroreInserimento"]) && $_SESSION["ErroreInserimento"])
                  $errore="
                  <div class='alertnojs errore' aria-live='assertive' role='alert' aria-atomic='true'>
                    <p class='intestazione-alert'>Abbiamo dei problemi interni.
                      Ti preghiamo di riprovare più avanti.
                    </p>
                  </div>";


          ?>
          <div class="form container_form" >
            <form action="RegistrazioneAction.php" method="POST" class="log-form" onsubmit="return validaFormUtente(true,$('.alert.errore'),$('form'))">

              <h1>Crea <span lang="en">account</span></h1>
              <?php if($errore!=""):
                      echo $errore;
                    else:
              ?>
              <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true"><p class="intestazione-alert">Errore:</p></div>
              <?php
                    endif;
              ?>
              <div id="sectionPersonalData">
                <div class="log-field-container">
                  <label for="nome">Nome: (obbligatorio)</label>
                  <input type="text" id="nome" name="nome" placeholder="Inserisci il tuo nome" accesskey="n" />
                </div>
                <div class="log-field-container">
                  <label for="cognome" class="log-label">Cognome: (obbligatorio)</label>
                  <input type="text" id="cognome" name="cognome" placeholder="Inserisci il tuo cognome" accesskey="c" />
                </div>
                <div class="log-field-container" id="indirizzo-container">
                  <label for="indirizzo" class="log-label">Indirizzo: </label>
                  <input type="text" id="indirizzo" name="indirizzo" placeholder="Inserisci il tuo indirizzo di residenza" accesskey="i" />
                </div>
                <div class="log-field-container" id="civico-container">
                  <label for="civico" class="log-label mobile-align">Civico: </label>
                  <input type="number" size="4" id="civico" name="civico" placeholder="N." accesskey="c" />
              </div>
                <div class="log-field-container" id="citta-container">
                  <label for="citta" class="log-label">Citt&agrave;: </label>
                  <input type="text" id="citta" name="citta" placeholder="Inserisci la tua città di residenza" accesskey="c" />
                </div>
                <div class="log-field-container" id="cap-container">
                  <label for="CAP" class="log-label mobile-align"> <abbr title="Codice di avviamento postale">CAP</abbr>: </label>
                  <input type="number" size="4" id="CAP" name="CAP" placeholder="CAP..." accesskey="c" />
                </div>
              </div>
              <div id="sectionAccountData">
                <div class="field-container">
                  <label for="email" lang="en" class="log-label">Email: (obbligatorio)</label>
                  <input type="text" id="email" name="email" placeholder="Inserisci email" accesskey="e" />
                </div>
                <div class="log-field-container">
                  <label for="password" class="log-label"><span lang="en">Password</span>: (obbligatorio)</label>
                  <input type="password" id="password" name="password" placeholder="Password..." accesskey="p" />
                </div>
                <div class="log-field-container">
                  <label for="password2" class="log-label">Ripeti <span lang="en">password</span>: (obbligatorio)</label>
                  <input type="password" id="password2" name="password2" placeholder="Ripeti password.." accesskey="p" />
                </div>
              </div>
              <div class="button-holder">  <input type="submit" value="Registrati" name="registrazione" class="btn btn-primary" /></div>
            </form>
          </div>

        </div>
        <?php include_once('footer.php')?>
    </div>
  </body>
</html>
<?php
$errore="";
unset($_SESSION["ErroreForm"]);
unset($_SESSION["ErroreInserimento"]);
 ?>
