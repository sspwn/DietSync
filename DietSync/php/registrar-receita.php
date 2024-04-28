<?php
$page = 'registrar-receitas';
$titulo = isset($_GET['id_receitas_editar']) ? "Editar Receita" : "Registrar Receita";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/receitas-cont.class.php';
$receita = new ReceitasController();

$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome_receita'])) {
        $nome_receita = $_POST['nome_receita'];
        $ingredientes_json = explode(',', $_POST['ingredientes']);
        $ingredientes = json_encode($ingredientes_json);
        $modo_preparo = $_POST['modo_preparo'];
        $calorias = $_POST['calorias'];
        $proteinas = $_POST['proteinas'];
        $carboidratos = $_POST['carboidratos'];
        $gordura = $_POST['gordura'];

        if (isset($_GET['id_receitas_editar'])) {
            // Você está editando uma receita
            $id_receita = $_GET['id_receitas_editar'];
            $receita->EditarReceita($id_receita, $nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura);
        } else {
            // Você está registrando uma nova receita
            $receita->RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura, $user_id);
        }
    }
}

// Verifique se o parâmetro 'id_receitas_editar' está presente na URL
if (isset($_GET['id_receitas_editar'])) {
    $id_receita_editar = $_GET['id_receitas_editar'];
    $dados_receita = $receita->buscarReceita($id_receita_editar);

    if ($dados_receita) {
        // Preencha os campos do formulário com os dados da receita
        $id_receita = $dados_receita[0]['id_receitas'];
        $nome_receita = $dados_receita[0]['nome_receita'];
        $ingredientes = implode(', ', json_decode($dados_receita[0]['ingredientes'], true));
        $modo_preparo = $dados_receita[0]['modo_preparo'];
        $calorias = $dados_receita[0]['calorias'];
        $proteinas = $dados_receita[0]['proteinas'];
        $carboidratos = $dados_receita[0]['carboidratos'];
        $gordura = $dados_receita[0]['gordura'];
    } else {
        $erro = "Receita não encontrada.";
    }
}
?>

<div class="container" id="main">
    <?php if (isset($_GET['id_receitas_editar'])) : ?>
        <h1>Editar Receita</h1>
    <?php else : ?>
        <h1>Registrar Receita</h1>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="nome_receita" class="form-label">Nome da Receita</label>
            <input type="text" class="form-control" id="nome_receita" name="nome_receita" value="<?php echo isset($nome_receita) ? $nome_receita : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes (separados por vírgulas)</label>
            <textarea class="form-control" id="ingredientes" name="ingredientes" rows="4"><?php echo isset($ingredientes) ? $ingredientes : ''; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="modo_preparo" class="form-label">Modo de Preparo</label>
            <textarea class="form-control" id="modo_preparo" name="modo_preparo" rows="4"><?php echo isset($modo_preparo) ? $modo_preparo : ''; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="calorias" class="form-label">Calorias</label>
            <input type="number" class="form-control" id="calorias" name="calorias" value="<?php echo isset($calorias) ? $calorias : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="proteinas" class="form-label">Proteínas</label>
            <input type="number" class="form-control" id="proteinas" name="proteinas" value="<?php echo isset($proteinas) ? $proteinas : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="carboidratos" class="form-label">Carboidratos</label>
            <input type="number" class="form-control" id="carboidratos" name="carboidratos" value="<?php echo isset($carboidratos) ? $carboidratos : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="gordura" class="form-label">Gordura</label>
            <input type="number" class="form-control" id="gordura" name="gordura" value="<?php echo isset($gordura) ? $gordura : ''; ?>">
        </div>
        <button type="submit" class="btn btn-success mb-5"><?php echo isset($_GET['id_receitas_editar']) ? 'Editar' : 'Registrar'; ?></button>
    </form>
</div>