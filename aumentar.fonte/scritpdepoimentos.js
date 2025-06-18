/* zoom de fonte - botões no canto inferior esquerdo
   =============================================================== */
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.querySelector('nav');
    if (nav) nav.style.position = 'relative';

    /* =====================  BOTÕES A+ / A-  ========================== */
    const estiloBase = {
        position: 'absolute',
        bottom: '40px',
        padding: '6px 10px',
        border: 'none',
        borderRadius: '5px',
        fontSize: '1rem',
        cursor: 'pointer',
        zIndex: 1000,
    };

    const btnMais  = document.createElement('button');
    btnMais.textContent = 'A+';
    Object.assign(btnMais.style, estiloBase, { left: '130px',  background: '#fff', color: '#000' });

    const btnMenos = document.createElement('button');
    btnMenos.textContent = 'A-';
    Object.assign(btnMenos.style, estiloBase, { left: '80px', background: '#fff', color: '#000' });

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
        if (e.key === '+' || (e.key === '=' && e.shiftKey)) {
            e.preventDefault(); ajustarFonte(2);
        }
        if (e.key === '-') {
            e.preventDefault(); ajustarFonte(-2);
        }
    });

    /* ------------------  inserir elementos no DOM  -------------------- */
    if (nav) {
        nav.append(btnMais, btnMenos);
    } else {
        btnMais .style.position = btnMenos.style.position = 'fixed';
        btnMais .style.bottom = btnMenos.style.bottom = '20px';
        btnMais .style.left   = '90px';
        btnMenos.style.left   = '30px';
        document.body.append(btnMais, btnMenos);
    }
});
