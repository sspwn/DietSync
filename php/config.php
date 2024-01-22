<?php
$titulo = "Configurações";
$page = 'configuracoes';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';

// Simulando dados do usuário (substitua com a lógica de autenticação real)
$usuarioAtual = [
    'id' => 1,
    'nome' => 'Gabriel Vaz Scremim',
    'meta' => 'Perder peso',
    'sexo' => 'Masculino',
    'data_nasc' => '1990-01-01',
    'peso' => 70,
    'altura' => 1.75,
    'email' => 'gabriel@example.com',
];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aqui você pode processar os dados do formulário e realizar as alterações no banco de dados
    // Suponha que os dados sejam alterados corretamente para este exemplo
    $mensagemSucesso = "Dados alterados com sucesso!";
}

?>

<div class="container" id="main">
    <h1>Configurações do Sistema</h1>

    <?php if (isset($mensagemSucesso)) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensagemSucesso; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuarioAtual['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="meta" class="form-label">Meta</label>
            <input type="text" class="form-control" id="meta" name="meta" value="<?php echo $usuarioAtual['meta']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo" required>
                <option value="Feminino" <?php echo ($usuarioAtual['sexo'] === 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                <option value="Masculino" <?php echo ($usuarioAtual['sexo'] === 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
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
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuarioAtual['email']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>
