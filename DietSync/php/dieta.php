<?php
$titulo = "Dieta";
$page = 'dieta';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/dieta-cont.class.php';
$dietaController = new DietaController();

// Verificar se o usuário tem uma meta definida
if (isset($_SESSION['meta']) && !empty($_SESSION['meta'])) {
    // Redirecionar para home.php
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['id'];
$dadosDieta = $dietaController->DadosDieta($user_id);
?>

<div class="container" id="main">
    <h2>Plano de Refeições do Dia</h2>
    <?php foreach ($dadosDieta as $dieta) : ?>
        <div class="list-group mt-4">
            <strong class="text-uppercase">
                <a href="#<?= $dieta['refeicao'] ?>" class="list-group-item list-group-item-action" data-toggle="collapse">
                    <?= $dieta['refeicao'] ?>
                </a>
            </strong>
            <div class="collapse w-100" id="<?= $dieta['refeicao'] ?>">
                <div class="card card-body">
                    <ul>
                        <li><strong>Data da Dieta:</strong> <?= $dieta['data_dieta'] ?></li>
                        <li><strong>Nome da Dieta:</strong> <?= $dieta['nome_dieta'] ?></li>
                        <li><strong>Tipo de Dieta:</strong> <?= $dieta['tipo_dieta'] ?></li>
                        <li><strong>Calorias:</strong> <?= $dieta['calorias'] ?></li>
                        <li><strong>Proteínas:</strong> <?= $dieta['proteinas'] ?></li>
                        <li><strong>Carboidratos:</strong> <?= $dieta['carboidratos'] ?></li>
                        <li><strong>Gorduras:</strong> <?= $dieta['gorduras'] ?></li>
                        <li><strong>Alimentos:</strong>
                            <?php
                            $alimentos = json_decode($dieta['alimentos'], true);
                            if ($alimentos !== null && is_array($alimentos)) {
                                echo '<ul>';
                                foreach ($alimentos as $alimento) {
                                    echo '<li>' . $alimento . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo 'Nenhum alimento listado.';
                            }
                            ?>
                        </li>
                        <li><strong>Quantidade:</strong> <?= $dieta['quantidade'] ?></li>
                        <li><strong>Observações:</strong> <?= $dieta['observacoes'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
include '../php/includes/footer.inc.php';
?>
</body>

</html>