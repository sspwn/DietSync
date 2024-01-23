document.addEventListener("DOMContentLoaded", function (event) {

    const mostrarBarraNavegacao = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Valide se todas as variáveis existem
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // mostrar a barra de navegação
                nav.classList.toggle('show')
                // adicionar preenchimento ao corpo
                bodypd.classList.toggle('body-pd')
                // adicionar preenchimento ao cabeçalho
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    mostrarBarraNavegacao('header-toggle', 'nav-bar', 'body-pd', 'header')
});

    