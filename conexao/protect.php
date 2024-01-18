<?php
if(!isset($_SESSION)){
        session_start();
    }
if(!isset($_SESSION['id'])){
    die("você não tem acesso à essa página. <p><a href='login/index.php'>faça seu login</a></p>");
}
?>