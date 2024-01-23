<?php
$titulo = "Dieta";
$page = 'dieta';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/dieta.cont.class.php';
require '../php/ajax/verificar_session.php';
$dieta = new RegistrarDieta("dietsync", "localhost", "root", "");

$dadosDieta = $dieta->DadosDieta();
?>

<div class="container" id="main">
    <h2>Plano de Refeições do Dia</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome Dieta</th>
                <th>Detalhes</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dadosDieta as $dieta) : ?>
                <tr>
                    <td><?php echo $dieta['nome_dieta']; ?></td>
                    <td>
                        <button class="btn btn-success" data-toggle="collapse" data-target="#detalhesDieta<?php echo $dieta['id_dieta']; ?>">
                            Ver Detalhes
                        </button>
                        <div id="detalhesDieta<?php echo $dieta['id_dieta']; ?>" class="collapse">
                            <ul>
                                <li>Tipo de Dieta: <?php echo $dieta['tipo_dieta']; ?></li>
                                <li>Calorias: <?php echo $dieta['calorias']; ?></li>
                                <li>Proteínas: <?php echo $dieta['proteinas']; ?></li>
                                <li>Carboidratos: <?php echo $dieta['carboidratos']; ?></li>
                                <li>Gorduras: <?php echo $dieta['gorduras']; ?></li>
                                <li>Data da Dieta: <?php echo $dieta['data_dieta']; ?></li>
                                <li>Refeição: <?php echo $dieta['refeicao']; ?></li>
                                <li>Alimentos:
                            <?php
                            $alimentos = json_decode($dieta['alimentos'], true);
                            if ($alimentos !== null && is_array($alimentos)) {
                                echo '<ul>';
                                foreach ($alimentos as $alimento) {
                                    echo '<li>' . $alimento . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo 'Nenhum alimento especificado.';
                            }
                            ?>
                        </li>
                                <li>Quantidade: <?php echo $dieta['quantidade']; ?></li>
                                <li>Observações: <?php echo $dieta['observacoes']; ?></li>
                                <!-- Adicione outras informações conforme necessário -->
                            </ul>
                        </div>
                    </td>
                    <td>
                    <button class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../php/includes/footer.inc.php';
?>
</body>

</html>
