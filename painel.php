<?php
session_start();

include('verifica_login.php');
?>

<div align="right">
    <h3>Olá, <?php echo $_SESSION['usuario']; ?></h3>
</div>

<nav align="right">
    <h3><a href="logout.php">Sair</a></h3>
</nav>