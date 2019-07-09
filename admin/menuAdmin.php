<?php $nomepagina = basename($_SERVER['PHP_SELF']); ?>
<div id="menuprincipale-bar">
    <ul id="menuprincipale">
        <?php if ($nomepagina == "index.php"): ?>
            <li class="active"><a href="index.php" tabindex="0">Home</a></li>
        <?php else: ?>
            <li><a href="index.php" tabindex="0">Home</a></li>
        <?php endif; ?>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione gite</a>
            <ul class="dropdown-content" id="dropdown-trip">
                <?php if ($nomepagina == "add-trip.php"): ?>
                    <li class="active"><a class="active" href="add-trip.php" tabindex="0" >Aggiungi gita</a></li>
                <?php else: ?>
                    <li><a href="add-trip.php" tabindex="0" >Aggiungi gita</a></li>

                <?php endif; ?>
                <?php if ($nomepagina == "select-trip-modify.php"): ?>
                    <li class="active"><a class="active" href="select-trip-modify.php" tabindex="0">Modifica gita</a></li>

                <?php else: ?>
                    <li><a href="select-trip-modify.php" tabindex="0">Modifica gita</a></li>

                <?php endif; ?>
                <?php if ($nomepagina == "remove-trip.php"): ?>
                    <li class="active"><a class="active" href="remove-trip.php" tabindex="0" >Rimuovi gita</a></li>
                <?php else: ?>
                    <li><a href="remove-trip.php" tabindex="0" >Rimuovi gita</a></li>

                <?php endif; ?>
            </ul>
        </li>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione utente</a>
            <ul class="dropdown-content">
                <?php if ($nomepagina == "add-admin.php"): ?>
        <li class="active"><a class="active" href="add-admin.php" tabindex="0">Aggiungi amministratore</a></li>

                <?php else: ?>
                    <li ><a href="add-admin.php" tabindex="0">Aggiungi amministratore</a></li>
                <?php endif; ?>
                <?php if ($nomepagina == "remove-admin.php"): ?>
                <li class="active"><a class="active" href="remove-admin.php" tabindex="0" >Rimuovi
                        amministratore</a></li>
                <?php else: ?>
                    <li><a href="remove-admin.php" tabindex="0" >Rimuovi amministratore</a></li>

                <?php endif; ?>
            </ul>
        </li>
        <?php if (isset($_SESSION['username'])): ?>
            <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                <ul class="dropdown-content">
                    <li><a href="view-account-admin.php" tabindex="0" >Impostazioni</a></li>
                    <li><a href="../PHP/Funzioni_Generali/logout.php" tabindex="0">Logout</a></li>
                </ul>
            </li>
        <?php else: ?>
            <li><a href="../Accedi.php" tabindex="0">Accedi</a></li>
            <li><a href="../Registrazione.php" tabindex="0">Registrati</a></li>
        <?php endif; ?>
        <li class="icon">
            <a href="#" id="mobile">&#9776;</a>
        </li>
    </ul>
</div>
