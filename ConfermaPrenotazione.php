<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css" href="assets/css/mobile480.css" media="screen and (max-width: 480px)"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/global.js"></script>
    <title>Login - Colli Digitali</title>
</head>
<?php (require_once "DataBase/DBConnection.php") or die("Impossibile connettersi al database");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}
$dbConnection = new database();
$dbConnection->Connect();
$PrenotazioneOk = false;

if (isset($_POST["confermaPrenotazione"])) {
    $PrenotazioneOk = $dbConnection->addPrenotazione($_SESSION["ID"], $dbConnection->GetIDUtente($_SESSION["username"]),
        $_SESSION["data"], $_SESSION["ora"], $_SESSION["posti"]
    );
} else if (isset($_POST["cancellaPrenotazione"])) {
    header("Location: Gite.php");
    exit;
} else if (isset($_POST["posti"])) {
    if ($_POST["posti"] != "")
        $_SESSION["posti"] = $_POST["posti"];
    else {
        $_SESSION["ErroriPosti"] = true;
        header("Location:" . $_SERVER['HTTP_REFERER']);
        exit;
    }
} else {
    header("Location: index.php");
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
            <li>Riepilogo prenotazione</li>
        </ul>
        <?php if (!$PrenotazioneOk): ?>
            <div id="riepilogo">
                <div class="alert errore" aria-live="assertive" role="alert" aria-atomic="true"
                     aria-relevant="all"></div>

                <h2> Riepilogo prenotazione </h2>
                <div id="descrizione"><?php echo $_POST["descrizione"] . PHP_EOL; ?> </div>
                <div class="riepprenotazione">
                    <dl>
                        <dt>Data</dt>
                        <dd><?php echo $_POST["data"] . PHP_EOL; ?> </dd>
                        <dt>Ora</dt>
                        <dd> <?php echo $_POST["ora"] . PHP_EOL; ?> </dd>
                        <dt>Posti</dt>
                        <dd> <?php echo $_POST["posti"] . PHP_EOL; ?> </dd>
                        <dt>Prezzo totale</dt>
                        <dd> <?php echo (float)$_SESSION["prezzo"] * (float)$_SESSION["posti"]; ?>€</dd>
                    </dl>
                </div>
                <div class="button-holder">
                    <form action="ConfermaPrenotazione.php" method="post">
                        <input onclick="return validaPosti()" type="submit" value="Conferma" name="confermaPrenotazione"
                               class="btn btn-success"/>
                        <input type="submit" value="Annulla" name="cancellaPrenotazione" class="btn btn-red"/>
                    </form>
                </div>
            </div>
        <?php else: echo "<div class=\"alert show success\"> La prenotazione &egrave; stata confermata. </div>";
        endif;
        ?>
    </div>
    <?php include_once('footer.php') ?>
</div>
</body>
</html>
