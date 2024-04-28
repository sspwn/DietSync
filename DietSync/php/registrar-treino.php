<?php
$page = 'registro-treino';
$titulo = isset($_GET['id_treino_editar']) ? "Editar Treino" : "Registrar Treino";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/treino-cont.class.php';
require_once '../classes/controller/usuario-cont.class.php';
$treino = new TreinoController();

$user_id = $_SESSION['id'];

// Verifica se está editando um treino existente
if (isset($_GET['id_treino_editar'])) {
    $id_treino_editar = $_GET['id_treino_editar'];
    $dados_treino = $treino->BuscarTreinoInfos($id_treino_editar);

    if ($dados_treino) {
        // Preencha os campos do formulário com os dados do treino
        $data = $dados_treino['data'];
        $tipo = $dados_treino['tipo'];
        $exercicios = implode(', ', json_decode($dados_treino['exercicios'], true));
        $repeticoes = $dados_treino['repeticoes'];
        $series = $dados_treino['series'];
        $objetivo = $dados_treino['objetivo'];
        $duracao = $dados_treino['duracao'];
        $frequencia = $dados_treino['frequencia'];
        $nome_treino = $dados_treino['nome_treino'];
    } else {
        $erro = "Treino não encontrado.";
    }
}

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

    // Verifica se está editando um treino existente
    if (isset($_GET['id_treino_editar'])) {
        $id_treino = $_GET['id_treino_editar'];
        $treino->EditarTreino($id_treino, $data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id);
    } else {
        $treino->AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id);
    }
}
?>

<div class="container" id="main">
    <h1><?php echo $titulo; ?></h1>
    <form method="post">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" value="<?php echo isset($data) ? $data : ''; ?>">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 my-2 mt-4 pt-2">
                <select class="form-control" id="tipo" name="tipo">
                    <option value="" disabled>Selecione o tipo de treino</option>
                    <option value="musculacao" <?php echo (isset($tipo) && $tipo == 'musculacao') ? 'selected' : ''; ?>>Musculação</option>
                    <option value="cardio" <?php echo (isset($tipo) && $tipo == 'cardio') ? 'selected' : ''; ?>>Cardio</option>
                    <option value="funcional" <?php echo (isset($tipo) && $tipo == 'funcional') ? 'selected' : ''; ?>>Funcional</option>
                </select>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="nome_treino" class="form-label">Nome do Treino</label>
                <input type="text" class="form-control" id="nome_treino" name="nome_treino" value="<?php echo isset($nome_treino) ? $nome_treino : ''; ?>">
            </div>
        </div>
        <div class="row  my-5">
            <div class="col">
                <label for="exercicios" class="form-label">Exercícios (separados por vírgula)</label>
                <textarea type="text" class="form-control" id="exercicios" name="exercicios"><?php echo isset($exercicios) ? $exercicios : ''; ?></textarea>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <label for="repeticoes" class="form-label">Repetições</label>
                <input type="text" class="form-control" id="repeticoes" name="repeticoes" value="<?php echo isset($repeticoes) ? $repeticoes : ''; ?>">
            </div>
            <div class="col">
                <label for="series" class="form-label">Séries</label>
                <input type="text" class="form-control" id="series" name="series" value="<?php echo isset($series) ? $series : ''; ?>">
            </div>

            <div class="col">
                <label for="objetivo" class="form-label">Objetivo</label>
                <input type="text" class="form-control" id="objetivo" name="objetivo" value="<?php echo isset($objetivo) ? $objetivo : ''; ?>">
            </div>
            <div class="col">
                <label for="duracao" class="form-label">Duração</label>
                <input type="text" class="form-control" id="duracao" name="duracao" value="<?php echo isset($duracao) ? $duracao : ''; ?>">
            </div>
            <div class="col">
                <label for="frequencia" class="form-label">Frequência</label>
                <input type="text" class="form-control" id="frequencia" name="frequencia" value="<?php echo isset($frequencia) ? $frequencia : ''; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-success mb-5"><?php echo isset($_GET['id_treino_editar']) ? 'Editar' : 'Registrar'; ?></button>
    </form>
</div>

<?php
include '../php/includes/footer.inc.php'
?>

</body>

</html>