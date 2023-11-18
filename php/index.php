<?php
$titulo ="Menu";
$page = 'menu';
include '../php\includes\header.inc.php';
include '../php\includes\menu.inc.php';
?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-6">
      <img src="../img/vertical_3.png" alt="logo dietsync" class="w-50">
    </div>
    <div class="col-md-6">
      <h1>Seja bem-vindo ao DietSync!</h1>
      <p>O DietSync é um aplicativo de fitness que ajuda você a atingir seus objetivos de saúde e bem-estar. Com ele, você pode:</p>
      <ul>
        <li>Registrar sua dieta e treinos</li>
        <li>Obter insights sobre sua saúde</li>
        <li>Criar planos personalizados</li>
      </ul>
      <a class="btn btn-primary" href="#">Começar agora</a>
      <a class="btn btn-secondary" href="#">Saiba mais</a>
    </div>
  </div>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>
</html>