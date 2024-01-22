<?php
$titulo = "Receitas";
$page = 'receitas';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/receitas.cont.class.php';
$receitas = new Receitas("dietsync", "localhost", "root", "");

// Buscar todas as receitas
$listaReceitas = $receitas->Receitas();
?>

<div class="container" id="main">
    <h2>Receitas Disponíveis</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nome da Receita</th>
                <th>Detalhes</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaReceitas as $receita) : ?>
                <tr>
                    <td><?php echo $receita['nome_receita']; ?></td>
                    <td>
                        <a href="pagina_receita.php?id_receitas=<?php echo $receita['id_receitas']; ?>" class="btn btn-success">Ver Detalhes</a>
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
