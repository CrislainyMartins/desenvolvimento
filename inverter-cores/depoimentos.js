// Função para criar o botão e aplicar o filtro preto e branco
function toggleBlackAndWhiteFilter() {
    // Criar o botão dinamicamente
    const button = document.createElement('button');
    button.innerText = 'Ativar Filtro P&B';
    button.style.position = 'fixed';
    button.style.bottom = '20px';
    button.style.right = '20px';
    button.style.zIndex = '10000'; // Alto para ficar acima do menu e outros elementos
    button.style.padding = '10px 20px';
    button.style.backgroundColor = '#210037'; // Cor consistente com o tema do site
    button.style.color = '#fff';
    button.style.border = 'none';
    button.style.borderRadius = '5px';
    button.style.cursor = 'pointer';
    button.style.fontFamily = 'Arial, Helvetica, sans-serif';
    button.style.fontSize = '1rem';
    button.style.transition = 'all 0.3s ease-out';

    // Efeito hover para o botão
    button.addEventListener('mouseover', () => {
        button.style.backgroundColor = '#CFD8DC';
        button.style.color = '#000';
    });
    button.addEventListener('mouseout', () => {
        button.style.backgroundColor = '#210037';
        button.style.color = '#fff';
    });

    // Adicionar o botão ao body
    document.body.appendChild(button);

    // Estado inicial do filtro
    let isFilterActive = false;

    // Função para alternar o filtro
    button.addEventListener('click', () => {
        isFilterActive = !isFilterActive;
        if (isFilterActive) {
            document.documentElement.style.filter = 'grayscale(100%)';
            button.innerText = 'Desativar Filtro P&B';
        } else {
            document.documentElement.style.filter = 'none';
            button.innerText = 'Ativar Filtro P&B';
        }
    });
}

// Executar a função quando a página carregar
window.addEventListener('load', toggleBlackAndWhiteFilter);