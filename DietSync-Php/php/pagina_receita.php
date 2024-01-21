<?php
$page = 'receitas';
$titulo = "Receita";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/receitas.cont.class.php';
$receita = new Receitas("dietsync", "localhost", "root", "");
?>

<div class="container" id="main">
    <h1>Detalhes da Receita</h1>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>