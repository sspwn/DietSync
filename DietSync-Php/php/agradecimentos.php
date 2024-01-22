<?php
$titulo = "Agradecimentos";
$page = 'agradecimentos';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
?>

<div class="container" id="main">
    <div class="container">
        <div class="text-center">
            <img src="../img/GIF.gif" alt="logo dietsync" class="w-50">
        </div>
        
        <div class="container my-5 text-center">
            <h1>Agradecimentos</h1>
            <p>O DietSync é fruto do trabalho colaborativo de uma equipe dedicada. Agradecemos a todos que contribuíram para o sucesso deste projeto.</p>
        </div>
    </div>

    <h2 class="text-center">Equipe de Desenvolvimento</h2>
    <div class="row text-center justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="../img/desenvolvedor1.jpg" class="card-img-top" alt="Desenvolvedor 1">
                <div class="card-body">
                    <h5 class="card-title">Gabriel Vaz Scremim</h5>
                    <p class="card-text">Breve descrição sobre o Desenvolvedor 1.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="../img/desenvolvedor2.jpg" class="card-img-top" alt="Desenvolvedor 2">
                <div class="card-body">
                    <h5 class="card-title">Gabriel Segobi de Souza</h5>
                    <p class="card-text">Breve descrição sobre o Desenvolvedor 2.</p>
                </div>
            </div>
        </div>
        <!-- Adicione mais cards conforme necessário -->
    </div>

    <h2 class="text-center">Agradecimentos Especiais</h2>
    <div class="row text-center justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4">
                <!-- Adicione a imagem e informações do colaborador -->
                <div class="card-body">
                    <h5 class="card-title">Professora Tânia Camila Goulart</h5>
                    <p class="card-text">A melhor professora de matemática do mundo e a responsável pelo PROJETO DE EXNTESÃO CURRICULAR, no qual a DietSync fez parte.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <!-- Adicione a imagem e informações do colaborador -->
                <div class="card-body">
                    <h5 class="card-title">Pedro Sitta</h5>
                    <p class="card-text">responsável pelas logos e por toda identidade do site.</p>
                </div>
            </div>
        </div>
        <!-- Adicione mais cards de agradecimento conforme necessário -->
    </div>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>
