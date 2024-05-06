<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
</head>
<?php
require_once 'usuario-cont.class.php';
$usuario = new UsuarioController();

$novaSenhaVisible = false;
if (isset($_POST['email']) && isset($_POST['data_nascimento'])) {
    $email = addslashes($_POST['email']);
    $data_nasc = addslashes($_POST['data_nascimento']);

    $dadosUser = $usuario->BuscarDadosAlterarSenha($email, $data_nasc);

    if ($dadosUser) {
        $novaSenhaVisible = true;
    }
}

if (isset($_POST['nova_senha']) && isset($_POST['confirmar_senha'])) {
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];
    $id_user = $_POST['id'];
    // Verifica se as senhas são iguais
    if ($novaSenha === $confirmarSenha) {
        // Chama o método para alterar a senha
        $novaSenha = password_hash(addslashes($_POST['nova_senha']), PASSWORD_BCRYPT);
        $usuario->AlterarSenha($id_user, $novaSenha);
        header("Location: index.php");
    }
}
?>

<body>
    <div class="login-card">
        <div class="login-card-header">
            <h1>Recuperar Senha</h1>
            <div>Informe seu email e data de nascimento para recuperar sua senha.</div>
        </div>
        <form class="login-card-form" method="post">
            <div class="form-item">
                <input type="email" name="email" value="<?php echo isset($email) ? $email : '' ?>" placeholder="Email" required>
            </div>
            <div class="form-item">
                <input type="date" name="data_nascimento" value="<?php echo isset($data_nasc) ? $data_nasc : '' ?>" placeholder="Data de Nascimento" required>
            </div>
            <?php if ($novaSenhaVisible) { ?>
                <input type="hidden" name="id" value="<?php echo $dadosUser['id']; ?>">
                <div class="form-item block">
                    <div class="form-item block">
                        <input type="password" name="nova_senha" placeholder="Nova Senha">
                    </div>
                    <div class="form-item block">
                        <input type="password" name="confirmar_senha" placeholder="Confirmar Nova Senha">
                    </div>
                    <button type="submit">Alterar Senha</button>
                <?php } else { ?>
                    <button type="submit">Enviar</button>
                <?php } ?>
        </form>
        <div class="login-card-footer">
            <a href="index.php">Voltar para o Login</a>
        </div>
    </div>
</body>

</html>