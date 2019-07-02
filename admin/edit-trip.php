<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"]) || $_SESSION["admin"] != 1 || !isset($_GET['id'])) {
    header("Location: ../index.php");
}

if (isset($_POST["modificaGita"])) {
    $errore = include_once("../PHP/Funzioni_Admin/edit-trip-script.php");
}

$id = $_GET['id'];
$db = new database();
$db->connect();
$gita = $db->GetGita($id);

$nomegita = $gita[0]["Nome"];
$descrizione = $gita[0]["Descrizione"];
$prezzo = $gita[0]["Prezzo"];
$immagine = base64_encode($gita[0]["Immagine"]);
$ora = $gita[0]["Ore"];
$ora = explode(":", $ora);
$ora = $ora[0] . ":" . $ora[1];
$data = $gita[0]["Data"];
$arrayofdata = explode("-", $data);
$data = $arrayofdata[2] . "/" . $arrayofdata[1] . "/" . $arrayofdata[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
        "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="handled, screen">
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print">
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile480.css" media="screen and (max-width: 460px)">
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile768.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/global.js"></script>
    <title>Modifica gita - Colli Digitali</title>
</head>
<body>
<div>
    <a href="#content" class="skip">Vai al contenuto</a>
    <div>
        <div id="container">
            <div class="header">
                <div class="header-picture">
                    <div class="header-title">
                        <h1>Colli Euganei</h1>
                        <h2>Natura e storia in digitale</h2>
                    </div>
                </div>
            </div>
            <<?php include_once("menuAdmin.php"); ?>
            <div id="content">
                <ul class="breadcrumb">
                    <li>Gestione gite</li>
                    <li>Modifica dati gita</li>
                </ul>
                <div class="form">

                    <?php
                    if (isset($errore) && $errore == false) {
                        echo "<div class=\"alert nojs success\">Modifica avvenuta correttamente</div>" . PHP_EOL;
                    } else if (isset($errore) && $errore != false) {
                        echo "<div class=\"alert nojs errore\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\"><p>Errore: " . $errore . "</p></div>" . PHP_EOL;
                    }
                    ?>

                    <img src="data:image/jpeg;base64,<?php echo $immagine ?>" alt="Immagine <?php echo $nome ?>"
                         class="responsive-image center-image"/>
                    <form action="edit-trip.php" enctype="multipart/form-data"
                          name="form-modify-trip"
                          method="POST">
                        <div class="log-field-container">
                            <legend>Modifica gita "<?php echo $nomegita; ?>"</legend>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <label for="titolo">Titolo</label>
                            <input type="text" name="nomegita" id="idnomegita" value="<?php echo $nomegita; ?>"
                                   required="required" maxlength="40"/>
                        </div>
                        <div class="log-field-container">
                            <label for="descrizione">Descrizione</label>
                            <textarea rows="5" cols="40" name="descrizione" required="required"
                                      maxlength="256"><?php echo $descrizione; ?></textarea>
                        </div>
                        <div class="log-field-container">
                            <label for="immagine">Immagine</label>
                            <input type="file" name="immagine" aria-labelledby="imgdesc" id="idimmagine"
                                   placeholder="Selezione immagine gita"/>
                            <span id="imgdesc" tabindex="0">Se lasciata vuota l'immagine non cambier&agrave;</span>
                        </div>
                        <div class="log-field-container">
                            <label for="data">Data</label>
                            <input type="text" name="data" aria-labelledby="datadesc" required="required"
                                   value="<?php echo $data; ?>"/>
                            <span id="datadesc" tabindex="0">gg/mm/aaaa</span>
                        </div>
                        <div class="log-field-container">
                            <label for="ora">Ora</label>
                            <input type="text" name="ora" aria-labelledby="oradesc" required="required"
                                   value="<?php echo $ora; ?>"/>
                            <span id="oradesc" tabindex="0">hh:mm</span>
                        </div>
                        <div class="log-field-container">
                            <label for="prezzo">Prezzo</label>
                            <input type="text" min="0" id="prezzoAddTrip" name="prezzo" required="required"
                                   aria-labelledby="prezzodesc" value="<?php echo $prezzo; ?>"/>
                            <span id="prezzodesc" tabindex="0">10.50</span>
                        </div>
                        <div class="button-holder">
                            <input type="reset" value="Cancella dati" name="cancelladati" class="btn btn-tripCancel"/>
                            <input type="submit" value="Modifica" name="modificaGita" class="btn btn-tripInsert"/>
                        </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php echo include_once "../footer.php"; ?>
        </div>
</body>
</html>
