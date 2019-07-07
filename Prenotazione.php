<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen, handheld"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/global.js"></script>
    <title>Prenotazione - Colli Digitali</title>
</head>

<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
            <li><a href="Gite.php">Gite</a></li>
            <li>Prenotazione</li>
        </ul>

        <?php
        if (!isset($_GET['id']) || $_GET['id'] == ""):
            echo "Si &egrave; verificato un errore. Torna alla pagina delle gite per effettuare la prenotazione";
        else:
        include_once("PHP/Funzioni_Utente/DatiGita.php");
        if (isset($_SESSION["ErroriPosti"])) {
            echo '<div class="alert errore show" aria-live="assertive" role="alert" aria-atomic="true" aria-relevant="all"><p>Inserire un valore corretto per i posti</p></div>';
            unset($_SESSION["ErroriPosti"]);
        }
        ?>
        <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true" aria-relevant="all"><p>Inserire
                un valore corretto per i posti</p></div>
        <form action="ConfermaPrenotazione.php" method="post" onsubmit="return validaPosti($('.alert.errore'))">
            <?php echo "<input type=\"hidden\" name=\"ID\" value=\"" . $_GET["id"] . "\"/>"; ?>

            <div class="field-container">
                <label for="descrizione" lang="it" class="log-label">Descrizione dell'attivit&agrave;</label>
                <?php echo "<input type=\"text\" id=\"descrizione\" name=\"descrizione\" value=\"" . $attivita["Descrizione"] . "\" accesskey=\"d\" readonly=\"readonly\" />"; ?>
            </div>
            <div class="field-container">
                <label for="prezzo" lang="it" class="log-label">Prezzo(per persona)</label>
                <?php echo "<input type=\"text\" id=\"prezzo\" name=\"prezzo\" value=\"" . $attivita["Prezzo"] . " Euro\" accesskey=\"p\" readonly=\"readonly\" />"; ?>
            </div>
            <div class="field-container">
                <label for="data" lang="it" class="log-label">Data</label>
                <?php echo "<input type=\"text\" id=\"data\" name=\"data\" value=\"" . $attivita["Data"] . "\" readonly=\"readonly\" />"; ?>
            </div>
            <div class="field-container">
                <label for="ora" lang="it" class="log-label">Orario</label>
                <?php echo "<input type=\"text\" id=\"ora\" name=\"ora\" value=\"" . $attivita["Ore"] . "\" accesskey=\"o\" readonly=\"readonly\" />"; ?>
            </div>
            <div class="field-container">
                <label for="reservePosti" lang="it" class="log-label">Scegli il numero di posti</label>
                <input type="text" id="reservePosti" name="posti"/>
            </div>
            <div class="button-holder"><input type="submit" value="Prenotati alla gita" name="registrazione"
                                              class="btn btn-primary" aria-label="Prenotati alla gita"/></div>
        </form>
    </div>
<?php endif; ?>
    <?php include_once('footer.php') ?>
</div>
</body>
</html>
