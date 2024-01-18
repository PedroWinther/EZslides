<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styleHome.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
</head>
<body>
<body>
    <?php
    include("conexao/protect.php");
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['logout'])){
        unset($_SESSION['login']);
        session_destroy();
        header('Location: login/index.php');
    }
    ?>
    <header>
        <h1>Bem vindo, <?= $_SESSION['nome']?></h1>
        <a href='?logout'>fazer logout</a>
    </header>
            <main>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <h3 style="padding: 4vh; margin-left: 2vw; color: #666; font-weight: bold">Meus Slides</h3>
                            <div class="container text-center">
                            <?php
                                include_once('conexao/conexao.php');   
                                
                                $id = $_SESSION['id'];
                                $sqlCode = "SELECT imageUrl FROM slides WHERE userId = ?";
                                $stmt = $mysqli->prepare($sqlCode);
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $stmt->close();
                                $i = 0;
                                
                                if ($result->num_rows > 0) {
                                    while ($slideData = $result->fetch_assoc()) {
                                        if ($i % 2 == 0) {
                                            echo "<div class='row'>";
                                        }
                                        $img = $slideData['imageUrl'];
                                        echo "<div class='col'>";
                                        echo "<a href='#'><img src='$img' class='d-block w-100' alt='Slide'></a>";
                                        echo "</div>";
                                        if ($i % 2 != 0) {
                                            echo "</div>";
                                        }
                                        $i++;
                                    }
                                    if ($i % 2 != 0) {
                                        echo "</div>";
                                    }
                                } else {
                                    echo "Nenhum slide encontrado.";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col">
                        <h3 style="padding: 4vh; margin-left: 2vw; color: #666; font-weight: bold">Templates</h3>
                        <div class="container text-center">
                            <div class="row">
                                <span class="col">
                                    <a href="templates/template1.php"><img style="height: 175px;" src="imagens/template 1.jpeg" class="d-block w-100" alt="slide1"></a>
                                    </span>
                                <span class="col">
                                    <a href="templates/template2.php"><img style="height: 175px;" src="imagens/template 2.jpeg" class="d-block w-100" alt="Slide2"></a>
                                </span>
                            </div>
                            <div class="row">
                                <span class="col">
                                    <a href="templates/template3.php"><img style="height: 175px;" src="imagens/template 3.jpeg" class="d-block w-100" alt="slide1"></a>
                                </span>
                                <span class="col">
                                    <a href="templates/template4.php"><img style="height: 175px;" src="imagens/template 4.jpeg" class="d-block w-100" alt="Slide2"></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </main>
            <footer>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            </footer>
</body>
</html>