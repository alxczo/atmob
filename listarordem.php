<?php
session_start();

include("conexao1.php");
$conn=conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylelista.css">
    <link rel="shortcut icon" href="img/tec.png">
    <title>Lista de Ordens</title>
</head>
<body>

<header class="headerlog">
  <div id="header">
    <div id="logo">
      <img src="img/novalogo.png">
    </div>
  </div> 
</header>

    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        unset($_SESSION['msg']);

        if(isset($_SESSION['cadastrado'])):
    ?>

    <div class="notification is-danger">
        <p style="color:green">Ordem de serviço cadastrada com sucesso!</p>
    </div>

    <?php
        endif;
        unset($_SESSION['cadastrado']);
    ?>
    
    <?php
    $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);

    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    $limite_resultado = 15;

    $inicio = ($limite_resultado * $pagina) - $limite_resultado;

    $query_ordens = "SELECT clinome, cliemail, clifone, dia, marca, defeito, obs FROM ordens ORDER BY cliemail DESC LIMIT $inicio, $limite_resultado";
    $result_ordens = $conn->prepare($query_ordens);
    $result_ordens->execute();
    ?>

    <table border="1" cellspacing=0 cellpadding=0 width="80%" class="tabela">
    <h1 class="fonte">Lista de Ordens</h1>
        <tr>
            <th>Nome do cliente</th>
            <th>E-mail do cliente</th>
            <th>Telefone para contato</th>
            <th>Data de abertura</th>
            <th>Marca do aparelho</th>
            <th>Defeito do aparelho</th>
            <th>Observações</th>
        </tr>

        <?php
        if(($result_ordens) AND ($result_ordens->rowCount() != 0)){
            while($roworderns = $result_ordens->fetch(PDO::FETCH_ASSOC)){

                extract($roworderns);
                echo "<tr align=center>";
                    echo "<td>".$clinome."</td>";
                    echo "<td>".$cliemail."</td>";
                    echo "<td>".$clifone."</td>";
                    echo "<td>".$dia."</td>";
                    echo "<td>".$marca."</td>";
                    echo "<td>".$defeito."</td>";
                    echo "<td>".$obs."</td>";
                    echo "</tr>";
            }
        ?>

    </table>
    <br>
    <br>
    <br>
    <hr>

    <?php
    $query_qnt_registros = "SELECT COUNT(cliemail) AS num_result FROM ordens";
    $result_qnt_registros = $conn->prepare($query_qnt_registros);
    $result_qnt_registros->execute();
    $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

    $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado);

    $maximo_link = 2;

    echo "<a href='listarodem.php?page=1'>Primeira</a>";

    for($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++){

        if($pagina_anterior >= 1){
            echo "<a href='listarodem.php?page=$pagina_anterior'>$pagina_anterior</a>";
        }
    }
    echo "$pagina";

    for($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++){

        if($proxima_pagina <= $qnt_pagina){
            echo "<a href='listarodem.php?page=$proxima_pagina'>$proxima_pagina</a>";
        }
    }
    echo "<a href='listarodem.php?page=$qnt_pagina'>Última</a>";

}else{

    echo "<p style='color:red;'>Erro: OS não encontrada!</p>";
}

?>

</body>
</html>