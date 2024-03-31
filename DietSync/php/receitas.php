<?php
$titulo = "Receitas";
$page = 'receitas';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/receitas-cont.class.php';
$receitas = new ReceitasController();
$userId = $_SESSION['id'];
?>

<div class="container" id="main">
    <h2>Receitas Disponíveis</h2>
    <div class="container-fluid row">
        <div class="col-lg-5 col-md-12 col-sm-12">
            <!-- Formulário de filtro e pesquisa -->
            <form method="GET" action="">
                <label for="filtroReceita">Filtrar por:</label>
                <select name="filtroReceita" id="filtroReceita">
                    <option value="MinhasReceitas" <?php echo isset($_GET['filtroReceita']) && $_GET['filtroReceita'] === 'MinhasReceitas' ? 'selected' : ''; ?>>
                        Minhas Receitas
                    </option>
                    <option value="todas" <?php echo isset($_GET['filtroReceita']) && $_GET['filtroReceita'] === 'todas' ? 'selected' : ''; ?>>
                        Todas as Receitas
                    </option>
                </select>
                <button type="submit" class="btn btn-success mb-2">Aplicar Filtro</button>
        </div>
        <!-- <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-10">
                    <label for="pesquisar_nome" class="">lupa</label>
                    <input type="text" id="pesquisar_nome" name="pesquisar_nome" class="form-control" value="">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                </div>
            </div>
        </div> -->
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
                    echo '<th>Excluir</th>';
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
                    <?php $filtroReceita = isset($_GET['filtroReceita']) ? $_GET['filtroReceita'] : 'todas';
                    if ($filtroReceita === 'MinhasReceitas') {
                        echo '
                    <td>
                        <button class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                    </td>';
                    } ?>
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