
<div id="menuprincipale-bar" role="menubar">
    <ul id="menuprincipale">
        <li><a href="index.php" tabindex="0">Home</a></li>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Luoghi</a>
            <ul class="dropdown-content button-right" role="menu">
                <li role="none"><a href="/luoghi/chiesette.php" tabindex="0" role="menuitem">Sette Chiesette</a></li>
                <li role="none"><a href="/luoghi/catajo.php" tabindex="0" role="menuitem">Castello del Catajo</a></li>
                <li role="none"><a href="/luoghi/praglia.php" tabindex="0" role="menuitem">Abbazia di Praglia</a></li>
                <li role="none"><a href="/luoghi/carrareseeste.php" tabindex="0" role="menuitem">Castello carrarese di Este</a></li>
                <li role="none"><a href="/luoghi/lispida.php" tabindex="0" role="menuitem">Castello di Lispida</a></li>
                <li role="none"><a href="/luoghi/pelagio.php" tabindex="0" role="menuitem">Castello San Pelagio</a></li>
            </ul>
        </li>
        <li><a href="gite.php" class="active" tabindex="0">Gite</a></li>
        <?php
        if (isset($_SESSION["username"])):
            ?>
            <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                <ul class="dropdown-content" role="menu">
                    <li><a href="view-account.php" tabindex="0" role="menuitem">Impostazioni</a></li>
                    <li><a href="view-my-trip.php" tabindex="0" role="menuitem">Le mie gite</a></li>
                    <li><a href="logout.php" tabindex="0" role="menuitem">Logout</a></li>
                </ul>
            </li>

        <?php
        else:
            ?>
            <li class="button-right"><a href="login.php" tabindex="0">Accedi</a></li>
            <li class="button-right"><a href="Registrazione.php" tabindex="0">Registrati</a></li>
        <?php
        endif;
        ?>
        <li class="icon">
            <a href="#" id="mobile">&#9776;</a>
        </li>
    </ul>
</div>