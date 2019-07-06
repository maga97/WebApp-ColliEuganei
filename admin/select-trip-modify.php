<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print">
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile480.css" media="screen and (max-width: 460px)"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile768.css" media="screen and (max-width: 768px)"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
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
if (!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
}
$db = new database();
$db->connect();
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
            <li>Modifica dati gita</li>
        </ul>
        <?php
        if (isset($_GET["done"]) == true) {
            echo "<div class=\"alert nojs success\" aria-live=\"assertive\" role=\"alert\" aria-atomic=\"true\">Modifica avvenuta correttamente</div>" . PHP_EOL;
        }
        $list = $db->GetListaAttivita();
        $size = sizeof($list);
        if ($size == 0) {
            echo "<h3>Momentaneamente non sono disponibili gite</h3>" . PHP_EOL;
        }
        foreach ($list as $node):
            $data = explode("-", $node['Data']);
            $node['Ore'] = substr($node['Ore'], 0, 5);
            $node['Data'] = $data[2] . "/" . $data[1] . "/" . $data[0];
            ?>
            <div class="card form-field">
                <h2><?php echo $node['Nome']; ?></h2>
                <dl class="inline-list">
                    <dt>Descrizione</dt>
                    <dd><?php echo $node['Descrizione']; ?></dd>
                    <dt>Prezzo</dt>
                    <dd><?php echo $node['Prezzo']; ?> &euro;</dd>
                    <dt>Data</dt>
                    <dd><?php echo $node['Data']; ?></dd>
                    <dt>Ore</dt>
                    <dd><?php echo $node['Ore'] ?></dd>
                </dl>
                <?php
                echo "<a class=\"btn btn-primary\" href=\"edit-trip.php?id=" . $node["ID_Attivita"] . "\">Modifica gita</a>";
                ?>
            </div>
        <?php
        endforeach; ?>
    </div>
    <?php echo include_once "../footer.php"; ?>
</div>
</body>
</html>
