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

function verificarSenhas() {
    var senha = document.getElementById('nova_senha').value;
    var confirmarSenha = document.getElementById('confirmar_senha').value;
    var senhaFeedback = document.getElementById('senhaFeedback');

    if (senha !== confirmarSenha) {
        senhaFeedback.style.display = 'block';
        document.getElementById('nova_senha').classList.add('is-invalid');
        document.getElementById('confirmar_senha').classList.add('is-invalid');
    } else {
        senhaFeedback.style.display = 'none';
        document.getElementById('nova_senha').classList.remove('is-invalid');
        document.getElementById('confirmar_senha').classList.remove('is-invalid');
        // Aqui você pode adicionar o código para enviar o formulário ou fazer outra coisa após a verificação bem-sucedida
    }
}

    