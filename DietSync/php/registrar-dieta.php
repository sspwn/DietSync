<?php
$titulo = "Registrar Dieta";
$page = "registrar-dieta";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/dieta-cont.class.php';
require_once '../classes/controller/usuario-cont.class.php';
$dieta = new DietaController();
$user_id = $_SESSION['id'];

// Verifique se o parâmetro 'id_dieta_editar' está presente na URL
if (isset($_GET['id_editar_dieta'])) {
    $id_editar_dieta = $_GET['id_editar_dieta'];

    // Buscar os dados da dieta
    $dados_dieta = $dieta->DadosEditarDieta($id_editar_dieta);

    // Verificar se a dieta foi encontrada
    if ($dados_dieta) {
        // Atribuir os dados da dieta às variáveis
        $nome_dieta = $dados_dieta[0]['nome_dieta'];
        $tipo_dieta = $dados_dieta[0]['tipo_dieta'];
        $calorias = $dados_dieta[0]['calorias'];
        $proteinas = $dados_dieta[0]['proteinas'];
        $carboidratos = $dados_dieta[0]['carboidratos'];
        $gorduras = $dados_dieta[0]['gorduras'];
        $data_dieta = $dados_dieta[0]['data_dieta'];
        $refeicao = $dados_dieta[0]['refeicao'];
        $alimentos = $dados_dieta[0]['alimentos'];
        $alimentos = implode(', ', json_decode($dados_dieta[0]['alimentos'], true));
        $quantidade = $dados_dieta[0]['quantidade'];
        $observacoes = $dados_dieta[0]['observacoes'];
    } else {
        echo "Dieta não encontrada.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_dieta = $_POST['nome_dieta'];
    $tipo_dieta = $_POST['tipo_dieta'];
    $calorias = $_POST['calorias'];
    $proteinas = $_POST['proteinas'];
    $carboidratos = $_POST['carboidratos'];
    $gorduras = $_POST['gorduras'];
    $data_dieta = $_POST['data_dieta'];
    $refeicao = $_POST['refeicao'];
    $alimentos_json = explode(',', $_POST['alimentos']);
    $alimentos = json_encode($alimentos_json);
    $quantidade = $_POST['quantidade'];
    $observacoes = $_POST['observacoes'];

    if (isset($_GET['id_editar_dieta'])) {
        $dieta->EditarDieta($id_editar_dieta, $nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes);
    } else {
        $dieta->AdicionarDieta($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id);
    }
}
?>

<div class="container" id="main">
    <h2>Editar Dieta</h2>
    <form method="post">
        <!-- Campos para editar a dieta -->
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nome_dieta">Nome da Dieta</label>
                <input type="text" class="form-control" id="nome_dieta" name="nome_dieta" value="<?php echo isset($nome_dieta) ? $nome_dieta : ''; ?>" placeholder="Digite o nome da dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="tipo_dieta">Tipo de Dieta</label>
                <input type="text" class="form-control" id="tipo_dieta" name="tipo_dieta" value="<?php echo isset($tipo_dieta) ? $tipo_dieta : ''; ?>" placeholder="Digite o tipo de dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo isset($quantidade) ? $quantidade : ''; ?>" placeholder="Digite a quantidade">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="calorias">Calorias</label>
                <input type="text" class="form-control" id="calorias" name="calorias" value="<?php echo isset($calorias) ? $calorias : ''; ?>" placeholder="Digite a quantidade de calorias">
            </div>
            <div class="form-group col-md-4">
                <label for="proteinas">Proteínas</label>
                <input type="text" class="form-control" id="proteinas" name="proteinas" value="<?php echo isset($proteinas) ? $proteinas : ''; ?>" placeholder="Digite a quantidade de proteínas">
            </div>
            <div class="form-group col-md-4">
                <label for="carboidratos">Carboidratos</label>
                <input type="text" class="form-control" id="carboidratos" name="carboidratos" value="<?php echo isset($carboidratos) ? $carboidratos : ''; ?>" placeholder="Digite a quantidade de carboidratos">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="gorduras">Gorduras</label>
                <input type="text" class="form-control" id="gorduras" name="gorduras" value="<?php echo isset($gorduras) ? $gorduras : ''; ?>" placeholder="Digite a quantidade de gorduras">
            </div>
            <div class="form-group col-md-4">
                <label for="data_dieta">Data da Dieta</label>
                <input type="date" class="form-control" id="data_dieta" name="data_dieta" value="<?php echo isset($data_dieta) ? $data_dieta : ''; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="refeicao">Refeição</label>
                <input type="text" class="form-control" id="refeicao" name="refeicao" value="<?php echo isset($refeicao) ? $refeicao : ''; ?>" placeholder="Digite a refeição">
            </div>
        </div>
        <div class="form-group">
            <label for="alimentos">Alimentos (separados por vírgula)</label>
            <textarea class="form-control" id="alimentos" name="alimentos" rows="3" placeholder="Digite os alimentos"><?php echo isset($alimentos) ? $alimentos : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="3" placeholder="Digite as observações"><?php echo isset($observacoes) ? $observacoes : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-5"><?php echo isset($_GET['id_editar_dieta']) ? 'Editar' : 'Registrar'; ?></button>

    </form>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>