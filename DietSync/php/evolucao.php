<?php
$titulo = "Evolução";
$page = 'evolucao';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/evolucao-cont.class.php';
$evolucao = new EvolucaoController();
$user_id = $_SESSION['id'];
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os dados do formulário
  $data = addslashes($_POST['dataMedicao']);
  $peso = addslashes($_POST['peso']);
  $altura = addslashes($_POST['altura']);
  $cintura = addslashes($_POST['cintura']);

  $evolucao->RegistrarMedicao($data, $peso, $altura, $cintura,$user_id);
}
?>

<div class="container" id="main">

  <h3>Vamo ver as Medidas Antigas</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Data</th>
        <th>Peso (kg)</th>
        <th>Altura (m)</th>
        <th>Cintura (cm)</th>
      </tr>
    </thead>
    <tbody>
      <!-- Aqui vão aparecer as medidas antigas -->
      <?php
      $medicoesAnteriores = $evolucao->dadosEvolucao($user_id);
      foreach ($medicoesAnteriores as $medicao) {
        echo "<tr>";
        echo "<td>{$medicao['data']}</td>";
        echo "<td>{$medicao['peso']}</td>";
        echo "<td>{$medicao['altura']}</td>";
        echo "<td>{$medicao['cintura']}</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

  <h2>Partiu Medir Novamente</h2>

  <form method="post">
    <div class="form-group">
      <label for="dataMedicao">Data da Medição</label>
      <input type="date" class="form-control" id="dataMedicao" name="dataMedicao" required>
    </div>

    <div class="form-group">
      <label for="peso">Peso (em kg)</label>
      <input type="number" class="form-control" id="peso" name="peso" required>
    </div>

    <div class="form-group">
      <label for="altura">Altura (em cm)</label>
      <input type="number" step="0.01" class="form-control" id="altura" name="altura" required>
    </div>

    <div class="form-group">
      <label for="cintura">Cintura (em cm)</label>
      <input type="number" class="form-control" id="cintura" name="cintura" required>
    </div>

    <button type="submit" class="btn btn-success">Registrar Medição</button>
  </form>

</div>

<?php
include '../php/includes/footer.inc.php';
?>
</body>

</html>