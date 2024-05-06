<?php
$titulo = "Receitas";
$page = 'receitas';
include 'header.inc.php';
include 'menu.inc.php';
require_once 'receitas-cont.class.php';
$receitas = new ReceitasController();
$userId = $_SESSION['id'];
if (isset($_GET['id_excluir_receita'])) {
    $id_receita = addslashes($_GET['id_excluir_receita']);
    $receitas->ExcluirReceita($id_receita);
}
?>

<div class="container" id="main">
    <h2>Receitas Disponíveis</h2>
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12">
            <!-- Formulário de filtro e pesquisa -->
            <form method="GET" action="">
                <label for="filtroReceita">Filtrar por:</label>
                <select name="filtroReceita" id="filtroReceita">
                    <option value="todas" <?php echo isset($_GET['filtroReceita']) && $_GET['filtroReceita'] === 'todas' ? 'selected' : ''; ?>>
                        Todas as Receitas
                    </option>
                    <option value="MinhasReceitas" <?php echo isset($_GET['filtroReceita']) && $_GET['filtroReceita'] === 'MinhasReceitas' ? 'selected' : ''; ?>>
                        Minhas Receitas
                    </option>
                </select>
                <button type="submit" class="btn btn-success mb-2">Aplicar Filtro</button>
        </div>
    </div>
    </form>


    <!-- Tabela de receitas -->
    <table class="table">
        <thead>
            <tr>
                <th>Nome da Receita</th>
                <th>Detalhes</th>
                <?php $filtroReceita = isset($_GET['filtroReceita']) ? $_GET['filtroReceita'] : 'todas';
                if ($filtroReceita === 'MinhasReceitas') {
                    echo '<th>Excluir</th>
                    <th>Editar</th>';
                }
                ?>
            </tr>
        </thead>
        <?php
        $filtroSSI = isset($_GET['filtroReceita']) ? $_GET['filtroReceita'] : 'todas';

        if ($filtroSSI === 'todas') {
            $listaReceitas = $receitas->Receitas();
        } else {
            $listaReceitas = $receitas->ReceitasPorUsuario($userId);
        }
        ?>
        <tbody>
            <?php foreach ($listaReceitas as $receita) : ?>
                <tr>
                    <td><?php echo $receita['nome_receita']; ?></td>
                    <td>
                        <a href="pagina_receita.php?id_receitas=<?php echo $receita['id_receitas']; ?>" class="btn btn-success">Ver Detalhes</a>
                    </td>
                    <?php
                    $filtroReceita = isset($_GET['filtroReceita']) ? $_GET['filtroReceita'] : 'todas';
                    if ($filtroReceita === 'MinhasReceitas') {
                        echo '
            <td>
                <form method="get" action="">
                    <input type="hidden" name="id_excluir_receita" value="' . $receita['id_receitas'] . '">
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </form>
            </td>
            <td>
            <a href="registrar-receita.php?id_receitas_editar=' . $receita['id_receitas'] . '">
            <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
        </a>
        </td>';
                    }
                    ?>
                </tr>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.inc.php';
?>
</body>

</html>