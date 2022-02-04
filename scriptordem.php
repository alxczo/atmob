<?php
session_start();

include("conexao1.php");
$conn=conectar();

$clinome = $_POST['clinome'];
$cliemail = $_POST['cliemail'];
$clifone = $_POST['clifone'];
$dia = $_POST['dia'];
$marca = $_POST['marca'];
$defeito = $_POST['defeito'];
$obs = $_POST['obs'];

$cadcli = $conn->prepare("INSERT INTO ordens(clinome, cliemail, clifone, dia, marca, defeito, obs)
VALUES(:clinome, :cliemail, :clifone, :dia, :marca, :defeito, :obs)");

$cadcli->bindValue(":clinome",$clinome);
$cadcli->bindValue(":cliemail",$cliemail);
$cadcli->bindValue(":clifone",$clifone);
$cadcli->bindValue(":dia",$dia);
$cadcli->bindValue(":marca",$marca);
$cadcli->bindValue(":defeito",$defeito);
$cadcli->bindValue(":obs",$obs);

$verificar=$conn->prepare("SELECT * FROM ordens WHERE cliemail=?");
$verificar-> execute(array($cliemail));
if($verificar->rowCount()==0):

    $cadcli->execute();
else:
    echo "OS já cadastrada";
endif;

$row=$cadcli->rowCount();

if($row == 1){
    $_SESSION['cadastrado']=true;
    header('Location: ordem.php');
    exit();
}
?>
