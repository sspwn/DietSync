<?php
$page = 'receitas';
$titulo = "Receitas";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/receitas.cont.class.php';
$receita = new Receitas("dietsync", "localhost", "root", "");
?>

<div class="container" id="main">
    <h1>Receitas Disponíveis</h1>

    <?php
    $receitas = $receita->Receitas();
    if ($receitas) {
    ?>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome da Receita</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($receitas as $receita) {
                    echo "<tr>";
                    echo "<td>{$receita['nome_receita']}</td>";
                    echo "<td><a href='pagina_receita.php?id={$receita['id_receitas']}' class='btn btn-primary'>Ver Receita</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<p>Nenhuma receita disponível.</p>";
    }
    ?>

</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>
