/* zoom de fonte - botões no canto inferior direito
   =============================================================== */
document.addEventListener('DOMContentLoaded', () => {

    /* =====================  BOTÕES A+ / A-  ========================== */

    const estiloBase = {
        position: 'fixed',
        right: '20px',
        padding: '10px',
        border: 'none',
        borderRadius: '50%',
        fontSize: '1.2rem',
        cursor: 'pointer',
        background: 'white',
        color: '#210037',
        boxShadow: '0 4px 10px rgba(0,0,0,0.3)',
        transition: 'all .3s ease',
        zIndex: 1200,
    };

    const btnMais = document.createElement('button');
    btnMais.innerHTML = 'A+';
    Object.assign(btnMais.style, estiloBase, {
        bottom: '90px'   // acima do botão de inverter cor
    });

    const btnMenos = document.createElement('button');
    btnMenos.innerHTML = 'A-';
    Object.assign(btnMenos.style, estiloBase, {
        bottom: '140px'  // acima do A+
    });

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

    btnMais.onclick  = () => ajustarFonte(2);
    btnMenos.onclick = () => ajustarFonte(-2);

    /* ------------------  atalhos de teclado Ctrl+/-  ------------------ */
    document.addEventListener('keydown', e => {
        if (!e.ctrlKey) return;

        if (e.key === '+' || (e.key === '=' && e.shiftKey)) {
            e.preventDefault();
            ajustarFonte(2);
        }

        if (e.key === '-') {
            e.preventDefault();
            ajustarFonte(-2);
        }
    });

    /* ------------------  inserir elementos no DOM  -------------------- */
    document.body.append(btnMais, btnMenos);
});
