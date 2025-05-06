document.addEventListener('DOMContentLoaded', () => {
    console.log('blackAndWhiteFilter.js carregado com sucesso'); // Verificar se o script está carregando

    // Criar o botão
    const button = document.createElement('button');
    button.textContent = 'Ativar Filtro Preto e Branco';
    button.style.position = 'fixed';
    button.style.top = '120px'; // Ajustado para ficar mais abaixo no desktop
    button.style.right = '10px';
    button.style.zIndex = '1000'; // Maior que o z-index do header (2) e menu hamburguer (4)
    button.style.padding = '8px 12px';
    button.style.backgroundColor = '#210037'; // Cor do cabeçalho
    button.style.color = '#fff';
    button.style.border = 'none';
    button.style.borderRadius = '10px'; // Consistente com o botão de denúncia
    button.style.fontSize = '1rem';
    button.style.fontWeight = 'bold';
    button.style.cursor = 'pointer';
    button.style.transition = 'all 0.3s ease-out';

    // Efeito hover para combinar com o estilo do site
    button.addEventListener('mouseover', () => {
        button.style.backgroundColor = '#af86ff'; // Cor do content1 para destaque
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
            button.style.top = '140px'; // Ajustado para celular
            button.style.right = '5px';
            button.style.padding = '6px 10px';
            button.style.fontSize = '0.9rem';
        } else if (window.innerWidth <= 768) {
            button.style.top = '100px'; // Ajustado para tablet
            button.style.right = '10px';
            button.style.padding = '7px 11px';
            button.style.fontSize = '0.95rem';
        } else {
            button.style.top = '120px'; // Ajustado para desktop
            button.style.right = '10px';
            button.style.padding = '8px 12px';
            button.style.fontSize = '1rem';
        }
    };

    // Aplicar estilos iniciais
    updateButtonStyles();

    // Atualizar estilos ao redimensionar a janela
    window.addEventListener('resize', updateButtonStyles);
});