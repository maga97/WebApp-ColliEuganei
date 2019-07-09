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
            <ul class="dropdown-content">
                <?php if ($nomepagina == "chiesette.php"): ?>
                    <li class="active"><a class="active" href="chiesette.php" tabindex="0">Sette
                            chiesette</a></li>
                <?php else: ?>
                    <li><a href="chiesette.php" tabindex="0">Sette chiesette</a></li>
                <?php endif; ?>
                <?php if ($nomepagina == "catajo.php"): ?>
                    <li><a class="active" href="catajo.php" tabindex="0">Castello del Catajo</a></li>
                <?php else: ?>
                    <li><a href="catajo.php" tabindex="0">Castello del Catajo</a></li>

                <?php endif; ?>
                <?php if ($nomepagina == "praglia.php"): ?>
                    <li><a class="active" href="praglia.php" tabindex="0">Abbazia di
                            praglia</a></li>
                <?php else: ?>
                    <li><a href="praglia.php" tabindex="0">Abbazia di praglia</a></li>
                <?php endif; ?>
                <?php if ($nomepagina == "carrareseeste.php"): ?>
                    <li><a class="active" href="carrareseeste.php" tabindex="0"
                        >Castello
                            carrarese di Este</a></li>
                <?php else: ?>
                    <li><a href="carrareseeste.php" tabindex="0">Castello carrarese
                            di Este</a></li>
                <?php endif; ?>
                <?php if ($nomepagina == "lispida.php"): ?>
                    <li><a class="active" href="lispida.php" tabindex="0"
                        >Castello
                            di Lispida</a></li>
                <?php else: ?>
                    <li><a href="lispida.php" tabindex="0">Castello di Lispida</a></li>

                <?php endif; ?>
                <?php if ($nomepagina == "pelagio.php"): ?>
                    <li><a class="active" href="pelagio.php" tabindex="0"
                        >Castello
                            San Pelagio</a></li>
                <?php else: ?>
                    <li><a href="pelagio.php" tabindex="0">Castello San Pelagio</a></li>

                <?php endif; ?>
            </ul>
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
                    <a href="PHP/Funzioni_Generali/logout.php" tabindex="0">Logout</a>
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
