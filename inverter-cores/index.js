document.addEventListener('DOMContentLoaded', () => {
    console.log('blackAndWhiteFilter.js carregado com sucesso');

    // Criar o botão
    const button = document.createElement('button');
    button.textContent = '🌙';
    button.style.position = 'fixed';
    button.style.bottom = '20px';
    button.style.right = '20px';
    button.style.zIndex = '1000';
    button.style.padding = '14px';
    button.style.backgroundColor = 'white';
    button.style.color = '#000';
    button.style.border = 'none';
    button.style.borderRadius = '50%';
    button.style.fontSize = '1.4rem';
    button.style.cursor = 'pointer';
    button.style.boxShadow = '0 4px 12px rgba(0,0,0,0.3)';
    button.style.transition = 'all 0.3s ease-out';

    // Estado do filtro
    let isBlackAndWhite = false;

    button.addEventListener('click', () => {
        isBlackAndWhite = !isBlackAndWhite;

        document.documentElement.style.filter = 
            isBlackAndWhite ? 'grayscale(100%)' : 'none';

        // Ícones
        button.textContent = isBlackAndWhite ? '☀️' : '🌙';

        // Estética do botão no modo ativo
        if (isBlackAndWhite) {
            button.style.backgroundColor = '#1b1b1b';
            button.style.color = '#fff';
            button.style.boxShadow = '0 0 15px rgba(255,255,255,0.4)';
            button.style.transform = 'scale(1.05)';
        } else {
            button.style.backgroundColor = 'white';
            button.style.color = '#000';
            button.style.boxShadow = '0 4px 12px rgba(0,0,0,0.3)';
            button.style.transform = 'scale(1)';
        }
    });

    // Responsividade
    const updateButtonStyles = () => {
        if (window.innerWidth <= 480) {
            button.style.padding = '10px';
            button.style.fontSize = '1.2rem';
            button.style.bottom = '15px';
            button.style.right = '15px';
        } else if (window.innerWidth <= 768) {
            button.style.padding = '12px';
            button.style.fontSize = '1.3rem';
        } else {
            button.style.padding = '14px';
            button.style.fontSize = '1.4rem';
        }
    };

    document.body.appendChild(button);

    updateButtonStyles();
    window.addEventListener('resize', updateButtonStyles);
});
