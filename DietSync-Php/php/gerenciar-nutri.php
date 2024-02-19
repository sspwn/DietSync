<?php
$titulo = "Adicionar Nutricionista/Usuário";
$page = 'adicionar-nutricionista-usuario';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/usuario.cont.class.php';
require '../php/ajax/verificar_session.php';

$usuario = new Usuario("dietsync", "localhost", "root", "");

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se foi submetido o formulário para adicionar usuário
    if (isset($_POST["add_usuario"])) {
        // Obtém o termo de pesquisa inserido pelo usuário
        $termo_pesquisa = $_POST["termo_pesquisa"];

        // Obtém os usuários que correspondem ao termo de pesquisa
        $usuarios = $usuario->PesquisarUsuarios($termo_pesquisa);
    }
}


echo '<div class="container" id="main">
    <h1>Adicionar Usuário</h1>
    <!-- Formulário para pesquisar e adicionar usuário -->
    <form method="post">
        <div class="mb-3">
            <label for="termo_pesquisa" class="form-label">Pesquisar Usuário</label>
            <input type="text" class="form-control" id="termo_pesquisa" name="termo_pesquisa" placeholder="Digite o nome do usuário">
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>

    <!-- Lista de usuários encontrados ou todos os usuários -->
    <div class="mt-4">
        <h3>Resultados da Pesquisa</h3>
        <ul>
            <?php foreach ($usuarios as $u) : ?>
                <li><?= $u["name"] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>';
?>

<?php
include '../php/includes/footer.inc.php';
?>
</body>

</html>
