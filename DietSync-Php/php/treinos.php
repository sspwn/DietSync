<?php
$titulo = "Menu";
$page = 'menu';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/treino.cont.class.php';
$treino = new InserirTreino("dietsync", "localhost", "root", "");

$treinos_disponiveis = $treino->Treinos();
?>

<div class="container" id="main">
    <h1>Treinos Disponíveis</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome da Receita</th>
                <th scope="col">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treinos_disponiveis as $treino) : ?>
                <tr>
                    <td><?php echo $treino['nome_treino']; ?></td>
                    <td>
                        <a href="pagina_treino.php?id=<?php echo $treino['id']; ?>" class="btn btn-info">Ver Detalhes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>