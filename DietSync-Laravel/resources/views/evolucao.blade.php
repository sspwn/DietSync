@extends('layouts.header')
@section('title', 'Evolução')
@section('conteudo')

<div class="container" id="main">

  <h3>Vamo ver as Medidas Antigas</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Data</th>
        <th>Peso (kg)</th>
        <th>Altura (m)</th>
        <th>Cintura (cm)</th>
      </tr>
    </thead>
    <tbody>
      @foreach($evolucoes as $evolucao)
        <tr>
          <td>{{ $evolucao->data }}</td>
          <td>{{ $evolucao->peso }}</td>
          <td>{{ $evolucao->altura }}</td>
          <td>{{ $evolucao->cintura }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  
  <h2>Partiu Medir Novamente</h2>

  <form method="post" action="{{ route('registrar.medicao') }}">
    @csrf
    <div class="form-group">
      <label for="dataMedicao">Data da Medição</label>
      <input type="date" class="form-control" id="data" name="data" required>
    </div>

    <div class="form-group">
      <label for="peso">Peso (em kg)</label>
      <input type="number" class="form-control" id="peso" name="peso" required>
    </div>

    <div class="form-group">
      <label for="altura">Altura (em cm)</label>
      <input type="number" step="0.01" class="form-control" id="altura" name="altura" required>
    </div>

    <div class="form-group">
      <label for="cintura">Cintura (em cm)</label>
      <input type="number" class="form-control" id="cintura" name="cintura" required>
    </div>

    <button type="submit" class="btn btn-primary">Registrar Medição</button>
  </form>

</div>
@endsection