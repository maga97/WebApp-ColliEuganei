<?php $nomepagina = basename($_SERVER['PHP_SELF']); ?>
<div id="menuprincipale-bar" role="menubar">
    <ul id="menuprincipale" class="responsive">
        <?php if ($nomepagina == "index.php"): ?>
            <li class="active"><a href="index.php" tabindex="0">Home</a></li>
        <?php else: ?>
            <li><a href="index.php" tabindex="0">Home</a></li>
        <?php endif; ?>
        <?php if ($nomepagina == "chiesette.php" || $nomepagina == "catajo.php" || $nomepagina == "praglia.php" || $nomepagina == "carrareseeste.php" || $nomepagina == "lispida.php" || $nomepagina == "pelagio.php"): ?>
    <li class="dropdown active"><a aria-haspopup="true" tabindex="0">Luoghi</a>
    <?php else: ?>
        <li class="dropdown"><a aria-haspopup="true" tabindex="0">Luoghi</a>
            <?php endif; ?>
            <div class="dropdown-content button-right" role="menu">
                <?php if ($nomepagina == "chiesette.php"): ?>
                    <a class="active" href="chiesette.php" tabindex="0" role="menuitem">Sette
                        chiesette</a>
                <?php else: ?>
                    <a href="chiesette.php" tabindex="0" role="menuitem">Sette chiesette</a>
                <?php endif; ?>
                <?php if ($nomepagina == "catajo.php"): ?><a class="active" href="catajo.php" tabindex="0"
                                                             role="menuitem">Castello
                    del Catajo</a>
                <?php else: ?>
                    <a href="catajo.php" tabindex="0" role="menuitem">Castello del Catajo</a>

                <?php endif; ?>
                <?php if ($nomepagina == "praglia.php"): ?>
                    <a class="active" href="praglia.php" tabindex="0" role="menuitem">Abbazia di
                        praglia</a>
                <?php else: ?>
                    <a href="praglia.php" tabindex="0" role="menuitem">Abbazia di praglia</a>
                <?php endif; ?>
                <?php if ($nomepagina == "carrareseeste.php"): ?><a class="active" href="carrareseeste.php" tabindex="0"
                                                                    role="menuitem">Castello
                    carrarese di Este</a>
                <?php else: ?><a href="carrareseeste.php" tabindex="0" role="menuitem">Castello carrarese
                    di Este</a>
                <?php endif; ?>
                <?php if ($nomepagina == "lispida.php"): ?><a class="active" href="lispida.php" tabindex="0"
                                                              role="menuitem">Castello
                    di Lispida</a>
                <?php else: ?><a href="lispida.php" tabindex="0" role="menuitem">Castello di Lispida</a>

                <?php endif; ?>
                <?php if ($nomepagina == "pelagio.php"): ?><a class="active" href="pelagio.php" tabindex="0"
                                                              role="menuitem">Castello
                    San Pelagio</a>
                <?php else: ?><a href="pelagio.php" tabindex="0" role="menuitem">Castello San Pelagio</a>

                <?php endif; ?>
            </div>
        </li>
        <?php if ($nomepagina == "Gite.php"): ?>
            <li><a href="Gite.php" tabindex="0" class="active">Gite</a></li>
        <?php else: ?>
            <li><a href="Gite.php" tabindex="0">Gite</a></li>
        <?php endif; ?>
        <?php
        if (isset($_SESSION["username"])):
            ?>
            <li class="dropdown button-right"><a aria-haspopup="true" tabindex="0">Account</a>
                <div class="dropdown-content" role="menu">
                    <?php if ($nomepagina == "Impostazioni.php"): ?>
                        <a class="active" href="Impostazioni.php" tabindex="0">Impostazioni</a>
                    <?php else: ?>
                        <a href="Impostazioni.php" tabindex="0">impostazioni</a>
                    <?php endif; ?>
                    <?php if ($nomepagina == "MieGite.php"): ?>
                        <a class="active" href="MieGite.php" tabindex="0">Le mie gite</a>
                    <?php else: ?>
                        <a href="MieGite.php" tabindex="0">Le mie gite</a>
                    <?php endif; ?>
                    <a href="PHP/Funzioni_Generali/logout.php" tabindex="0" role="menuitem">Logout</a>
                </div>
            </li>

        <?php
        else:
            ?>
            <?php if ($nomepagina == "Accedi.php"): ?>
            <li class="button-right"><a href="Accedi.php" tabindex="0" class="active">Accedi</a></li>
        <?php else: ?>
            <li class="button-right"><a href="Accedi.php" tabindex="0">Accedi</a></li>
        <?php endif; ?>
            <?php if ($nomepagina == "Registrazione.php"): ?>
            <li class="button-right"><a href="Registrazione.php" tabindex="0" class="active">Registrati</a></li>
        <?php else: ?>
            <li class="button-right"><a href="Registrazione.php" tabindex="0">Registrati</a></li>
        <?php endif; ?>
        <?php
        endif;
        ?>
        <li class="icon">
            <a href="#" id="mobile">&#9776;</a>
        </li>
    </ul>
</div>
