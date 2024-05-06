<?php
$page = 'receitas';
$titulo = "receitas";
include 'header.inc.php';
include 'menu.inc.php';
require_once 'receitas-cont.class.php';
$receita = new ReceitasController();
?>

<div class="container" id="main">
    <?php
    if (isset($_GET['id_receitas'])) {
        $id_receita = $_GET['id_receitas'];
        $receitas_infos = $receita->BuscarReceita($id_receita);

        // Verifica se a receita foi encontrada
        if (!empty($receitas_infos)) {
            $receita_info = $receitas_infos[0];
    ?>
            <h1>Detalhes da Receita</h1>
            <p><strong>Nome da receita:</strong> <?php echo $receita_info['nome_receita']; ?></p>
            <p><strong>Ingredientes:</strong> 
            <ul>
                <?php
                    // Decodifica o JSON de ingredientes
                    $ingredientes = json_decode($receita_info['ingredientes'], true);

                    // Verifica se a decodificação foi bem-sucedida
                    if ($ingredientes !== null && is_array($ingredientes)) {
                        foreach ($ingredientes as $ingrediente) {
                            echo '<li>' . $ingrediente . '</li>';
                        }
                    } else {
                        echo '<li>Nenhum ingrediente especificado.</li>';
                    }
                ?>
            </ul>
            <p><strong>Modo de Preparo:</strong> <?php echo $receita_info['modo_preparo']; ?></p>
            <p><strong>Calorias:</strong> <?php echo $receita_info['calorias']; ?></p>
            <p><strong>Proteínas:</strong> <?php echo $receita_info['proteinas']; ?></p>
            <p><strong>Carboidratos:</strong> <?php echo $receita_info['carboidratos']; ?></p>
            <p><strong>Gordura:</strong> <?php echo $receita_info['gordura']; ?></p>
    <?php
        } else {
            echo "<h1><strong>Receita não encontrada.</strong></h1>";
        }
    }
    ?>
</div>

<?php
include 'footer.inc.php'
?>
</body>

</html>