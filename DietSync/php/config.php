<?php
$titulo = "Configurações";
$page = 'configuracoes';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/usuario-cont.class.php';
$user = new UsuarioController();

// Verifique se o usuário está logado
if (!isset($_SESSION['name'])) {
    // Se não estiver logado, redirecione para a página de login
    header("Location: index.php");
    exit();
}

// Obtém as informações do usuário logado (substitua pela lógica real)
$usuarioAtual = $user->ObterUsuario($_SESSION['name']);
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->AtualizarUsuario(
        $usuarioAtual['id'],
        $_POST['nome'],
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
        <?php if(isset($usuarioAtual['meta']) && !empty($usuarioAtual['meta'])): ?>
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
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
    <p>&nbsp;</p>
    <a href="..\classes\utils\logout.php" class="btn btn-danger">Logout</a>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>
