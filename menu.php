
<div class="header">
  <div class="header-picture"></div>
  <div class="header-title">
    <h1>Colli Euganei</h1>
    <h2>Natura e storia in digitale</h2>
  </div>
</div>

<div class="topnav-bar">
  <ul class="topnav">
    <li><a href="index.php" class="active">Home</a></li>
    <li class="dropdown"><a href="luoghi.php" class="active">Luoghi</a>
      <ul class="dropdown-content">
        <li><a href="gite.php">luogo1</a></li>
        <li><a href="gite.php">luogo1</a></li>
        <li><a href="gite.php">luogo1</a></li>
        <li><a href="gite.php">luogo1</a></li>
        <li><a href="gite.php">luogo1</a></li>
        <li><a href="gite.php">luogo1</a></li>
      </ul>
    <li><a href="gite.php">Gite</a></li>
    <li><a href="#about">About</a></li>

    <?php
	   if(isset($_SESSION['username'])) {
	  ?>
		<li><a href="view-account.php">Account</li>
	<?php
	}
	else {
		?>
		<li><a href="login.php">Accedi</li>
    <li><a href="Registrazione.php">Registrati</li>
		<?php
	}
	?>

      <li class="icon">
        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
      </li>
  </ul>
</div>
