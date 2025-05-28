// Controle de passos de aumento e diminuição
let passosFonte = 0;
const limiteMax = 5;
const limiteMin = -5;

// Função para ajustar tamanho da fonte
function ajustarFonte(valor) {
    const elementos = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, span, div, ul, ol, li, a');

    elementos.forEach(elemento => {
        const estilo = window.getComputedStyle(elemento);
        let tamanhoAtual = parseFloat(estilo.getPropertyValue('font-size'));

        if (!elemento.dataset.tamanhoOriginal) {
            elemento.dataset.tamanhoOriginal = tamanhoAtual;
        }

        let novoTamanho = tamanhoAtual + valor;

        if (valor > 0 && passosFonte < limiteMax) {
            elemento.style.fontSize = novoTamanho + 'px';
        } else if (valor < 0 && passosFonte > limiteMin) {
            elemento.style.fontSize = novoTamanho + 'px';
        }
    });

    passosFonte += valor > 0 ? 1 : -1;
}

// Função para criar os botões
function criarBotoesFonte() {
    const estiloBotao = `
        position: fixed;
        bottom: 20px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        z-index: 9999;
    `;

    const btnMais = document.createElement('button');
    btnMais.innerText = 'A+';
    btnMais.style = estiloBotao + 'right: 160px; background-color: #4CAF50; color: white;';
    btnMais.onclick = () => ajustarFonte(2);

    const btnMenos = document.createElement('button');
    btnMenos.innerText = 'A-';
    btnMenos.style = estiloBotao + 'right: 90px; background-color: #f44336; color: white;';
    btnMenos.onclick = () => ajustarFonte(-2);

    document.body.appendChild(btnMais);
    document.body.appendChild(btnMenos);
}

// Atalhos de teclado (Ctrl + e Ctrl -)
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === '+') {
        e.preventDefault();
        ajustarFonte(2);
    } else if (e.ctrlKey && e.key === '-') {
        e.preventDefault();
        ajustarFonte(-2);
    }
});

// Criar botões quando carregar
window.addEventListener('load', criarBotoesFonte);
