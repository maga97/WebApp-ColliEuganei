<?php $nomepagina = basename($_SERVER['PHP_SELF']); ?>
<div id="menuprincipale-bar" role="menubar">
    <ul id="menuprincipale">
        <?php if ($nomepagina == "index.php"): ?>
            <li><a href="/index.php" tabindex="0" class="active">Home</a></li>
        <?php else: ?>
            <li><a href="/index.php" tabindex="0">Home</a></li>
        <?php endif; ?>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Luoghi</a>
            <ul class="dropdown-content button-right" role="menu">
                <?php if ($nomepagina == "chiesette.php"): ?>
                    <li role="none" class="active"><a href="/luoghi/chiesette.php" tabindex="0" role="menuitem">Sette
                            chiesette</a></li>
                <?php else: ?>
                    <li role="none"><a href="/luoghi/chiesette.php" tabindex="0" role="menuitem">Sette chiesette</a>
                    </li>
                <?php endif; ?>
                <?php if ($nomepagina == "catajo.php"): ?>
                    <li role="none" class="active"><a href="/luoghi/catajo.php" tabindex="0" role="menuitem">Castello
                            del Catajo</a></li>
                <?php else: ?>
                    <li role="none"><a href="/luoghi/catajo.php" tabindex="0" role="menuitem">Castello del Catajo</a>
                    </li>
                <?php endif; ?>
                <?php if ($nomepagina == "praglia.php"): ?>
                    <li role="none" class="active"><a href="/luoghi/praglia.php" tabindex="0" role="menuitem">Abbazia di
                            praglia</a></li>
                <?php else: ?>
                    <li role="none"><a href="/luoghi/praglia.php" tabindex="0" role="menuitem">Abbazia di praglia</a>
                    </li>
                <?php endif; ?>
                <?php if ($nomepagina == "carrareseeste.php"): ?>
                    <li role="none" class="active"><a href="/luoghi/carrareseeste.php" tabindex="0" role="menuitem">Castello
                            carrarese di Este</a></li>
                <?php else: ?>
                    <li role="none"><a href="/luoghi/carrareseeste.php" tabindex="0" role="menuitem">Castello carrarese
                            di Este</a></li>
                <?php endif; ?>
                <?php if ($nomepagina == "lispida.php"): ?>
                    <li role="none" class="active"><a href="/luoghi/lispida.php" tabindex="0" role="menuitem">Castello
                            di Lispida</a></li>
                <?php else: ?>
                    <li role="none"><a href="/luoghi/lispida.php" tabindex="0" role="menuitem">Castello di Lispida</a>
                    </li>
                <?php endif; ?>
                <?php if ($nomepagina == "pelagio.php"): ?>
                    <li role="none" class="active"><a href="/luoghi/pelagio.php" tabindex="0" role="menuitem">Castello
                            San Pelagio</a></li>
                <?php else: ?>
                    <li role="none"><a href="/luoghi/pelagio.php" tabindex="0" role="menuitem">Castello San Pelagio</a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php if ($nomepagina == "gite.php"): ?>
            <li><a href="/gite.php" tabindex="0" class="active">Gite</a></li>
        <?php else: ?>
            <li><a href="/gite.php" tabindex="0">Gite</a></li>
        <?php endif; ?>
        <?php
        if (isset($_SESSION["username"])):
            ?>
            <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                <ul class="dropdown-content" role="menu">
                    <?php if ($nomepagina == "view-account.php"): ?>
                        <li><a href="/view-account.php" tabindex="0" class="active">Impostazioni</a></li>
                    <?php else: ?>
                        <li><a href="/view-account.php" tabindex="0">impostazioni</a></li>
                    <?php endif; ?>
                    <?php if ($nomepagina == "view-my-trip.php"): ?>
                        <li><a href="/view-my-trip.php" tabindex="0" class="active">Le mie gite</a></li>
                    <?php else: ?>
                        <li><a href="/view-my-trip.php" tabindex="0">Le mie gite</a></li>
                    <?php endif; ?>
                    <li><a href="/logout.php" tabindex="0" role="menuitem">Logout</a></li>
                </ul>
            </li>

        <?php
        else:
            ?>
            <li class="button-right"><a href="/login.php" tabindex="0">Accedi</a></li>
            <?php if ($nomepagina == "login.php"): ?>
            <li><a href="/login.php" tabindex="0" class="active">Accedi</a></li>
        <?php else: ?>
            <li><a href="/index.php" tabindex="0">Accedi</a></li>
        <?php endif; ?>
            <?php if ($nomepagina == "Registrazione.php"): ?>
            <li><a href="/Registrazione.php" tabindex="0" class="active">Registrati</a></li>
        <?php else: ?>
            <li><a href="/Registrazione.php" tabindex="0">Registrati</a></li>
        <?php endif; ?>
        <?php
        endif;
        ?>
        <li class="icon">
            <a href="#" id="mobile">&#9776;</a>
        </li>
    </ul>
</div>