<?php
session_start();

include("conexao1.php");
$conn=conectar();

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nasc = $_POST['nasc'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$senha = MD5($_POST['senha']);

$cadastro = $conn->prepare("INSERT INTO usuario(nome, cpf, nasc, email, endereco, bairro, cidade, uf, senha)
VALUES(:nome, :cpf, :nasc, :email, :endereco, :bairro, :cidade, :uf, :senha)");

$cadastro->bindValue(":nome", $nome);
$cadastro->bindValue(":cpf", $cpf);
$cadastro->bindValue(":nasc", $nasc);
$cadastro->bindValue(":email", $email);
$cadastro->bindValue(":endereco", $endereco);
$cadastro->bindValue(":bairro", $bairro);
$cadastro->bindValue(":cidade", $cidade);
$cadastro->bindValue(":uf", $uf);
$cadastro->bindValue(":senha", $senha);

$verificar=$conn->prepare("SELECT * FROM usuario WHERE email=?");
$verificar-> execute(array($email));
if($verificar->rowCount()==0):

    $cadastro->execute();
else:
    echo "E-mail já cadastrado";
endif;

$row=$cadastro->rowCount();

if($row == 1){
    $_SESSION['cadastrado']=true;
    header('Location: cadastro1.php');
    exit();
}
?>