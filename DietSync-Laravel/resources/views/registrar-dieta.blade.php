@extends('layouts.header')
@section('title', 'Registrar Dieta')
@section('conteudo')

<div class="container" id="main">
    <h2>Formulário de Dieta</h2>

    <form method="post" action="{{ url('/registrar-dieta/store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome_dieta">Nome da Dieta</label>
                <input type="text" class="form-control" id="nome_dieta" name="nome_dieta" placeholder="Digite o nome da dieta">
            </div>
            <div class="form-group col-md-6">
                <label for="tipo_dieta">Tipo de Dieta</label>
                <input type="text" class="form-control" id="tipo_dieta" name="tipo_dieta" placeholder="Digite o tipo de dieta">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="calorias">Calorias</label>
                <input type="text" class="form-control" id="calorias" name="calorias" placeholder="Digite a quantidade de calorias">
            </div>
            <div class="form-group col-md-4">
                <label for="proteinas">Proteínas</label>
                <input type="text" class="form-control" id="proteinas" name="proteinas" placeholder="Digite a quantidade de proteínas">
            </div>
            <div class="form-group col-md-4">
                <label for="carboidratos">Carboidratos</label>
                <input type="text" class="form-control" id="carboidratos" name="carboidratos" placeholder="Digite a quantidade de carboidratos">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="gorduras">Gorduras</label>
                <input type="text" class="form-control" id="gorduras" name="gorduras" placeholder="Digite a quantidade de gorduras">
            </div>
            <div class="form-group col-md-4">
                <label for="data_dieta">Data da Dieta</label>
                <input type="date" class="form-control" id="data_dieta" name="data_dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="refeicao">Refeição</label>
                <input type="text" class="form-control" id="refeicao" name="refeicao" placeholder="Digite a refeição">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="alimentos">Alimentos</label>
                <textarea class="form-control" id="alimentos" name="alimentos" rows="3" placeholder="Digite os alimentos"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Digite a quantidade">
            </div>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="3" placeholder="Digite as observações"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection