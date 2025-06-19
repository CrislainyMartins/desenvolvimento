document.addEventListener('DOMContentLoaded', () => {
    console.log('blackAndWhiteFilter.js carregado com sucesso');

    // Criar o botão
    const button = document.createElement('button');
    button.textContent = '☾';
    button.style.position = 'absolute';
    button.style.top = '10px';
    button.style.left = '180px';
    button.style.zIndex = '1000';
    button.style.padding = '8px 12px';
    button.style.backgroundColor = 'white';
    button.style.color = '#000';
    button.style.border = 'none';
    button.style.borderRadius = '5px';
    button.style.fontSize = '1rem';
    button.style.fontWeight = 'bold';
    button.style.cursor = 'pointer';
    button.style.transition = 'all 0.3s ease-out';

    // Efeito hover
    //button.addEventListener('mouseover', () => {
    //    button.style.backgroundColor = '#af86ff';
       /* button.style.transform = 'scale(1.1)';*/
    //});
    //button.addEventListener('mouseout', () => {
     //   button.style.backgroundColor = '#210037';
      /*  button.style.transform = 'scale(1)';*/
    //});

    // Estado do filtro
    let isBlackAndWhite = false;

    button.addEventListener('click', () => {
        isBlackAndWhite = !isBlackAndWhite;
        document.documentElement.style.filter = isBlackAndWhite ? 'grayscale(100%)' : 'none';
        button.textContent = isBlackAndWhite ? '☀' : '☾';
    });

    // Responsividade
    const updateButtonStyles = () => {
        if (window.innerWidth <= 480) {
            button.style.top = '7px';
            button.style.left = '30px';
            button.style.padding = '6px 10px';
            button.style.fontSize = '0.9rem';
        } else if (window.innerWidth <= 768) {
            button.style.top = '10px';
            button.style.left = '60px';
            button.style.padding = '7px 11px';
            button.style.fontSize = '0.95rem';
        } else {
            button.style.top = '7px';
            button.style.left = '190px';
            button.style.padding = '6px 12px';
            button.style.fontSize = '1rem';
        }
    };

    // Procurar o <nav>
    const nav = document.querySelector('nav');

    if (nav) {
        nav.style.position = 'relative';
        nav.appendChild(button);
    } else {
        console.warn('Elemento <nav> não encontrado. Adicionando botão ao <body> como fallback.');
        button.style.position = 'fixed';
        button.style.top = '120px';
        button.style.left = '10px';
        document.body.appendChild(button);
    }

    updateButtonStyles();
    window.addEventListener('resize', updateButtonStyles);
});
