<?php
include('../../conexao/conexao.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_POST['data'])){
    $usuario = json_decode($_POST['data'], true);
    
     // Aqui você pode usar as informações do usuário como quiser
    $topText = $usuario['topText'];
    $sideText = $usuario['sideText'];
    $imageUrl = $usuario['imageUrl'];

    $query = "INSERT INTO slides (userId,topText, sideText, imageUrl) VALUES (?, ?, ?, ?)";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("isss", $_SESSION['id'], $topText, $sideText, $imageUrl);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
}
?>
