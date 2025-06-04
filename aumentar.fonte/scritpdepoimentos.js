/* blackAndWhiteFilter + zoom de fonte
   =============================================================== */
document.addEventListener('DOMContentLoaded', () => {
    /* ------------------------------------------------------------------
       Referência ao <nav> e garantia de que ele seja o “pai” posicionado
    ------------------------------------------------------------------ */
    const nav = document.querySelector('nav');
    if (nav) nav.style.position = 'relative';   // referência para os absolutes

    /* =========================  BOTÃO FILTRO  ========================= */
    const filtroBtn = document.createElement('button');
    filtroBtn.textContent = 'Ativar filtro preto e branco';
    Object.assign(filtroBtn.style, {
        position: 'absolute',
        top: '10px',
        right: '180px',
        padding: '8px 12px',
        background: '#210037',
        color: '#fff',
        border: 'none',
        borderRadius: '10px',
        fontSize: '1rem',
        fontWeight: 'bold',
        cursor: 'pointer',
        transition: 'all .3s ease',
        zIndex: 1000,
    });
    filtroBtn.onmouseover = () => {
        filtroBtn.style.background = '#af86ff';
        filtroBtn.style.transform = 'scale(1.1)';
    };
    filtroBtn.onmouseout  = () => {
        filtroBtn.style.background = '#210037';
        filtroBtn.style.transform = 'scale(1)';
    };
    let filtroLigado = false;
    filtroBtn.onclick = () => {
        filtroLigado = !filtroLigado;
        document.documentElement.style.filter = filtroLigado ? 'grayscale(100%)' : 'none';
        filtroBtn.textContent = filtroLigado ? '☀' : '☾';
    };

    /* =====================  BOTÕES A+ / A-  ========================== */
    const estiloBase = {
        position: 'absolute',
        bottom: '10px',
        padding: '6px 10px',
        border: 'none',
        borderRadius: '5px',
        fontSize: '1rem',
        cursor: 'pointer',
        zIndex: 1000,
    };

    const btnMais  = document.createElement('button');
    btnMais.textContent = 'A+';
    Object.assign(btnMais.style, estiloBase, { right: '90px',  background: '#4CAF50', color: '#fff' });

    const btnMenos = document.createElement('button');
    btnMenos.textContent = 'A-';
    Object.assign(btnMenos.style, estiloBase, { right: '30px', background: '#f44336', color: '#fff' });

    /* ----------   lógica de aumento/diminuição de fonte   ------------ */
    let passosFonte = 0;
    const LIM_MAX = 5, LIM_MIN = -5;
    function ajustarFonte(deltaPx) {
        if ((deltaPx > 0 && passosFonte >= LIM_MAX) ||
            (deltaPx < 0 && passosFonte <= LIM_MIN)) return;

        document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, span, ul, ol, li, a, div')
                .forEach(el => {
                    const cur = parseFloat(getComputedStyle(el).fontSize);
                    el.style.fontSize = (cur + deltaPx) + 'px';
                });
        passosFonte += deltaPx > 0 ? 1 : -1;
    }
    btnMais .onclick = () => ajustarFonte( 2);
    btnMenos.onclick = () => ajustarFonte(-2);

    /* ------------------  atalhos de teclado Ctrl+/-  ------------------ */
    document.addEventListener('keydown', e => {
        if (!e.ctrlKey) return;
        if (e.key === '+') { e.preventDefault(); ajustarFonte( 2); }
        if (e.key === '-') { e.preventDefault(); ajustarFonte(-2); }
    });

    /* ================  responsividade do botão filtro  ================ */
    function reajustarFiltro() {
        if (innerWidth <= 480)      filtroBtn.style.right = '140px';
        else if (innerWidth <= 768) filtroBtn.style.right = '160px';
        else                        filtroBtn.style.right = '180px';
    }
    window.addEventListener('resize', reajustarFiltro);
    reajustarFiltro();

    /* ------------------  inserir elementos no DOM  -------------------- */
    if (nav) {
        nav.append(filtroBtn, btnMais, btnMenos);
    } else {                       // fallback: joga no body em posição fixed
        filtroBtn.style.position = btnMais.style.position = btnMenos.style.position = 'fixed';
        filtroBtn.style.top  = '120px';
        btnMais .style.bottom = btnMenos.style.bottom = '20px';
        btnMais .style.right  = '160px';
        btnMenos.style.right  = '90px';
        document.body.append(filtroBtn, btnMais, btnMenos);
    }
});
