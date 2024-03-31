<?php
$page = 'registro-treino';
$titulo = "Registrar Treino";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/treino-cont.class.php';
require_once '../classes/controller/usuario-cont.class.php';
$treino = new TreinoController();
$usuario = new UsuarioController();

$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST["data"];
    $tipo = $_POST["tipo"];
    $exercicios_json = explode(',', $_POST['exercicios']);
    $exercicios = json_encode($exercicios_json);
    $repeticoes = $_POST["repeticoes"];
    $series = $_POST["series"];
    $objetivo = $_POST["objetivo"];
    $duracao = $_POST["duracao"];
    $frequencia = $_POST["frequencia"];
    $nome_treino = $_POST["nome_treino"];

    $treino->AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id);
}

$usuarios = $usuario->ObterTodosUsuarios();
?>

<div class="container" id="main">
    <h1>Registrar treino</h1>
    <form method="post">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" id="tipo" name="tipo">
                    <option value="musculacao">Musculação</option>
                    <option value="cardio">Cardio</option>
                    <option value="funcional">Funcional</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="nome_treino" class="form-label">Nome do Treino</label>
                <input type="text" class="form-control" id="nome_treino" name="nome_treino">
            </div>
        </div>
        <div class="row  my-5">
            <div class="col">
                <label for="exercicios" class="form-label">Exercícios (separados por vírgula)</label>
                <textarea type="text" class="form-control" id="exercicios" name="exercicios"></textarea>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <label for="repeticoes" class="form-label">Repetições</label>
                <input type="text" class="form-control" id="repeticoes" name="repeticoes">
            </div>
            <div class="col">
                <label for="series" class="form-label">Séries</label>
                <input type="text" class="form-control" id="series" name="series">
            </div>

            <div class="col">
                <label for="objetivo" class="form-label">Objetivo</label>
                <input type="text" class="form-control" id="objetivo" name="objetivo">
            </div>
            <div class="col">
                <label for="duracao" class="form-label">Duração</label>
                <input type="text" class="form-control" id="duracao" name="duracao">
            </div>
            <div class="col">
                <label for="frequencia" class="form-label">Frequência</label>
                <input type="text" class="form-control" id="frequencia" name="frequencia">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-success mb-5">Registrar</button>
</form>
</div>

<?php
include '../php/includes/footer.inc.php'
?>

</body>

</html>