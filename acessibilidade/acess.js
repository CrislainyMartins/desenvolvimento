document.addEventListener("DOMContentLoaded", function () {
    const increaseFontBtn = document.getElementById("increase-font");
    const decreaseFontBtn = document.getElementById("decrease-font");
    const toggleThemeBtn = document.getElementById("toggle-theme");
    let currentFontSize = 16; // Tamanho inicial da fonte

    // Aumentar fonte
    increaseFontBtn.addEventListener("click", function () {
        if (currentFontSize < 24) {
            currentFontSize += 2;
            document.body.style.fontSize = '${currentFontSize}px';
        }
    });

    // Diminuir fonte
    decreaseFontBtn.addEventListener("click", function () {
        if (currentFontSize > 12) {
            currentFontSize -= 2;
            document.body.style.fontSize = '${currentFontSize}px';
        }
    });

    // Alternar tema
    toggleThemeBtn.addEventListener("click", function () {
        document.body.classList.toggle("dark-theme");
    });
});