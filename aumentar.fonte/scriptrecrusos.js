// Variável de controle para limitar aumento/diminuição
let passosFonte = 0;
const limiteMax = 5; // até +10px (5 passos)
const limiteMin = -5; // até -10px (5 passos)

// Função para ajustar a fonte
function ajustarFonte(valor) {
    const elementos = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, span, div, ul, ol, li, a');

    elementos.forEach(elemento => {
        const estilo = window.getComputedStyle(elemento);
        let tamanhoAtual = parseFloat(estilo.getPropertyValue('font-size'));

        // Salvar tamanho original caso não exista
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

    // Atualiza o contador de passos
    passosFonte += valor > 0 ? 1 : -1;
}

// Cria os botões dinamicamente
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

    // Aumentar
    const btnMais = document.createElement('button');
    btnMais.innerText = 'A+';
    btnMais.style = estiloBotao + 'right: 160px; background-color: #4CAF50; color: white;';
    btnMais.onclick = () => ajustarFonte(2);

    // Diminuir
    const btnMenos = document.createElement('button');
    btnMenos.innerText = 'A-';
    btnMenos.style = estiloBotao + 'right: 90px; background-color: #f44336; color: white;';
    btnMenos.onclick = () => ajustarFonte(-2);

    document.body.appendChild(btnMais);
    document.body.appendChild(btnMenos);
}

// Atalhos de teclado
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === '+') {
        e.preventDefault();
        ajustarFonte(2);
    } else if (e.ctrlKey && e.key === '-') {
        e.preventDefault();
        ajustarFonte(-2);
    }
});

// Garante que os botões sejam criados quando a página estiver carregada
window.addEventListener('load', criarBotoesFonte);
