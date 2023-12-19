<!-- resources/views/treino.blade.php -->

@extends('layouts.header')
@section('title', 'Detalhes do Treino')
@section('conteudo')
    <div class="container" id="main">
        <h1>Detalhes do Treino</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Exercícios</th>
                    <th>Repetições</th>
                    <th>Séries</th>
                    <th>Objetivo</th>
                    <th>Duração</th>
                    <th>Frequência</th>
                    <th>Nome do Treino</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $treino->data }}</td>
                    <td>{{ $treino->tipo }}</td>
                    <td>
                        @if($treino->exercicios)
                            <ul>
                                @foreach(json_decode($treino->exercicios) as $exercicio)
                                    <li>{{ $exercicio }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>{{ $treino->repeticoes }}</td>
                    <td>{{ $treino->series }}</td>
                    <td>{{ $treino->objetivo }}</td>
                    <td>{{ $treino->duracao }}</td>
                    <td>{{ $treino->frequencia }}</td>
                    <td>{{ $treino->nome_treino }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
