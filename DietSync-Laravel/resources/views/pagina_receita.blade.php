@extends('layouts.header')
@section('title', 'Detalhes da Receita')
@section('conteudo')
<div class="container" id="main">
    <h1>Detalhes da Receita</h1>

    @if(isset($receita))
    <div>
        <strong>Nome da Receita:</strong> {{ $receita['nome_receita'] }}
    </div>
    <div>
        <strong>Ingredientes:</strong>
        @if($receita['ingredientes'])
            <ul>
                @foreach(json_decode($receita['ingredientes']) as $ingrediente)
                    <li>{{ $ingrediente }}</li>
                @endforeach
            </ul>
        @else
            Nenhum ingrediente listado.
        @endif
    </div>
    <div>
        <strong>Modo de Preparo:</strong> {{ $receita['modo_preparo'] }}
    </div>

    <div>
        <strong>Informações Nutricionais</strong>
    </div>
    <ul>
        <li><strong>Calorias:</strong> {{ $receita['calorias'] }}</li>
        <li><strong>Proteínas:</strong> {{ $receita['proteinas'] }}</li>
        <li><strong>Carboidratos:</strong> {{ $receita['carboidratos'] }}</li>
        <li><strong>Gordura:</strong> {{ $receita['gordura'] }}</li>
    </ul>
    @else
    <p>Receita não encontrada ou dados incompletos.</p>
    @endif
</div>
@endsection
