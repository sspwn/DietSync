<?php
$titulo = "Detalhes do Treino";
$page = 'treino';
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/treino.cont.class.php';
$treino = new InserirTreino("dietsync", "localhost", "root", "");

if (isset($_GET['id'])) {
    $id_treino = $_GET['id'];

    $dadosDoTreino = $treino->BuscarTreino($id_treino);

    if (!empty($dadosDoTreino)) {
        echo "<div class='container' id='main'>
                <h1>Detalhes do Treino</h1>
                <ul>
                    <li>Nome do Treino: " . $dadosDoTreino['nome_treino'] . "</li>
                    <li>Objetivo: " . $dadosDoTreino['objetivo'] . "</li>
                    <li>Duração: " . $dadosDoTreino['duracao'] . "</li>
                    <li>Frequência: " . $dadosDoTreino['frequencia'] . "</li>
                    <li>Exercícios: " . $dadosDoTreino['exercicios'] . "</li>
                    <li>Série: " . $dadosDoTreino['serie'] . "</li>
                    <li>Repetição: " . $dadosDoTreino['repeticao'] . "</li>
                    <li>Tipo: " . $dadosDoTreino['tipo'] . "</li>
                    <li>Data do Treino: " . $dadosDoTreino['data_treino'] . "</li>
                    <!-- Adicione outras informações conforme necessário -->
                </ul>
              </div>";
    } else {
        echo "<div class='container' id='main'>
                <p>Treino não encontrado ou dados incompletos.</p>
              </div>";
    }
} else {
    echo "<div class='container' id='main'>
            <p>ID do treino não fornecido.</p>
          </div>";
}

include '../php/includes/footer.inc.php';
?>

</body>

</html>
