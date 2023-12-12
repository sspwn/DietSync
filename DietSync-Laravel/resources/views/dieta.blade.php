@extends('layouts.header')
@section('title', 'Dieta')
@section('conteudo')
<div class="container" id="main">
    <h2>Plano de Refeições do Dia</h2>

    <div class="list-group mt-4">
        <a href="#breakfast" class="list-group-item list-group-item-action" data-toggle="collapse">
            Café da Manhã
        </a>
        <div class="collapse" id="breakfast">
            <div class="card card-body">
                <ul>
                    <li>Ovos</li>
                    <li>Torradas</li>
                    <li>Frutas</li>
                </ul>
            </div>
        </div>

        <a href="#lunch" class="list-group-item list-group-item-action" data-toggle="collapse">
            Almoço
        </a>
        <div class="collapse" id="lunch">
            <div class="card card-body">
                <ul>
                    <li>Arroz</li>
                    <li>Feijão</li>
                    <li>Frango grelhado</li>
                    <li>Salada</li>
                </ul>
            </div>
        </div>

        <a href="#dinner" class="list-group-item list-group-item-action" data-toggle="collapse">
            Jantar
        </a>
        <div class="collapse" id="dinner">
            <div class="card card-body">
                <ul>
                    <li>Sopa de legumes</li>
                    <li>Peixe cozido</li>
                    <li>Legumes no vapor</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection