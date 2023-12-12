@extends('layouts.header')
@section('title', 'Registrar Receita')
@section('conteudo')

<div class="container" id="main">
    <h1>Registrar Receita</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nome_receita" class="form-label">Nome da Receita</label>
            <input type="text" class="form-control" id="nome_receita" name="nome_receita">
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes</label>
            <textarea class="form-control" id="ingredientes" name="ingredientes" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="modo_preparo" class="form-label">Modo de Preparo</label>
            <textarea class="form-control" id="modo_preparo" name="modo_preparo" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="calorias" class="form-label">Calorias</label>
            <input type="number" class="form-control" id="calorias" name="calorias">
        </div>
        <div class="mb-3">
            <label for="proteinas" class="form-label">Proteínas</label>
            <input type="number" class="form-control" id="proteinas" name="proteinas">
        </div>
        <div class="mb-3">
            <label for="carboidratos" class="form-label">Carboidratos</label>
            <input type="number" class="form-control" id="carboidratos" name="carboidratos">
        </div>
        <div class="mb-3">
            <label for="gordura" class="form-label">Gordura</label>
            <input type="number" class="form-control" id="gordura" name="gordura">
        </div>

        <button type="submit" class="btn btn-primary" value="cadastrar">Registrar</button>
    </form>
</div>
@endsection