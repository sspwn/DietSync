@extends('layouts.header')
@section('title', 'Dieta')
@section('conteudo')
<div class="container" id="main">
    <h2>Refeições do dia</h2>

    @foreach ($dietas as $dieta)
        <div class="list-group mt-4">
            <a href="#{{ $dieta->refeicao }}" class="list-group-item list-group-item-action" data-toggle="collapse">
                {{ $dieta->refeicao }}
            </a>
            <div class="collapse w-100" id="{{ $dieta->refeicao }}">
                <div class="card card-body">
                    <ul>
                        <li><strong>Nome da Dieta:</strong> {{ $dieta->nome_dieta }}</li>
                        <li><strong>Tipo de Dieta:</strong> {{ $dieta->tipo_dieta }}</li>
                        <li><strong>Calorias:</strong> {{ $dieta->calorias }}</li>
                        <li><strong>Proteínas:</strong> {{ $dieta->proteinas }}</li>
                        <li><strong>Carboidratos:</strong> {{ $dieta->carboidratos }}</li>
                        <li><strong>Gorduras:</strong> {{ $dieta->gorduras }}</li>
                        <li><strong>Data da Dieta:</strong> {{ $dieta->data_dieta }}</li>
                        <li><strong>Alimentos:</strong>
                            @if($dieta->alimentos)
                                <ul>
                                    @foreach(json_decode($dieta->alimentos) as $alimento)
                                        <li>{{ $alimento }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Nenhum alimento listado.
                            @endif
                        </li>
                        <li><strong>Quantidade:</strong> {{ $dieta->quantidade }}</li>
                        <li><strong>Observações:</strong> {{ $dieta->observacoes }}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
