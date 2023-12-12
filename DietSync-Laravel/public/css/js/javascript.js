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

    // Função para verificar a visibilidade com base na seleção de serviço
    function checarVisibilidade() {
        var selectedService = document.querySelector('input[name="nome_servico"]:checked');
        var PatrimonioContainer = document.getElementById('PatrimonioContainer');
        
        if (selectedService && selectedService.getAttribute('data-patrimonio') === 'Sim') {
            PatrimonioContainer.classList.remove('invisible');
        } else {
            PatrimonioContainer.classList.add('invisible');
        }
    }

    // Adicione um evento 'change' para o elemento de serviço para verificar a visibilidade
    var serviceInputs = document.querySelectorAll('input[name="nome_servico"]');
    serviceInputs.forEach(function(input) {
        input.addEventListener('change', checarVisibilidade);
    });

    // Verifique a visibilidade inicialmente quando a página carregar
    checarVisibilidade();

    