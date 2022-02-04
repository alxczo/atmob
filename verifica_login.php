<?php
if(!$_SESSION['usuario']){
    header("Location: home.php");
    exit();
}
?>