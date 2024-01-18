document.getElementById('textSize').addEventListener('input', function (event) {
    if (event.inputType !== 'deleteContentBackward') {
        applyChanges();
    }
});

document.getElementById('topText').addEventListener('click', function () {
    showTextPanel(this);
});

document.getElementById('sideText').addEventListener('click', function () {
    showTextPanel(this);
});

document.getElementById('applyChanges').addEventListener('click', applyChanges);
document.getElementById('cancelChanges').addEventListener('click', cancelChanges);

document.getElementById('image').addEventListener('click', function () {
    var newImageURL = prompt('Digite a URL da nova imagem:');
    if (newImageURL) {
        this.src = newImageURL;
    }
});

function showTextPanel(element) {
    document.getElementById('textPanel').classList.remove('hidden');

    document.getElementById('textColor').value = element.style.color;
    document.getElementById('textFont').value = getComputedStyle(element).fontFamily;
    document.getElementById('textSize').value = parseInt(getComputedStyle(element).fontSize);
    document.getElementById('textValue').value = element.innerText;

    activeElement = element;
}

function applyChanges() {
    var textColor = document.getElementById('textColor').value;
    var textFont = document.getElementById('textFont').value;
    var textSize = document.getElementById('textSize').value + 'px';
    var textValue = document.getElementById('textValue').value;

    activeElement.style.color = textColor;
    activeElement.style.fontFamily = textFont;
    activeElement.style.fontSize = textSize;
    activeElement.innerText = textValue;
}

function cancelChanges() {
    document.getElementById('textPanel').classList.add('hidden');
}

var activeElement = null;

function saveSlideToDatabase() {
    var topText = document.getElementById('topText').innerText;
    var sideText = document.getElementById('sideText').innerText;
    var imageUrl = document.getElementById('image').src;
    var data = {
        topText: topText,
        sideText: sideText,
        imageUrl: imageUrl
    };
    $.ajax({
        url: 'salvar/salvarSlide.php',
        type: 'POST',
        data: {data: JSON.stringify(data)},
        success: function(result){
          console.log("sucesso no fetch")
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("não")
        }
      });
    
}
document.getElementById('saveButton').addEventListener('click', saveSlideToDatabase);

