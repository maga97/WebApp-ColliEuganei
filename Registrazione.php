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
    <!-- <script src="js/registrazione.js"></script> -->
    <script src="js/global.js"></script>
    <title>Registrazione - Colli Digitali</title>
</head>
<?php
require_once("DataBase/DBConnection.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST["registrazione"])) {
    include_once("PHP/Funzioni_Utente/Registrazione.php");
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
    <?php include_once('menu.php'); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="Registrazione.php">Registrazione</a></li>
        </ul>
        <div class="card card-spaced row form-field">
            <form action="Registrazione.php" method="post"
                  onsubmit="return validaFormUtente(true,$('.alert.errore'),$('form'))">
                <h1>Crea <span xml:lang="en">account</span></h1>
                <?php
                if (isset($errore))
                    echo '<div class="alert errore show" aria-live="assertive" role="alert" aria-atomic="true" aria-relevant="all">' . $errore . '</div>' . PHP_EOL;
                ?>
                <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true" aria-relevant="all"><p
                            class="intestazione-alert">Errore:</p></div>
                <div class="row">
                    <div class="col col-6">
                        <div class="form-field">
                            <label for="nome" class="log-label">Nome: (obbligatorio)</label>
                            <input type="text" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ""; ?>"
                                   id="nome" name="nome" accesskey="n" aria-required="true" aria-labelledby="nome"
                                   maxlength="28"/>
                        </div>
                        <div class="form-field">
                            <label for="cognome" class="log-label">Cognome: (obbligatorio)</label>
                            <input type="text"
                                   value="<?php echo isset($_POST['cognome']) ? $_POST['cognome'] : ""; ?>"
                                   id="cognome" name="cognome" accesskey="s" aria-required="true"
                                   aria-labelledby="cognome"
                                   maxlength="28"/>
                        </div>
                        <div class="form-field" id="indirizzo-container">
                            <label for="indirizzo" class="log-label">Indirizzo: </label>
                            <input type="text"
                                   value="<?php echo isset($_POST['indirizzo']) ? $_POST['indirizzo'] : ""; ?>"
                                   id="indirizzo" name="indirizzo" accesskey="i" aria-required="false"
                                   aria-labelledby="indirizzo" maxlength="28"/>
                        </div>
                        <div class="form-field" id="civico-container">
                            <label for="civico" class="log-label mobile-align">Civico: </label>
                            <input type="text" value="<?php echo isset($_POST['civico']) ? $_POST['civico'] : ""; ?>"
                                   size="4" id="civico" name="civico" accesskey="c" aria-required="false"
                                   aria-labelledby="civico" maxlength="11"/>
                        </div>
                        <div class="form-field" id="citta-container">
                            <label for="citta" class="log-label">Citt&agrave;: </label>
                            <input type="text" value="<?php echo isset($_POST['citta']) ? $_POST['citta'] : ""; ?>"
                                   id="citta" name="citta" accesskey="t" aria-required="false" aria-labelledby="citta"
                                   maxlength="28"/>
                        </div>
                        <div class="form-field" id="cap-container">
                            <label for="CAP" class="log-label mobile-align"> <abbr
                                        title="Codice di avviamento postale">CAP</abbr>: </label>
                            <input type="text" value="<?php echo isset($_POST['CAP']) ? $_POST['CAP'] : ""; ?>"
                                   size="4" id="CAP" name="CAP" accesskey="a" aria-required="false"
                                   aria-labelledby="CAP"
                                   maxlength="6"/>
                        </div>
                    </div>
                    <div class="col col-6">
                        <div class="form-field">
                            <label for="email" xml:lang="en" class="log-label">Email: (obbligatorio)</label>
                            <input type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>"
                                   id="email" name="email" accesskey="e" aria-required="true" aria-labelledby="email"
                                   maxlength="28"/>
                        </div>
                        <div class="form-field">
                            <label for="password" class="log-label"><span xml:lang="en">Password</span>:
                                (obbligatorio)</label>
                            <input type="password"
                                   value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""; ?>"
                                   id="password" name="password" accesskey="p" aria-labelledby="password"
                                   maxlength="32"/>
                        </div>
                        <div class="form-field">
                            <label for="password2" class="log-label">Ripeti <span xml:lang="en">password</span>:
                                (obbligatorio)</label>
                            <input type="password"
                                   value="<?php echo isset($_POST['password2']) ? $_POST['password2'] : ""; ?>"
                                   id="password2" name="password2" accesskey="r" aria-labelledby="password2"
                                   maxlength="32"/>
                        </div>
                    </div>
                </div>
                <div class="button-holder">
                    <input type="submit" value="Registrati" name="registrazione" class="btn btn-primary"/>
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
