<?php
require_once "../DataBase/DBConnection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"]) or $_SESSION["admin"] != 1) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN"
        "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="handled, screen">
    <link rel="stylesheet" type="text/css" href="../assets/css/print.css" media="print">
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile480.css" media="screen and (max-width: 460px)">
    <link rel="stylesheet" type="text/css" href="../assets/css/mobile768.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <title>Rimuovi gita - Colli Digitali</title>
</head>
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
            <li>Rimuovi gita</li>
        </ul>
        <?php
        $db = new database();
        $db->connect();
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
            <h2><?php echo $node['Nome']; ?></h2>
            <div class="attivita">
                <dl>
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
                echo "<span class=\"btnTrip\"><a href=\"../PHP/FunzioniAdmin/remove-trip-script.php?id=" . $node["ID_Attivita"] . "\">Rimuovi gita</a></span>";
                ?>
            </div>
        <?php
        endforeach; ?>
    </div>
    <?php echo include_once("../footer.php"); ?>
</div>
</body>
</html>
