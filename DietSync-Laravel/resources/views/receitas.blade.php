@extends('layouts.header')
@section('title', 'Receitas')
@section('conteudo')
<div class="container" id="main">
    <h1>Receitas Disponíveis</h1>

    @if($receitas->count() > 0)
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome da Receita</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receitas as $receita)
            <tr>
                <td>{{ $receita->nome_receita }}</td>
                <td>
                    <a href="{{ route('receitas.show', ['id' => $receita->id_receitas]) }}" class="btn btn-primary">Ver Receita</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhuma receita disponível.</p>
    @endif

</div>
@endsection