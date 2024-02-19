<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Registro</title>
</head>
<?php
$page = 'registrar-user';
require_once '../classes/controller/usuario.cont.class.php';
$usuario = new Usuario("dietsync", "localhost", "root", "");
?>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['name'])) {
            $nome = addslashes($_POST['name']);
            $meta = addslashes($_POST['meta']);
            $sexo = addslashes($_POST['sexo']);
            $data_nasc = addslashes($_POST['data_nasc']);
            $peso = addslashes($_POST['peso']);
            $altura = addslashes($_POST['altura']);
            $email = addslashes($_POST['email']);
            $senha = password_hash(addslashes($_POST['password_confirmation']), PASSWORD_BCRYPT);

            if (!empty($nome) && ($meta) && ($sexo) && ($data_nasc) && ($peso) && ($altura) && ($email) && ($senha)) {
                $registrar_user = $usuario->CadastrarUser($nome, $meta, $sexo, $data_nasc, $peso, $altura, $email, $senha);
            }
        }
    }
    ?>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="../img/vertical_2.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Criar Conta</h1>
                <div>Preencha os campos para criar uma conta</div>
            </div>
            <form class="login-card-form" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Nome" id="name" name="name" autofocus required>
                </div>
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
                Já tem uma conta? <a href="index.php">Faça login.</a>
            </div>
        </div>
    </div>

</body>

</html>