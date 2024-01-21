<?php
$titulo = "Dieta";
$page = 'dietagit ';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/dieta.cont.class.php';
$dieta = new RegistrarDieta("dietsync", "localhost", "root", "");
if (isset($_GET['id'])) {
    $id_treino = 0;

    $dadosDieta = $dieta->DadosDieta($id_treino);
}
?>

<div class="container" id="main">
    <h2>Plano de Refeições do Dia</h2>
</div>




<?php
include '../php/includes/footer.inc.php';
?>
</body>

</html>