<?php
session_start();

include("conexao1.php");
$conn=conectar();

if(empty($_POST['email']) || empty($_POST['senha'])){
    header("Location: home.php");
    exit();
}

$email = $_POST['email'];
$senha = MD5 ($_POST['senha']);

$query = $conn->prepare("SELECT * FROM usuario WHERE email = :e and senha = :s");

$query->bindValue(":e", $email);
$query->bindValue(":s", $senha);

$query->execute();

$row=$query->rowCount();

echo $row;

if($row == 1){
    $_SESSION['usuario'] = $email;
    header('Location: login.php');
    exit();
}

?>