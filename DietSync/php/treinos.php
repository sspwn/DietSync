<?php
$titulo = "Treino";
$page = 'treino';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/treino-cont.class.php';
$treino = new TreinoController();
$user_id = $_SESSION['id'];
$treinos = $treino->Treinos($user_id);
if(isset($_GET['id_treino_excluir'])){
    $id_treino = addslashes($_GET['id_treino_excluir']);
    $treino->ExcluirTreino($id_treino);
}
?>

<div class="container" id="main">
    <h1>Treinos Disponíveis</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nome da Receita</th>
                <th>Detalhes</th>
                <th>Excluir</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treinos as $treino) : ?>
                <tr>
                    <td><?php echo $treino['nome_treino']; ?></td>
                    <td>
                        <a href="pagina_treino.php?id=<?php echo $treino['id']; ?>" class="btn btn-success">Ver Detalhes</a>
                    </td>
                    <td>
                        <a href="treinos.php?id_treino_excluir=<?php echo $treino['id']; ?>">
                            <button class="btn btn-danger">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </a>
                    </td>
                    <td> <a href="registrar-treino.php?id_treino_editar=<?php echo $treino['id']; ?>">
                            <button class="btn btn-success">
                            <i class="bi bi-pencil-square"></i>
                            </button>
                        </a></td>
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