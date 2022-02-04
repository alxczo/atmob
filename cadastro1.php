<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/stylecad.css">
  <link rel="shortcut icon" href="img/tec.png">
  <title>Técnica - Celulares e Assistência</title>
</head>

<body>
<section class="container">
<div class="logo">
   <a href="home.php"><img src="img/novalogo.png"></a>
</div>
<h2>Cadastre-se:</h2>

<?php
  if(isset($_SESSION['cadastrado'])):
?>
<div class="notification is-danger" align="center">
  <p style="color:blue">Cadastro feito com sucesso!</p>
</div>
<?php
  endif;
  unset($_SESSION['cadastrado']);
?>
<?php
  if(isset($_SESSION['nao_cadastrado'])):
?>
<div class="notification is-danger" align="center">
  <p style="color:#f00"> Erro: E-mail já cadastrado!</p>
</div>
<?php
  endif;
  unset($_SESSION['nao_cadastrado']);
?>

  <form name="cadusuarios" action="scriptcadastro1.php" method="POST" id="form-login">

        <div>
            Nome Completo: <label>*</label>
            <input type="text" name="nome" placeholder="Digite o seu nome completo" required>
        </div>
      
        <div>
          CPF: <label>*</label>
          <input type="text" name="cpf" placeholder="Digite o seu CPF" required>
        </div>

        <div>
          Nascimento:<label>*</label>
          <input type="date" name="nasc" required>
        </div>

        <Div>
            Email: <label>*</label>
            <input type="email" name="email" placeholder="Digite o seu e-mail" required>
        </Div>

        <div>
            Endereço: <label>*</label>
            <input type="text" name="endereco" placeholder="Digite o seu endereço" required>
        </div>

        <div>
            Bairro: <label>*</label>
            <input type="text" name="bairro" placeholder="Digite o seu bairro" required>
        </div>

        <div>
            Cidade: <label>*</label>
            <input type="text" name="cidade" placeholder="Digite o sua cidade" required>
        </div>

        <div>
          UF: <label>*</label>
          <select name="uf" required>
              <option value="1">Selecione o estado</option>
              <option value="2">SP</option>
              <option value="3">ES</option>
              <option value="4">GO</option>
              <option value="5">MA</option>
              <option value="6">MT</option>
              <option value="7">MS</option>
              <option value="8">MG</option>
              <option value="9">PA</option>
              <option value="10">PB</option>
              <option value="11">PR</option>
              <option value="12">PE</option>
              <option value="13">PI</option>
              <option value="14">RJ</option>
              <option value="15">RN</option>
              <option value="16">RS</option>
              <option value="17">RO</option>
              <option value="18">RR</option>
              <option value="19">SC</option>
              <option value="20">SE</option>
              <option value="21">TO</option>
              <option value="22">AM</option>
          </select>
        </div>

        <Div>
            Senha: <label>*</label>
            <input type="password" name="senha" placeholder="Digite uma senha" required>
        </Div>

    <br>
        <div class="botao">
          <button type="submit">Cadastrar</button>
          <br>
          <br>
          <button type="reset">Limpar</button>
        </div>
        <br>
        Já tem uma conta?
        <a href="login.php">
        faça o login aqui.
        </a>

  </form>
</section>

</body>
</html>