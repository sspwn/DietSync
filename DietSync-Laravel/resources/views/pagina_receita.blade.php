@extends('layouts.header')
@section('title', 'Receitas')
@section('conteudo')

<div class="container" id="main">
    <h1>Detalhes da Receita</h1>

    <?php
    // Verifica se o ID da receita foi passado na URL
    if (isset($_GET['id'])) {
        $id_receita = $_GET['id'];

        $dadosDaReceita = $receita->BuscarReceita($id_receita);

        if (!empty($dadosDaReceita)) {
            $receita = $dadosDaReceita[0]; // Acesse o primeiro elemento do array

            echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Nome da Receita</th>
                            <th>Ingredientes</th>
                            <th>Modo de Preparo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>" . $receita['nome_receita'] . "</td>
                            <td>" . $receita['ingredientes'] . "</td>
                            <td>" . $receita['modo_preparo'] . "</td>
                        </tr>
                    </tbody>
                </table>
                <h2>Informações Nutricionais</h2>
                <ul>
                    <li>Calorias: " . $receita['calorias'] . "</li>
                    <li>Proteínas: " . $receita['proteinas'] . "</li>
                    <li>Carboidratos: " . $receita['carboidratos'] . "</li>
                    <li>Gordura: " . $receita['gordura'] . "</li>
                </ul>";
        } else {
            echo "<p>Receita não encontrada ou dados incompletos.</p>";
        }
    }

    ?>

</div>
@endsection