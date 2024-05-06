<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carregando...</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f5f5f5;
    }

    .loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .loader img {
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>
  <div class="loader">
    <img src="img/GIF.gif" alt="Carregando..." />
  </div>

  <script>
    setTimeout(function() {
      window.location.href = "home.php"; // Redireciona para a página home após 5 segundos
    }, 4500); // Tempo em milissegundos
  </script>
</body>

</html>
