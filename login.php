<?php require_once __DIR__.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR."DBConnection.php";

if(session_status() == PHP_SESSION_NONE) {
 session_start();
}
$dbConnection = new database();
$dbConnection->Connect();
//$dbConnection->insert_user('giulio', 'p', 'ciaociao', 'c', 'a', '3', '3');
$wronglogin = false;
$wrongloginmessage = '<div>Dati errati!</div>';

if(isset($_POST['email']) && isset($_POST['password']))
	if($dbConnection->user_login( $_POST['email'], $_POST['password'])) {
		$_SESSION['login'] = true;
		$_SESSION['username'] = $_POST['email'];
    header("Location: view-account.php");
  }
  else{
    $wronglogin = true;
  }
  $dbConnection->Close();
  ?>
  <?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"; ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>Login - Colli Digitali</title>
  </head>
  <body>
    <div class="header">
      <div class="header-picture">
        <div class="header-title">
          <h1>Colli Euganei</h1>
          <h2>Natura e storia in digitale</h2>
        </div>
      </div>
    </div>
    <div class="topnav-bar">
      <ul class="topnav">
        <li class="dropdown"><a href="index.php">Home</a>
          <ul class="dropdown-content">
            <li><a href="geografia.php">Geografia</a></li>
            <li><a href="clima.php">Clima</a></li>
            <li><a href="storia.php">Storia</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="luoghi.php">Luoghi</a>
          <ul class="dropdown-content">
            <li><a href="luoghi/chiesette.php">7 Chiesette</a></li>
            <li><a href="luoghi/catajo.php">Castello del Catajo</a></li>
            <li><a href="luoghi/praglia.php">Abbazia di Praglia</a></li>
            <li><a href="luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
            <li><a href="luoghi/lispida.php">Castello di Lispida</a></li>
            <li><a href="luoghi/pelagio.php">Castello San Pelagio</a></li>
          </ul>
        </li>
        <li><a href="gite.php">Gite</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="view-account.php">Account</a></li>
          <?php else: ?>
            <li><a href="login.php" class="active">Accedi</a></li>
            <li><a href="Registrazione.php">Registrati</a></li>
          <?php endif; ?>
          <li class="icon">
            <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
          </li>
        </ul>
      </div>
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Login</li>
      </ul>
      <div class="content">
        <?php if($wronglogin) echo("<span class=\"error_form\">$wrongloginmessage</span>"); ?>
        <form name="auth" id="autenticazione" method="post" action="login.php">
          <fieldset>
            <legend>Autenticazione</legend>
            <div class="row">
              <div class="col-2">
                <label for="email">Indirizzo email</label>
              </div>
              <div class="col-2">
                <input type="text" required="required" id="email" name="email" placeholder="pincopallino@domain.it"/>
              </div>            
            </div>
            <div class="row">
              <div class="col-2">
                <label for="password">Password</label>
              </div>
              <div class="col-2">
                <input type="password" required="required" id="password" name="password"/>
              </div>
            </div>
            <div class="row">
              <input class="buttom-form" type="submit" name="submit" value="Entra"/>
              <input class="buttom-form" type="reset" value="Resetta"/>
            </div>
          </fieldset>
        </form>
      </div>
      <?php include_once('footer.php')?> 
    </body>
    </html>
