<div class="header">
  <div class="header-picture"></div>
  <div class="header-title">
    <h1>Colli Euganei</h1>
    <h2>Natura e storia in digitale</h2>
  </div>
</div>
<div class="topnav-bar">
  <ul class="topnav">
    <li class="dropdown"><a href="index.html" class="active">Home</a>
      <ul class="dropdown-content">
        <li><a href="geografia.html">Geografia</a></li>
        <li><a href="clima.html">Clima</a></li>
        <li><a href="storia.html">Storia</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="luoghi.html">Luoghi</a>
      <ul class="dropdown-content">
        <li><a href="chiesette.html">7 Chiesette</a></li>
        <li><a href="catajo.html">Castello del Catajo</a></li>
        <li><a href="praglia.html">Abbazia di Praglia</a></li>
        <li><a href="carrareseeste.html">Castello carrarese di Este</a></li>
        <li><a href="lispida.html">Castello di Lispida</a></li>
        <li><a href="pelagio.html">Castello San Pelagio</a></li>
      </ul>
    </li>
    <li><a href="gite.html">Gite</a></li>
    <?php if(isset($_SESSION['username'])): ?>
      <li><a href="view-account.php">Account</a></li>
      <?php else: ?>
        <li><a href="login.php">Accedi</a></li>
        <li><a href="Registrazione.php">Registrati</a></li>
      <?php endif; ?>
      <li class="icon">
        <a href="javascript:void(0);" onclick="menuMobile()">&#9776;</a>
      </li>
    </ul>
  </div>
