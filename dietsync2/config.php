<?php
$titulo = "Configurações";
$page = 'configuracoes';
include 'header.inc.php';
include 'menu.inc.php';
require_once 'usuario-cont.class.php';
$user = new UsuarioController();

// Verifique se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: index.php");
    exit();
}

// Verifica se o formulário foi enviado
if (isset($_GET['nova_senha']) && isset($_GET['confirmar_senha'])) {
    $novaSenha = $_GET['nova_senha'];
    $confirmarSenha = $_GET['confirmar_senha'];

    // Verifica se as senhas são iguais
    if ($novaSenha === $confirmarSenha) {
        // Chama o método para alterar a senha
        $novaSenha = password_hash(addslashes($_GET['nova_senha']), PASSWORD_BCRYPT);
        $id_user = $_SESSION['id'];
        $user->AlterarSenha($id_user, $novaSenha);
    }
}

// Obtém as informações do usuário logado (substitua pela lógica real)
$usuarioAtual = $user->ObterUsuario($_SESSION['id']);
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->AtualizarUsuario(
        $usuarioAtual['id'],
        $_POST['nome'],
        $_POST['sobrenome'],
        $_POST['meta'],
        $_POST['sexo'],
        $_POST['data_nasc'],
        $_POST['peso'],
        $_POST['altura'],
        $_POST['email']
    );
}
?>
<div class="container" id="main">
    <h1>Configurações do Sistema</h1>
    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuarioAtual['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $usuarioAtual['sobrenome']; ?>" required>
        </div>
        <?php if (isset($usuarioAtual['meta']) && !empty($usuarioAtual['meta'])) : ?>
            <div class="mb-3">
                <label for="meta" class="form-label">Meta</label>
                <input type="text" class="form-control" id="meta" name="meta" value="<?php echo $usuarioAtual['meta']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo" required>
                    <option value="Feminino" <?php echo ($usuarioAtual['sexo'] == 'Fem') ? 'selected' : ''; ?>>Feminino</option>
                    <option value="Masculino" <?php echo ($usuarioAtual['sexo'] == 'Mas') ? 'selected' : ''; ?>>Masculino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_nasc" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?php echo $usuarioAtual['data_nasc']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="peso" class="form-label">Peso (kg)</label>
                <input type="number" class="form-control" id="peso" name="peso" value="<?php echo $usuarioAtual['peso']; ?>" step="0.1" required>
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura (m)</label>
                <input type="number" class="form-control" id="altura" name="altura" value="<?php echo $usuarioAtual['altura']; ?>" step="0.01" required>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuarioAtual['email']; ?>" required>
        </div>
        <div class="d-flex bd-highlight mb-3">
            <div class="pt-2 bd-highlight"><button type="submit" class="btn btn-success">Salvar Alterações</button></div>
            <div class="ml-auto p-2 bd-highlight"> <a href="logout.php" class="btn btn-danger">Logout</a></div>
        </div>
    </form>

    <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Alterar Senha
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form class="px-4 py-3" id="senhaForm" method="get">
                    <div class="mb-3">
                        <label for="nova_senha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="nova_senha" name="nova_senha">
                    </div>
                    <div class="mb-3">
                        <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha">
                        <div id="senhaFeedback" class="invalid-feedback">As senhas não coincidem.</div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="verificarSenhas()">Salvar</button>
                </form>
            </div>
        </div>
</div>

<?php
include 'footer.inc.php'
?>
</body>

</html>