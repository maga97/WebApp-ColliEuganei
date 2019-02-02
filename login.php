<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");

if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
$wronglogin = false;
$wrongloginmessage = "<span id=\"error\">Dati errati!</span>";

if(isset($_POST['email']) && isset($_POST['password']))
	if($dbConnection->user_login( $_POST['email'], $_POST['password'])) {
		$_SESSION['login'] = true;
		$_SESSION['username'] = $_POST['email'];
    header("Location: gite.php");
  }
  else{
    $wronglogin = true;
  }
  $dbConnection->Close();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../script.js"></script>
    <title>Login - Colli Digitali</title>
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
          <li class="dropdown" ><a>Luoghi</a></li>
            <ul class="dropdown-content">
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
            <li><a href="view-account.php">Account</a></li>
          <?php else: ?>
            <li><a href="login.php" class="active" tabindex="3">Accedi</a></li>
            <li><a href="Registrazione.php" tabindex="4">Registrati</a></li>
          <?php endif; ?>
          <li class="icon">
            <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
          </li>
        </ul>
        </div>
        <div id="content">
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>Login</li>
          </ul>
          <div class="form">
            <form method="POST" action="login.php" class="log-form">
              <?php
                if($wronglogin):
                  echo '
                  <div class="alert errore login" aria-live="assertive" role="alert" aria-atomic="true">Si è verificato un errore:
                  <span lang="en">username</span> o <span lang="en">password</span> non corretti</div>';
                endif;
              ?>
              <h1>Accedi</h1>
              <div class="log-field-container">
                  <label for="username" class="log-label">Email: </label>
                  <input type="text" id="username" name="email" placeholder="Nome utente.." accesskey="n">
              </div>
              <div class="log-field-container">
                  <label for="password" lang="en" class="log-label">Password: </label>
                  <input type="password" id="password" name="password" placeholder="Password.." accesskey="p">
              </div>
              <div class="button-holder"><input type="submit" value="Login" class="btn btn-primary"></div>
              <p id="not-registered">Non sei ancora registrato? <a href="../Registrazione.php" id="reg-sistema">Registrati</a></p>
            </form>
          </div>
      </div>
      <?php include_once('../footer.php')?>
    </div>
  </body>
</html>
