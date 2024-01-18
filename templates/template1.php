<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template 1</title>
    <link rel="stylesheet" href="cssTemplates/template1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Whisper&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div id="slideContainer">
        <div id="textPanel" class="hidden">
            <label for="textColor">Cor do Texto:</label>
            <input type="color" id="textColor">
            <br>
            <label for="textFont">Fonte do Texto:</label>
            <select id="textFont">
                <option value="Arial, sans-serif">Arial</option>
                <option value="Times New Roman, serif">Times New Roman</option>
                <option value="Courier New, monospace">Courier New</option>
                <option value="'Whisper', cursive">Whisper</option>
                <option value="'Roboto', sans-serif">Roboto</option>
            </select>
            <br>
            <label for="textSize">Tamanho da Fonte:</label>
            <input type="number" id="textSize" value="16" min="1">
            <br>
            <label for="textValue">Texto:</label>
            <textarea id="textValue"></textarea>
            <br>
            <button id="applyChanges">Aplicar Alterações</button>
            <button id="cancelChanges">Cancelar</button>
        </div>
        <p id="topText" class="editable-text">Clique para editar o texto acima da imagem</p>
        <img id="image" src="../imagens/placeholder.jpg" alt="Slide Image">
        <p id="sideText" class="editable-text">Clique para editar o texto ao lado da imagem</p>
    </div>
</div>
<button id="saveButton">Salvar Slide</button>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="salvar/template.js"></script>

</body>
</html>
