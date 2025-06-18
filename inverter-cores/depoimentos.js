document.addEventListener('DOMContentLoaded', () => {
    console.log('blackAndWhiteFilter.js carregado com sucesso para depoimentos.html');
    console.log('Posição do botão: Desktop (top: 120px, right: 10px), Tablet (top: 100px, right: 10px), Celular (top: 140px, right: 5px)');

    // Remover qualquer botão existente com o mesmo ID para evitar duplicatas
    const existingButton = document.getElementById('blackAndWhiteButton');
    if (existingButton) existingButton.remove();

    // Criar o botão com um ID único
    const button = document.createElement('button');
    button.id = 'blackAndWhiteButton';
    button.textContent = 'Ativar Filtro Preto e Branco';
    button.style.position = 'fixed';
    button.style.top = '120px'; // Exatamente como index.html, informacoes.html, sobre.html, recursos.html
    button.style.right = '10px';
    button.style.zIndex = '1000'; // Acima do header (z-index: 2) e menu hamburguer (z-index: 4)
    button.style.padding = '8px 12px';
    button.style.backgroundColor = '#fff'; // Cor do cabeçalho
    button.style.color = '#000';
    button.style.border = 'none';
    button.style.borderRadius = '10px'; // Consistente com o botão de denúncia
    button.style.fontSize = '1rem';
    button.style.fontWeight = 'bold';
    button.style.cursor = 'pointer';
    button.style.transition = 'all 0.3s ease-out';
    button.style.boxSizing = 'border-box'; // Garantir que padding não afete o tamanho

    // Efeito hover
    button.addEventListener('mouseover', () => {
        button.style.backgroundColor = '#af86ff'; // Cor consistente com outras páginas
        button.style.transform = 'scale(1.1)';
    });
    button.addEventListener('mouseout', () => {
        button.style.backgroundColor = '#210037';
        button.style.transform = 'scale(1)';
    });

    // Adicionar o botão ao body
    document.body.appendChild(button);

    // Estado inicial do filtro
    let isBlackAndWhite = false;

    // Função para alternar o filtro
    button.addEventListener('click', () => {
        isBlackAndWhite = !isBlackAndWhite;
        document.documentElement.style.filter = isBlackAndWhite ? 'grayscale(100%)' : 'none';
        button.textContent = isBlackAndWhite ? 'Desativar Filtro' : 'Ativar Filtro Preto e Branco';
    });

    // Ajustes de responsividade
    const updateButtonStyles = () => {
        if (window.innerWidth <= 480) {
            button.style.top = '140px'; // Exatamente como nas páginas com cabeçalho
            button.style.right = '5px';
            button.style.padding = '6px 10px';
            button.style.fontSize = '0.9rem';
        } else if (window.innerWidth <= 768) {
            button.style.top = '100px'; // Exatamente como nas páginas com cabeçalho
            button.style.right = '10px';
            button.style.padding = '7px 11px';
            button.style.fontSize = '0.95rem';
        } else {
            button.style.top = '120px'; // Desktop
            button.style.right = '10px';
            button.style.padding = '8px 12px';
            button.style.fontSize = '1rem';
        }
        console.log(`Posição atual do botão: top=${button.style.top}, right=${button.style.right}`);
    };

    // Aplicar estilos iniciais
    updateButtonStyles();

    // Atualizar estilos ao redimensionar a janela
    window.addEventListener('resize', updateButtonStyles);
});