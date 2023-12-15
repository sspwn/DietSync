<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login</title>
</head>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="../img/vertical_2.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Entrar</h1>
                <div>Faça login para usar a plataforma</div>
            </div>
            <form class="login-card-form" action="{{ route('login.submit') }}" method="post">
                @csrf
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" name="email" placeholder="Email" id="emailForm" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="password" placeholder="Senha" id="passwordForm" required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" name="remember" checked>
                        <label for="rememberMeCheckbox">Lembrar de mim</label>
                    </div>
                    <a href="#">Esqueci minha senha!</a>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <div class="login-card-footer">
                Não tem uma conta? <a href="{{ route('registrar-usuario') }}">Crie uma conta gratuita.</a>
            </div>
        </div>
    </div>
    
</body>

</html>