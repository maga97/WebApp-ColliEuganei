<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/global.js"></script>
    <title>Login - Colli Euganei</title>
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['current_page']))// per fare in modo di tornare alla pagina da cui ho schiacciato Login
    $_SESSION['current_page'] = $_SERVER['HTTP_REFERER'];

if (isset($_POST["Login"])) {
    include_once("PHP/Funzioni_Utente/Login.php");
}

if (isset($_SESSION["username"])) { //se apro la pagina del login ma ho gia' effettuato l'accesso mi porta al pannello utente
    if ($_SESSION["admin"] == true)
        header("Location: admin/index.php");
    else
        header("Location: Impostazioni.php");
    exit;
}
?>
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
    <?php include_once("menu.php"); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li>Login</li>
        </ul>
        <div class="card" id="login-form-container">
            <h1 class="text-center">Accedi</h1>
            <?php
            if (isset($emptyFields)):
                echo '
                  <div class="alert errore login" aria-live="assertive" role="alert" aria-atomic="true"> Non hai inserito completato tutti i campi</div>';
            elseif (isset($wronglogin)):
                echo '
                  <div class="alert errore login" aria-live="assertive" role="alert" aria-atomic="true">Si &egrave; verificato un errore:
                  <span xml:lang="en">email</span> o <span xml:lang="en">password</span> non corretti</div>';
            endif;
            ?>
            <form method="post" action="Accedi.php">
                <div class="form-field">
                    <label for="username" class="log-label" xml:lang="en" lang="en">Email: </label>
                    <input type="text" id="username" name="email"
                           value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>" accesskey="n"
                           aria-required="true" maxlength="28" required="required"/>
                </div>
                <div class="form-field">
                    <label for="password" xml:lang="en" lang="en" class="log-label">Password: </label>
                    <input type="password" id="password"
                           value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""; ?>"
                           name="password" accesskey="p"
                           maxlength="32" required="required"/>
                </div>
                <div class="button-holder"><input type="submit" value="Login" name="Login" class="btn btn-primary"/>
                </div>
                <p id="not-registered">Non sei ancora registrato? <a href="Registrazione.php" id="reg-sistema">Registrati</a>
                </p>
            </form>
        </div>
    </div>
    <?php include_once("footer.php") ?>
</div>
</body>
</html>
