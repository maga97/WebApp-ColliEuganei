<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile480.css" media="screen and (max-width: 460px)"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/global.js"></script>
    <title>Modifica gita - Colli Digitali</title>
</head>

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
                    <h2>Modifica gita "<?php echo $nomegita; ?>"</h2>
                    <form action="edit-trip.php" enctype="multipart/form-data"
                          name="form-modify-trip"
                          method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-field">
                            <label for="nomegita">Titolo</label>
                            <input type="text" name="nomegita" id="nomegita" value="<?php echo $nomegita; ?>"
                                   required="required" maxlength="40" />
                        </div>
                        <div class="form-field">
                            <label for="descrizione">Descrizione</label>
                            <textarea rows="5" cols="40" name="descrizione" required="required"
                                      maxlength="256" id="descrizione"><?php echo $descrizione; ?></textarea>
                        </div>
                        <div class="form-field">
                            <label for="immagine">Immagine</label>
                            <input type="file" name="immagine" aria-labelledby="imgdesc" id="idimmagine"
                                   placeholder="Selezione immagine gita"/>
                            <span id="imgdesc" tabindex="0">Se lasciata vuota l'immagine non cambier&agrave;</span>
                        </div>
                        <div class="form-field">
                            <label for="data">Data</label>
                            <input type="text" name="data" aria-labelledby="datadesc" required="required"
                                   value="<?php echo $data; ?>" id="data"/>
                            <span id="datadesc" tabindex="0">gg/mm/aaaa</span>
                        </div>
                        <div class="form-field">
                            <label for="ora">Ora</label>
                            <input type="text" name="ora" aria-labelledby="oradesc" required="required"
                                   value="<?php echo $ora; ?>" id="ora"/>
                            <span id="oradesc" tabindex="0">hh:mm</span>
                        </div>
                        <div class="form-field">
                            <label for="prezzo">Prezzo</label>
                            <input type="text" min="0" id="prezzo" name="prezzo" required="required"
                                   aria-labelledby="prezzodesc" value="<?php echo $prezzo; ?>"/>
                            <span id="prezzodesc" tabindex="0">10.50</span>
                        </div>
                        <div class="button-holder">
                            <input type="reset" value="Cancella dati" name="cancelladati" class="btn btn-tripCancel"/>
                            <input type="submit" value="Modifica" name="modificaGita" class="btn btn-tripInsert"/>
                        </div>
                    </form>
                </div>
            </div>
            <?php echo include_once "../footer.php"; ?>
        </div>
</body>
</html>
