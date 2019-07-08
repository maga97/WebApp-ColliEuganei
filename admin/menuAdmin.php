<?php $nomepagina = basename($_SERVER['PHP_SELF']); ?>
<div id="menuprincipale-bar">
    <ul id="menuprincipale">
        <?php if ($nomepagina == "index.php"): ?>
            <li class="active"><a href="index.php" tabindex="0">Home</a></li>
        <?php else: ?>
            <li><a href="index.php" tabindex="0">Home</a></li>
        <?php endif; ?>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione gite</a>
            <div class="dropdown-content" role="menu" id="dropdown-trip">
                <?php if ($nomepagina == "add-trip.php"): ?>
                    <a class="active" href="add-trip.php" tabindex="0" role="menuitem">Aggiungi gita</a>
                <?php else: ?>
                    <a href="add-trip.php" tabindex="0" role="menuitem">Aggiungi gita</a>

                <?php endif; ?>
                <?php if ($nomepagina == "select-trip-modify.php"): ?>
                    <a class="active" href="select-trip-modify.php" tabindex="0" role="menuitem">Modifica gita</a>

                <?php else: ?>
                    <a href="select-trip-modify.php" tabindex="0" role="menuitem">Modifica gita</a>

                <?php endif; ?>
                <?php if ($nomepagina == "remove-trip.php"): ?>
                    <a class="active" href="remove-trip.php" tabindex="0" role="menuitem">Rimuovi gita</a>
                <?php else: ?>
                    <a href="remove-trip.php" tabindex="0" role="menuitem">Rimuovi gita</a>

                <?php endif; ?>
            </div>
        </li>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Gestione utente</a>
            <div class="dropdown-content" role="menu">
                <?php if ($nomepagina == "add-admin.php"): ?>
                    <a class="active" href="add-admin.php" tabindex="0" role="menuitem">Aggiungi amministratore</a>

                <?php else: ?>
                    <a href="add-admin.php" tabindex="0" role="menuitem">Aggiungi amministratore</a>
                <?php endif; ?>
                <?php if ($nomepagina == "remove-admin.php"): ?>
                    <a class="active" href="remove-admin.php" tabindex="0" role="menuitem">Rimuovi
                        amministratore</a>
                <?php else: ?>
                    <a href="remove-admin.php" tabindex="0" role="menuitem">Rimuovi amministratore</a>

                <?php endif; ?>
            </div>
        </li>
        <?php if (isset($_SESSION['username'])): ?>
            <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                <div class="dropdown-content" role="menu">
                    <a href="view-account-admin.php" tabindex="0" role="menuitem">Impostazioni</a>
                    <a href="../PHP/Funzioni_Generali/logout.php" tabindex="0" role="menuitem">Logout</a>
                </div>
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
