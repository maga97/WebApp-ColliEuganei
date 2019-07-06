<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile480.css" media="screen and (max-width: 460px)"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Aggiungi gita - Colli Digitali</title>
</head>
<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
}
if (isset($_POST["aggiungiGita"])) {
    $errore = include_once("../PHP/Funzioni_Admin/add-trip-script.php");
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
            <li>Gestione gite</li>
            <li>Aggiungi nuova gita</li>
        </ul>
        <?php
        if (isset($errore) && $errore == false) {
            echo "<div class=\"alert nojs success\">Inserimento avvenuto correttamente</div>" . PHP_EOL;
        } else if (isset($errore) && $errore != false) {
            echo "<div class=\"alert nojs errore\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\"><p>Errore: " . $errore . "</p></div>" . PHP_EOL;
        }
        ?>
        <div class="form">
            <h1>Aggiungi nuova gita</h1>
            <div class="row">
                <form action="add-trip.php" enctype="multipart/form-data" name="form-add-trip" method="POST">
                    <div class="form-field">
                        <label for="nomegita">Titolo</label>
                        <input type="text" name="nomegita" id="nomegita" required="required"/>
                    </div>
                    <div class="form-field">
                        <label for="descrizione">Descrizione</label>
                        <textarea rows="20" cols="40" name="descrizione" id="descrizione"
                                  required="required"></textarea>
                    </div>
                    <div class="form-field">
                        <label for="immagine">Immagine</label>
                        <input type="file" name="immagine" id="immagine"
                               required="required"/>
                    </div>
                    <div class="form-field">
                        <label for="data">Data (gg/mm/aaaa)</label>
                        <input type="text" name="data" id="data" required="required" aria-labelledby="data"/>
                    </div>
                    <div class="form-field">
                        <label for="ora">Ora (hh:mm)</label>
                        <input type="text" name="ora" id="ora" required="required" aria-labelledby="ora"/>
                    </div>
                    <div class="form-field">
                        <label for="prezzo">Prezzo (10.50)</label>
                        <input type="text" aria-labelledby="prezzo" id="prezzo" name="prezzo" required="required"/>
                    </div>
                    <div class="button-holder">
                        <input type="reset" value="Cancella dati" name="cancelladati" id="bottoneCancella"
                               class="btn btn-tripCancel"/>
                        <input type="submit" value="Inserisci" name="aggiungiGita" id="bottoneIns"
                               class="btn btn-tripInsert"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo include_once "../footer.php"; ?>
</div>
</body>
</html>