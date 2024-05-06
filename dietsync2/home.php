<?php
$titulo = "Menu";
$page = 'menu';
include 'header.inc.php';
include 'menu.inc.php';
?>
<div class="container-fluid" id="main">
  <div class="row">
    <div class="col-md-6">
      <h2>Desenvolvedores</h2>
      <div class="row text-center">
        <div class="col-md-6">
          <div class="card mb-4">
            <img src="img\IMG_20240128_201042_006.jpg" class="card-img-top" alt="Desenvolvedor 1">
            <div class="card-body">
              <h5 class="card-title">Gabriel Vaz Scremim</h5>
              <p class="card-text">Aluno do curso de Ciência da Computação da UniFil - Londrina e
                estagiário no IDR-Paraná.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mb-4">
            <img src="img\segobi.jpeg" class="card-img-top" alt="Desenvolvedor 2">
            <div class="card-body">
              <h5 class="card-title">Gabriel Segobi de Souza</h5>
              <p class="card-text">Aluno do curso de Ciência da Computação da UniFil - Londrina</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h2>Bem-vindo ao DietSync!</h2>
      <p>O DietSync é uma ferramenta fitness dedicado a ajudar você a alcançar seus objetivos de saúde e bem-estar.
        Desenvolvido por uma equipe comprometida, oferecemos ferramentas para registrar sua dieta, treinos e obter
        insights sobre sua saúde.</p>
      <h4>Objetivos do DietSync</h4>
      <ul>
        <li>Registrar dietas e treinos de forma fácil e eficiente.</li>
        <li>Fornecer insights valiosos sobre sua saúde e progresso.</li>
      </ul>
    </div>
  </div>


  <?php
  include 'footer.inc.php'
  ?>
  </body>

  </html>