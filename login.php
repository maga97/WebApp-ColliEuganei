<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");

if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
if(isset($_SESSION["username"])){ //se apro la pagina del login ma ho già effettuato l'accesso mi porta al pannello utente
  if($_SESSION["admin"] == true)
  header("Location: admin/index.php");
  else
  header("Location: view-account.php");
  exit;
}
if(!isset($_SESSION['current_page']))// per fare in modo di tornare alla pagina da cui ho schiacciato Login
  $_SESSION['current_page'] = $_SERVER['HTTP_REFERER'];

$dbConnection = new database();
$dbConnection->Connect();
$wronglogin = false;

if(isset($_POST['email']) && isset($_POST['password']))
	if($dbConnection->user_login( $_POST['email'], $_POST['password'])) {
		$_SESSION['login'] = true;
		$_SESSION['username'] = $_POST['email'];
    $_SESSION['admin'] = $dbConnection->isAmministratore($_POST['email']);
    if($_SESSION['admin'] == true)
      header("Location: admin/index.php");
    else
      header("Location:".$_SESSION['current_page']);
    unset_session($_SESSION['current_page']);
    exit;
  }
  else{
    $wronglogin = true;
  }
  $dbConnection->Close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
  "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <title>Login - Colli Digitali</title>
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
		    <div id="menuprincipale-bar" role="menubar">
              <ul id="menuprincipale">
                  <li><a href="index.php" tabindex="0">Home</a></li>
                  <li class="dropdown" ><a tabindex="0" aria-haspopup="true">Luoghi</a>
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
                     <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                          <ul class="dropdown-content" role="menu">
	                          <li><a href="view-account.php" tabindex="0" role="menuitem">Impostazioni</a></li>
	                          <li><a href="view-my-trip.php" tabindex="0" role="menuitem">Le mie gite</a></li>
                            <li><a href="logout.php" tabindex="0" role="menuitem">Logout</a></li>
                          </ul>
                      </li>

                  <?php
                  else:
                  ?>
                     <li class="button-right"><a href="login.php" class="active" tabindex="0">Accedi</a></li>
                     <li class="button-right"><a href="Registrazione.php" tabindex="0">Registrati</a></li>
                  <?php
                  endif;
                  ?>
                 <li class="icon">
                      <a href="#" id="mobile">&#9776;</a>
                  </li>
              </ul>
      		</div>
        <div id="content">
          <ul class="breadcrumb">
            <li>Login</li>
          </ul>
          <div class="form">
            <form method="post" action="login.php" class="log-form">
              <?php
                if($wronglogin):
                  echo '
                  <div class="alert errore login" aria-live="assertive" role="alert" aria-atomic="true">Si è verificato un errore:
                  <span xml:lang="en">email</span> o <span xml:lang="en">password</span> non corretti</div>';
                endif;
              ?>
              <h1>Accedi</h1>
              <div class="log-field-container">
                  <label for="username" class="log-label">Email: </label>
                  <input type="text" aria-labelledby="username" id="username" name="email" accesskey="n" aria-required="true" />
              </div>
              <div class="log-field-container">
                  <label for="password" xml:lang="en" class="log-label">Password: </label>
                  <input type="password" aria-labelledby="password" id="password" name="password" accesskey="p" />
              </div>
              <div class="button-holder"><input type="submit" value="Login" class="btn btn-primary" /></div>
              <p id="not-registered">Non sei ancora registrato? <a href="../Registrazione.php" id="reg-sistema">Registrati</a></p>
            </form>
          </div>
      </div>
      <?php include_once('footer.php')?>
    </div>
  </body>
</html>
