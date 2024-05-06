<?php
$titulo = "Detalhes do Treino";
$page = 'treino';
include 'header.inc.php';
include 'menu.inc.php';
require_once 'treino-cont.class.php';
$treino = new TreinoController();

if (isset($_GET['id'])) {
    $id_treino = $_GET['id'];

    $dadosDoTreino = $treino->BuscarTreinoInfos($id_treino);

    if (!empty($dadosDoTreino)) {
        echo "<div class='container' id='main'>
                <h1>Detalhes do Treino</h1>
                <ul>
                    <p><strong>Nome do Treino: </strong>" . $dadosDoTreino['nome_treino'] . "</p>
                    <p><strong>Objetivo: </strong>" . $dadosDoTreino['objetivo'] . "</p>
                    <p><strong>Duração: </strong>" . $dadosDoTreino['duracao'] . "</p>
                    <p><strong>Frequência: </strong>" . $dadosDoTreino['frequencia'] . "</p>";

        // Decodifica o JSON de exercicios
        $exercicios = json_decode($dadosDoTreino['exercicios'], true);

        // Verifica se a decodificação foi bem-sucedida
        if ($exercicios !== null && is_array($exercicios)) {
            echo "<p><strong>Exercícios:</strong> <ol>";
            foreach ($exercicios as $exercicio) {
                echo "<li>$exercicio</li>";
            }
            echo "</ol></p>";
        } else {
            echo "<p>Exercícios: Nenhum exercício especificado.</p>";
        }

        echo "<p><strong>Série: </strong>" . $dadosDoTreino['series'] . "</p>
                    <p><strong>Repetição: </strong>" . $dadosDoTreino['repeticoes'] . "</p>
                    <p><strong>Tipo: </strong>" . $dadosDoTreino['tipo'] . "</p>
                    <p><strong>Data do Treino: </strong>" . $dadosDoTreino['data'] . "</p>
                </ul>
              </div>";
    } else {
        echo "<div class='container' id='main'>
                <h1>Treino não encontrado ou dados incompletos.</h1>
              </div>";
    }
}
include 'footer.inc.php';
?>

</body>

</html>