<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style1.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
  <title>Login</title>
</head>

<body>
  <?php
  require_once 'usuario-cont.class.php';
  $usuario = new UsuarioController();
  $contador = $usuario->TotalAcesso();

  // Inicia a sessão
  session_start();

  // Verifica se o usuário já está autenticado, se sim, redireciona para a página home
  if (isset($_SESSION['name'])) {
    header("Location: home.php");
    exit();
  }

  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['password']);

    if ($usuario->VerificarLogin($email, $senha)) {
      // Login bem-sucedido, obtenha o nome do usuário
      $name = $usuario->ObterNomeUsuario($email);

      // Armazene o nome do usuário em uma sessão
      $_SESSION['name'] = $name['name'];
      $_SESSION['id'] = $name['id'];

      // Redirecione para a página de carregamento
      header("Location: loading.php");
      exit();
    } else {
      echo "Login incorreto. Tente novamente.";
    }
  }

  ?>
  <div class="login-card-container">
    <div class="login-card">
      <div class="login-card-logo">
        <img src="img/vertical_2.png" alt="logo">
      </div>
      <div class="login-card-header">
        <h1>Entrar</h1>
        <div>Faça login para usar a plataforma</div>
      </div>
      <form class="login-card-form" method="post">
        <div class="form-item">
          <span class="form-item-icon material-symbols-rounded">mail</span>
          <input type="text" name="email" placeholder="Email" id="emailForm" autofocus required>
        </div>
        <div class="form-item">
          <span class="form-item-icon material-symbols-rounded">lock</span>
          <input type="password" name="password" placeholder="Senha" id="password" required>
        </div>
        <div class="form-item-other">
          <div class="checkbox">
            <input type="checkbox" id="rememberMeCheckbox" name="remember" checked>
            <label for="rememberMeCheckbox">Lembrar de mim</label>
          </div>
          <a href="./recuperar-senha.php">Esqueci minha senha!</a>
        </div>
        <button type="submit">Entrar</button>
      </form>
      <div class="login-card-footer">
      <p>Total de acessos: <?php echo $contador['contador']; ?></p>
        Não tem uma conta? <a href="./registrar-usuario.php">Crie uma conta como usuário</a>
      </div>
    </div>
  </div>
</body>

</html>
