<div class="topnav-bar">
  <ul class="topnav">
    <?php $nomepagina=basename($_SERVER['PHP_SELF']); ?>
  <?php if($nomepagina=="index.php"):?>
    <li><a href="/index.php" class="active">Home</a></li>
  <?php else: ?>
    <li><a href="/index.php">Home</a></li>
  <?php endif; ?>
  <?php if($nomepagina=="chiesette.php" || $nomepagina=="catajo.php"
          || $nomepagina=="praglia.php" || $nomepagina=="lispida.php"
          || $nomepagina=="carrareseeste.php" || $nomepagina=="pelagio.php"):
  ?>
    <li class="dropdown"><a class="active">Luoghi</a>
  <?php else: ?>
    <li class="dropdown"><a>Luoghi</a>
  <?php endif;?>
        <ul class="dropdown-content">
          <li><a href="/pages/luoghi/chiesette.php">Sette Chiesette</a></li>
          <li><a href="/pages/luoghi/catajo.php">Castello del Catajo</a></li>
          <li><a href="/pages/luoghi/praglia.php">Abbazia di Praglia</a></li>
          <li><a href="/pages/luoghi/carrareseeste.php">Castello carrarese di Este</a></li>
          <li><a href="/pages/luoghi/lispida.php">Castello di Lispida</a></li>
          <li><a href="/pages/luoghi/pelagio.php">Castello San Pelagio</a></li>
        </ul>
      </li>
    <?php if($nomepagina=="gite.php"):?>
    <li><a href="/pages/gite.php" class=active>Gite</a></li>
  <?php else: ?>
    <li><a href="/pages/gite.php" >Gite</a></li>
  <?php endif;?>

    <?php if(isset($_SESSION['username'])): ?>
      <?php if($nomepagina=="view-account.php"): ?>
       <li><a href="view-account.php" class="active">Account</a></li>
      <?php else: ?>
        <li><a href="view-account.php">Account</a></li>
      <?php endif; ?>
    <?php else:?>
      <?php if($nomepagina=="login.php"):?>
        <li><a href="/login.php" class="active">Accedi</a></li>
      <?php else:?>
        <li><a href="/login.php">Accedi</a></li>
      <?php endif; ?>
      <?php if($nomepagina=="Registrazione.php"):?>
        <li><a href="/Registrazione.php" class="active">Registrati</a></li>
      <?php else:?>
        <li><a href="/Registrazione.php">Registrati</a></li>
      <?php endif; ?>
    <?php endif; ?>
      <li class="icon">
        <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
      </li>
    </ul>
  </div>
