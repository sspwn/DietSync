<?php
$titulo = "Menu";
$page = 'menu';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/treino.cont.class.php';
$treino = new InserirTreino("dietsync", "localhost", "root", "");
?>

<div class="container" id="main">
    <h1>Receitas Disponíveis</h1>

    <?php
    $treinos = $treino->Treinos();
    if ($treinos) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Nome do Treino</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($treinos as $treino) {
            echo "<tr>
                    <td>" . $treino['nome_treino'] . "</td>
                    <td>
                        <a href='pagina_treino.php?id=" . $treino['id_treino'] . "' class='btn btn-primary'>Ver Detalhes</a>
                    </td>
                  </tr>";
        }

        echo "</tbody>
              </table>";
    } else {
        echo "<p>Nenhum treino encontrado.</p>";
    }
    ?>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>