<!-- resources/views/treinos.blade.php -->

@extends('layouts.header')

@section('title', 'Treinos')

@section('conteudo')
    <div class="container" id="main">
        <h1>Treinos Disponíveis</h1>

        @if($treinos->count() > 0)
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($treinos as $treino)
                        <tr>
                            <td>{{ $treino->data }}</td>
                            <td>{{ $treino->tipo }}</td>
                            <td>
                                <a href="{{ route('treinos.show', ['id' => $treino->id]) }}" class="btn btn-primary">Ver Treino</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum treino disponível.</p>
        @endif
    </div>
@endsection
