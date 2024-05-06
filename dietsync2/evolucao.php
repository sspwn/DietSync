<?php
$titulo = "Evolução";
$page = 'evolucao';
include 'header.inc.php';
include 'menu.inc.php';
require_once 'evolucao-cont.class.php';
$evolucao = new EvolucaoController();
$user_id = $_SESSION['id'];
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os dados do formulário
  $data = addslashes($_POST['dataMedicao']);
  $peso = addslashes($_POST['peso']);
  $altura = addslashes($_POST['altura']);
  $cintura = addslashes($_POST['cintura']);

  $evolucao->RegistrarMedicao($data, $peso, $altura, $cintura, $user_id);
}

if (isset($_GET['id_evolucao_excluir'])) {
  $id_evolucao_excluir = addslashes($_GET['id_evolucao_excluir']);
  $evolucao->ExcluirEvolucao($id_evolucao_excluir);
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
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      <!-- Aqui vão aparecer as medidas antigas -->
      <?php
      $medicoesAnteriores = $evolucao->dadosEvolucao($user_id);
      foreach ($medicoesAnteriores as $medicao) {
        echo "<tr>
        <td>{$medicao['data']}</td>
        <td>{$medicao['peso']}</td>
        <td>{$medicao['altura']}</td>
        <td>{$medicao['cintura']}</td>
        <td>
          <a href='evolucao.php?id_evolucao_excluir={$medicao['id']}'>
            <button class='btn btn-danger'>
              <i class='bi bi-x-circle'></i>
            </button>
          </a>
        </td>
        </tr>";
      }
      ?>
    </tbody>
  </table>

  <h2>Partiu Medir Novamente</h2>

  <form method="post">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12">
        <label for="dataMedicao">Data da Medição</label>
        <input type="date" class="form-control" id="dataMedicao" name="dataMedicao" required>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <label for="peso">Peso (em kg)</label>
        <input type="number" class="form-control" id="peso" name="peso" required>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <label for="altura">Altura (em cm)</label>
        <input type="number" step="0.01" class="form-control" id="altura" name="altura" required>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <label for="cintura">Cintura (em cm)</label>
        <input type="number" class="form-control" id="cintura" name="cintura" required>
      </div>
    </div>
    <button type="submit" class="btn btn-success my-3">Registrar Medição</button>
  </form>
</div>

<?php
include 'footer.inc.php';
?>
</body>

</html>