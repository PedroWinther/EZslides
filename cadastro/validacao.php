<?php
$username = $_POST['name'];
$sqlCode = "SELECT * FROM usuario WHERE username = '$username'";
$sqlQueryUsers = $mysqli->query($sqlCode);  
$numUsers = $sqlQueryUsers->num_rows;
if($numUsers != 0){
    die("esse username já está em uso");
}
?>