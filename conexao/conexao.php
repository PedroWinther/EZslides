<?php
$mysqli = new mysqli("localhost", "root", "" , "EZslides");
    if($mysqli->error){
        echo "falha ao conectar no banco de dados";
    }
?>