<!DOCTYPE html>
<html>
<head>
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="styleForm.css">
</head>
<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_POST['login'])){
        include_once('../conexao/conexao.php');
        $loginForm = $mysqli->real_escape_string($_POST['username']);
        $senhaForm = $mysqli->real_escape_string($_POST['password']);
        $sqlCode = "SELECT * FROM usuario WHERE username = '$loginForm' LIMIT 1";
        $sqlQuery = $mysqli->query($sqlCode) or die("falha na execução");
        $quantidade = $sqlQuery->num_rows;
        if($quantidade > 0){
            $usuario = $sqlQuery->fetch_assoc();
            if(password_verify($senhaForm,$usuario['pass'])){
            $_SESSION['id'] = $usuario['idUsuario'];
            $_SESSION['nome'] = $usuario['fullname'];
            header('Location: ../home.php');
            }else{
                echo 'senha incorreta';
            }
        }else{
            echo 'nome de usuário não existe';
        }
    }
    include('formLogin.php');
?>
</body>
</html>
