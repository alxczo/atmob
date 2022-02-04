<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styleordem.css">
        <link rel="shortcut icon" href="img/tec.png">
        <title>Técnica - Celulares e Assistência</title>
    </head>

    <body>
    <section class="container">
    <div class="logo">
            <a href="home.php"><img src="img/novalogo.png"></a>
    </div>
    <h2>OS:</h2>
    
    <?php
        if(isset($_SESSION['cadastrado'])):
    ?>
    <?php
        endif;
        unset($_SESSION['cadastrado']);
    ?>
    <form name="ordens" action="scriptordem.php" method="POST" id="form-login">
        <div>
            Nome do cliente: <label>*</label>
            <input type="text" name="clinome" placeholder="Informe o nome do cliente" required>
        </div>
        <div>
            Email do cliente: <label>*</label>
            <input type="email" name="cliemail" placeholder="Informe o email do cliente" required>
        </div>
        <div>
            Telefone para contato: 
            <input type="number" name="clifone" placeholder="Informe o numero do cliente">
        </div>
        <div>
            Data de abertura: <label>*</label>
            <input type="date" name="dia" required>
        </div>
        <div>
            Informe a marca do aparelho: <label>*</label>
            <select name="marca" required>
                <option value="">Selecione</option>
                <option value="Samsung">Samsung</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="Apple">Apple</option>
                <option value="Motorola">Motorola</option>
                <option value="Asus">Asus</option>
                <option value="LG">LG</option>
                <option value="Huawei">Huawei</option>
                <option value="Nokia">Nokia</option>
            </select>
        </div>
        <div>
        Informe o defeito do aparelho: <label>*</label>
            <select name="defeito" required>
                <option value="">Defeito do aparelho</option>
                <option value="Não liga">Não liga</option>
                <option value="Tela quebrada">Tela quebrada</option>
                <option value="Não aparece imagem">Não aparece imagem</option>
                <option value="Tela com manchas">Tela com manchas</option>
                <option value="Touch screen quebrado">Touch screen quebrado</option>
                <option value="Celular molhou">Celular molhou</option>
                <option value="Não funciona wi-fi">Não funciona Wi-fi</option>
                <option value="Camera não funciona">Camera não funciona</option>
                <option value="Botão home com defeito">Botão home com defeito</option>
                <option value="Botão ligar com defeito">Botão de ligar com defeito</option>
                <option value="Botão volume com defeito">Botão de volume com defeito</option>
                <option value="Carregador não funciona">Carregador não funciona</option>
                <option value="Desliga sozinho">Desliga sozinho</option>
                <option value="Não reconhece o chip">Não reconhece o chip</option>
                <option value="Descarrega rápido">Descarrega rápido</option>
                <option value="Sem áudio">Sem áudio</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        <div>
            Observações:
            <input type="text" name="obs" placeholder="Fale mais sobre o problema">
        </div>
        <br>
          <button type="submit">Cadastrar</button>
          <br><br>
          <button type="reset">Limpar</button>
    </form>
    </body>
</html>