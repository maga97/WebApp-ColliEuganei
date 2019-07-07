<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="screen, handheld"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Pannello Utente - Colli Digitali</title>
</head>
<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"])) {
    header("Location: ../Accedi.php");
    exit;
}
include_once("../PHP/Funzioni_Generali/ValidaCampo.php");
if (isset($_POST["conferma_modifica"])) {
    $errore = include_once("../PHP/Funzioni_Generali/ModificaDati.php");
} else if (isset($_POST["modifica_password"])) {
    $errore = include_once("../PHP/Funzioni_Generali/ModificaPassword.php");
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
    <?php include_once("menuAdmin.php"); ?>
    <div id="content">
        <ul class="breadcrumb">
            <li>Impostazioni account</li>
        </ul>
        <div class="form">
            <div class="titolo-form">
                <h1 id="titolo">Riepilogo dati <span xml:lang="en">account</span></h1>
            </div>

            <form id="dati-utente" method="post" action="view-account-admin.php">
                <?php
                if (isset($_POST["conferma_modifica"])) {
                    if ($errore != "")
                        echo "<div class=\"alert show errore\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\"><p>Errore: " . $errore . "</p></div>" . PHP_EOL;
                    else {
                        echo "<div class=\"alert show success\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\">
                                <p>Dati modificati con successo</p>
                              </div>";
                    }
                }
                if (isset($_POST["modifica_password"])) {
                    if ($errore != "")
                        echo "<div class=\"alert show errore\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\"><p>Errore: " . $errore . "</p></div>" . PHP_EOL;
                    else {
                        echo "<div class=\"alert show success\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\">
                                <p>Password modificata con successo</p>
                              </div>";
                    }
                }

                $db = new database();
                $db->connect();
                ?>
                <div class="form-field">
                    <label for="email" xml:lang="en">Email: </label>
                    <div class="input-container">
                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="email" name="email"
                                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : $_SESSION['username']; ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="email" name="email"
                                   value="<?php echo $_SESSION['username']; ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-field">
                    <label for="nome">Nome: </label>
                    <div class="input-container">
                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="nome" name="nome"
                                   value="<?php echo isset($_POST["nome"]) ? $_POST["nome"] : $db->GetName($_SESSION['username']); ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="nome" name="nome"
                                   value="<?php echo $db->GetName($_SESSION['username']); ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-field">
                    <label for="cognome">Cognome: </label>
                    <div class="input-container">

                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="cognome" name="cognome"
                                   value="<?php echo isset($_POST["cognome"]) ? $_POST["cognome"] : $db->GetSurname($_SESSION['username']); ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="cognome" name="cognome"
                                   value="<?php echo $db->GetSurname($_SESSION['username']); ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-field">
                    <label for="indirizzo">Indirizzo: </label>
                    <div class="input-container">
                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="indirizzo" name="indirizzo"
                                   value="<?php echo isset($_POST["indirizzo"]) ? $_POST["indirizzo"] : $db->GetAddress($_SESSION['username']); ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="indirizzo"
                                   value="<?php echo $db->GetAddress($_SESSION['username']); ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-field">
                    <label for="civico">Civico: </label>
                    <div class="input-container">
                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="civico" name="civico"
                                   value="<?php echo isset($_POST["civico"]) ? $_POST["civico"] : $db->GetCivico($_SESSION['username']); ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="civico" name="civico"
                                   value="<?php echo $db->GetCivico($_SESSION['username']); ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-field">
                    <label for="citta">Citt&agrave;: </label>
                    <div class="input-container">
                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="citta" name="citta"
                                   value="<?php echo isset($_POST["citta"]) ? $_POST["citta"] : $db->GetCity($_SESSION['username']); ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="citta" name="citta"
                                   value="<?php echo $db->GetCity($_SESSION['username']); ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-field">
                    <label for="CAP"><abbr title="Codice di avviamento postale">CAP</abbr>: </label>
                    <div class="input-container">
                        <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                            <input type="text" class="disabilita" id="CAP" name="CAP"
                                   value="<?php echo isset($_POST["CAP"]) ? $_POST["CAP"] : $db->GetCAP($_SESSION['username']); ?>"/>
                        <?php else: ?>
                            <input type="text" class="disabilita" disabled="disabled" id="CAP" name="CAP"
                                   value="<?php echo $db->GetCAP($_SESSION['username']); ?>"/>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="button-holder">
                    <?php if (isset($_POST["modifica_dati"]) || (isset($errore) && $errore != "")): ?>
                        <button type="submit" id="conferma_modifica" name="conferma_modifica" class="btn btn-primary">
                            Conferma le modifiche
                        </button>
                        <button id="annulla_modifica" name="annulla_modifica" class="btn btn-red">Annulla le
                            modifiche e torna indietro
                        </button>
                    <?php else: ?>
                        <button id="bottone-modifica-dati" name="modifica_dati" class="btn btn-success">Modifica dati
                        </button>
                    <?php endif; ?>
                </div>
            </form>
            <div class="titolo-form">
                <h2>Modifica <span xml:lang="en">password</span></h2>
            </div>
            <form id="mod-pwd-form" method="post" action="view-account-admin.php">
                <div class="form-field">
                    <label for="vecchia-password">Password corrente: (obbligatorio)</label>
                    <div class="input-container">
                        <input type="password" id="vecchia-password" name="vecchia-password" class="disabilita"/>
                    </div>
                </div>
                <div class="form-field">
                    <label for="password">Nuova <span xml:lang="en">password</span>: (obbligatorio)</label>
                    <div class="input-container">
                        <input type="password" id="password" name="password" class="disabilita"/>
                    </div>
                </div>
                <div class="form-field">
                    <label for="password2">Ripeti nuova <span xml:lang="en">password</span>: (obbligatorio)</label>
                    <div class="input-container">
                        <input type="password" id="password2" name="password2" class="disabilita"/>
                    </div>
                </div>
                <div class="button-holder">
                    <button type="submit" id="bottone-modifica-password" name="modifica_password"
                            class="btn btn-primary">Modifica <span xml:lang="en">password</span></button>

                </div>
            </form>
        </div>
    </div>
    <?php include_once("../footer.php"); ?>
</div>
</body>
</html>
