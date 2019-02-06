<?php require_once("../DataBase/DBConnection.php"); ?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
  <head>
      <meta charset="UTF-8" />
    <title>Gestione Amministratori - Colli Digitali</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
    <style>
        #admin-table {
            width: 100%;
        }
        #admin-table thead {
            text-align: center;
        }
        #admin-table thead th {
            border-bottom: solid 1px black;
        }
        #admin-table tfoot td {
            border-top: solid 1px black;
        }
        .zebra tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #admin-table tr:hover {
            background-color: #f5f5f5;
        }
        #admin-table a {
            color: blue;
            text-decoration: underline;
        }
        #admin-table tfoot {
            text-align: center;
            font-weight: bold;
        }
        #admin-table td:last-child {
            max-width: 250px;
            word-wrap: break-word;
        }
    </style>
  </head>
  <body>
      <div id="container">
          <div id="content">
      <table class="zebra" id="admin-table">
          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Email</th>
                  <th>Tipo</th>
                  <th>Cambio ruolo</th>
              </tr>
          </thead>
          <tbody>
    <?php 
        $db = new database();
        $db->connect();
        $users = $db->GetUsers();
        foreach($users as $user): 
    ?>
            <tr>
                <td><?php echo $user["Nome"] ?></td>
                <td><?php echo $user["Cognome"] ?></td>
                <td><?php echo $user["Email"] ?></td>
                <td><?php echo $user["Tipo"] ?></td>
                <?php
                 $id = $user["ID_Utente"];
                 if($user["Tipo"] == "amministratore"): ?>
                <td><a href="edit-user-role.php?action=declass&id=<?php echo $id; ?>">Rimuovi <?php echo $user["Nome"] . " " . $user["Cognome"]; ?> come amministratore</a></td>
                <?php else: ?>
                <td><a href="edit-user-role.php?action=promote&id=<?php echo $id; ?>">Aggiungi <?php echo $user["Nome"] . " " . $user["Cognome"]; ?> come amministratore</a></td>
                <?php endif; ?>
            </tr>
    <?php endforeach; ?>
    <tfoot>
        <tr>
            <td>Nome</td>
            <td>Cognome</td>
            <td>Email</td>
            <td>Tipo</td>
            <td>Cambio ruolo</td>
        </tr>
    </tfoot>
    </table>
        </div>
        </div>
  </body>
</html>