// Funções para aumentar e diminuir as fontes
function aumentarFonte() {
  var body = document.body;
  var currentFontSize = window.getComputedStyle(body).fontSize;
  var newFontSize = parseFloat(currentFontSize) * 1.1 + "px"; // Aumenta 10%
  body.style.fontSize = newFontSize;
}

function diminuirFonte() {
  var body = document.body;
  var currentFontSize = window.getComputedStyle(body).fontSize;
  var newFontSize = parseFloat(currentFontSize) * 0.9 + "px"; // Diminui 10%
  body.style.fontSize = newFontSize;
}

// Adiciona os botões de aumentar e diminuir a fonte ao DOM
window.onload = function() {
  // Cria os botões
  var aumentarBtn = document.createElement("button");
  aumentarBtn.innerText = "Aumentar Fonte";
  aumentarBtn.onclick = aumentarFonte;

  var diminuirBtn = document.createElement("button");
  diminuirBtn.innerText = "Diminuir Fonte";
  diminuirBtn.onclick = diminuirFonte;

  // Estiliza os botões (opcional)
  aumentarBtn.style.position = "fixed";
  aumentarBtn.style.bottom = "10px";
  aumentarBtn.style.left = "10px";
  aumentarBtn.style.padding = "10px";
  aumentarBtn.style.fontSize = "16px";

  diminuirBtn.style.position = "fixed";
  diminuirBtn.style.bottom = "10px";
  diminuirBtn.style.left = "150px";
  diminuirBtn.style.padding = "10px";
  diminuirBtn.style.fontSize = "16px";

  // Adiciona os botões ao corpo da página
  document.body.appendChild(aumentarBtn);
  document.body.appendChild(diminuirBtn);
};

// Funções do carrossel - Isoladas do controle de fontes
(function() {
  let slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  window.plusSlides = function(n) {
    showSlides(slideIndex += n);
  };

  // Thumbnail image controls
  window.currentSlide = function(n) {
    showSlides(slideIndex = n);
  };

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
})();
