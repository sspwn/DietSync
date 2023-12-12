<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Registro</title>
</head>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="../img/vertical_2.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Criar Conta</h1>
                <div>Preencha os detalhes para criar uma conta</div>
            </div>
            <form class="login-card-form" method="POST" action="{{ route('registrar-usuario') }}">
                @csrf
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Nome" id="name" name="name" autofocus required>
                </div>
                <!-- Campos adicionados -->
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">star</span>
                    <input type="text" placeholder="Meta" id="meta" name="meta" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">people</span>
                    <select id="sexo" name="sexo" class="form-select" required>
                        <option value="" disabled selected>Selecione o Sexo</option>
                        <option value="Fem">Feminino</option>
                        <option value="Mas">Masculino</option>
                    </select>
                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">event</span>
                    <input type="date" placeholder="Data de Nascimento" id="data_nasc" name="data_nasc" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">fitness_center</span>
                    <input type="text" placeholder="Peso" id="peso" name="peso" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">height</span>
                    <input type="text" placeholder="Altura" id="altura" name="altura" required>
                </div>
                <!-- Fim dos campos adicionados -->
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" placeholder="Email" id="email" name="email" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Senha" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit">Registrar</button>
            </form>
            <div class="login-card-footer">
                Já tem uma conta? <a href="{{ route('login') }}">Faça login.</a>
            </div>
        </div>
        <div class="login-card-social">
            <div>Outras opções de login</div>
            <div class="login-card-social-btns">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</body>

</html>