<?php
$titulo = "Registrar Dieta";
$page = "registrar-dieta";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/dieta.cont.class.php';
require_once '../classes/controller/usuario.cont.class.php';
require '../php/ajax/verificar_session.php';

$dieta = new RegistrarDieta("dietsync", "localhost", "root", "");
$usuario = new Usuario("dietsync", "localhost", "root", "");

$user_id = $_SESSION['id'];

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
    $usuario_id = $_POST['usuario_id'];

    $dieta->AdicionarDieta($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $usuario_id);
}

$usuarios = $usuario->ObterTodosUsuarios();
?>

<div class="container" id="main">
    <h2>Formulário de Dieta</h2>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome_dieta">Nome da Dieta</label>
                <input type="text" class="form-control" id="nome_dieta" name="nome_dieta" placeholder="Digite o nome da dieta">
            </div>
            <div class="form-group col-md-6">
                <label for="tipo_dieta">Tipo de Dieta</label>
                <input type="text" class="form-control" id="tipo_dieta" name="tipo_dieta" placeholder="Digite o tipo de dieta">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="calorias">Calorias</label>
                <input type="text" class="form-control" id="calorias" name="calorias" placeholder="Digite a quantidade de calorias">
            </div>
            <div class="form-group col-md-4">
                <label for="proteinas">Proteínas</label>
                <input type="text" class="form-control" id="proteinas" name="proteinas" placeholder="Digite a quantidade de proteínas">
            </div>
            <div class="form-group col-md-4">
                <label for="carboidratos">Carboidratos</label>
                <input type="text" class="form-control" id="carboidratos" name="carboidratos" placeholder="Digite a quantidade de carboidratos">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="gorduras">Gorduras</label>
                <input type="text" class="form-control" id="gorduras" name="gorduras" placeholder="Digite a quantidade de gorduras">
            </div>
            <div class="form-group col-md-4">
                <label for="data_dieta">Data da Dieta</label>
                <input type="date" class="form-control" id="data_dieta" name="data_dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="refeicao">Refeição</label>
                <input type="text" class="form-control" id="refeicao" name="refeicao" placeholder="Digite a refeição">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="alimentos">Alimentos</label>
                <textarea class="form-control" id="alimentos" name="alimentos" rows="3" placeholder="Digite os alimentos"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Digite a quantidade">
            </div>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="3" placeholder="Digite as observações"></textarea>
        </div>
        <!-- Dropdown para selecionar o usuário -->
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="usuario_id">Selecione o Usuário</label>
                <select class="form-select" id="usuario_id" name="usuario_id">
                    <?php foreach ($usuarios as $u) : ?>
                        <option value="<?= $u['id'] ?>"><?= $u['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>
