@extends('layouts.header')
@section('title', 'Sobre o DietSync')
@section('conteudo')

<div class="container" id="main">
  <div class="row">
    <div class="col-md-6">
      <img src="../img/vertical_3.png" alt="logo dietsync" class="w-50">
    </div>
    <div class="col-md-6">
      <h1>Bem-vindo ao DietSync!</h1>
      <p>O DietSync é um aplicativo de fitness dedicado a ajudar você a alcançar seus objetivos de saúde e bem-estar. Desenvolvido por uma equipe comprometida, oferecemos ferramentas para registrar sua dieta, treinos, obter insights sobre sua saúde e criar planos personalizados.</p>
      <h2>Objetivos do DietSync</h2>
      <ul>
        <li>Registrar dietas e treinos de forma fácil e eficiente.</li>
        <li>Fornecer insights valiosos sobre sua saúde e progresso.</li>
        <li>Criar planos personalizados para atender às suas necessidades específicas.</li>
      </ul>
    </div>
  </div>

  <h2 class="mt-5">Desenvolvedores</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <img src="..\img\toreto-e-braia.jpg" class="card-img-top" alt="Desenvolvedor 1">
        <div class="card-body">
          <h5 class="card-title">Nome do Desenvolvedor 1</h5>
          <p class="card-text">Breve descrição sobre o Desenvolvedor 1.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4">
        <img src="..\img\toreto-e-braia.jpg" class="card-img-top" alt="Desenvolvedor 2">
        <div class="card-body">
          <h5 class="card-title">Nome do Desenvolvedor 2</h5>
          <p class="card-text">Breve descrição sobre o Desenvolvedor 2.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection