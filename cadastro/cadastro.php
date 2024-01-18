<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleForm.css">
    <title>form</title>
</head>
<body>
    <?php 
      if(isset($_POST['cadastro'])){
        include_once('../conexao/conexao.php');
        include('validacao.php');
        $username = $_POST['name'];
        $fullname = $_POST['fullname'];
        $cpf = $_POST['cpf'];
        $phone = $_POST['phone'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        // a senha de geral é 123456
        $sql = "INSERT INTO usuario (fullname,cpf,phone,username,pass) 
        VALUES 
        (
            '$fullname',
            '$cpf',
            '$phone',
            '$username',
            '$senha'
        )";
        $sqlQuery = $mysqli->query($sql);
        if($sqlQuery){
          echo "cadastrado";
          header("Location: ../login/index.php");
        }else{
          echo "erro no cadastro";
        }
        
      }
    ?>
<form class="form" method="post">
  <div class="title">Vamos criar uma conta!</div>
  <input class="input" name="fullname" placeholder="nome completo" type="text">
  <input class="input" name="cpf" placeholder="cpf" type="number">
  <input class="input" name="phone" placeholder="telefone" type="number">
  <input class="input" name="name" placeholder="nome de usuario" type="text">
  <input class="input" name="senha" placeholder="senha" type="password">
  <button class="button-confirm" type="submit" name="cadastro">Let`s go →</button>
  <a href="../login/index.php">Já tem uma conta?</a>
</form>
</body>
</html>
