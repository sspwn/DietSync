<?php
class UsuarioModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function CadastrarUser($nome, $sobrenome, $meta, $sexo, $data_nasc, $peso, $altura, $email, $senha)
    {
        $comando = $this->pdo->prepare("INSERT INTO users(name, sobrenome, meta, sexo, data_nasc, peso, altura, email, password) VALUES(:name,:sobrenome, :meta, :sexo, :data, :peso, :altura, :email, :password)");

        $comando->bindValue(":name", $nome);
        $comando->bindValue(":sobrenome", $sobrenome);
        $comando->bindValue(":meta", $meta);
        $comando->bindValue(":sexo", $sexo);
        $comando->bindValue(":data", $data_nasc);
        $comando->bindValue(":peso", $peso);
        $comando->bindValue(":altura", $altura);
        $comando->bindValue(":email", $email);
        $comando->bindValue(":password", $senha);
        $comando->execute();

        header("Location: ../php/home.php");
        exit();
    }

    public function VerificarLogin($email, $senha)
    {
        // Verifica na tabela 'users'
        $comandoUser = $this->pdo->prepare("SELECT id, name, email, password FROM users WHERE email = :email");
        $comandoUser->bindValue(":email", $email);
        $comandoUser->execute();
        $user = $comandoUser->fetch(PDO::FETCH_ASSOC);
        // Verifica se o usuário foi encontrado e se a senha está correta
        if ($user && password_verify($senha, $user['password'])) {
            return $user; // Retorna os dados do usuário
        }
    }

    public function ObterNomeUsuario($email)
    {
        // Verifica na tabela 'users'
        $comandoUser = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $comandoUser->bindValue(":email", $email);
        $comandoUser->execute();
        $user = $comandoUser->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function ObterUsuario($id_user)
    {
        // Verifica na tabela 'users'
        $comandoUser = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $comandoUser->bindValue(":id", $id_user);
        $comandoUser->execute();
        $user = $comandoUser->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function ObterTodosUsuarios()
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT id,`name` FROM users");
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }


    public function AtualizarUsuario($id, $nome, $meta, $sexo, $data_nasc, $peso, $altura, $email)
    {
        $comando = $this->pdo->prepare("UPDATE users SET name = :name, meta = :meta, sexo = :sexo, data_nasc = :data, peso = :peso, altura = :altura, email = :email WHERE id = :id");

        $comando->bindValue(":id", $id);
        $comando->bindValue(":name", $nome);
        $comando->bindValue(":meta", $meta);
        $comando->bindValue(":sexo", $sexo);
        $comando->bindValue(":data", $data_nasc);
        $comando->bindValue(":peso", $peso);
        $comando->bindValue(":altura", $altura);
        $comando->bindValue(":email", $email);
        $comando->execute();
        // Redireciona para a mesma página após a atualização
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }

    public function Contador()
    {
        // Consulta o valor atual do contador
        $comando = $this->pdo->prepare("SELECT contador FROM contador");
        $comando->execute();
        $ultimo_contador = $comando->fetch(PDO::FETCH_ASSOC);

        // Incrementa o valor do contador em 1
        $novo_contador = $ultimo_contador['contador'] + 1;

        // Atualiza o último registro na tabela 'contador' com o novo valor do contador
        $comando = $this->pdo->prepare("UPDATE contador SET contador = :novo_contador");
        $comando->bindValue(":novo_contador", $novo_contador);
        $comando->execute();
    }

    public function TotalAcesso()
    {
        $comando = $this->pdo->prepare("SELECT contador FROM contador");
        $comando->execute();
        return $comando->fetch(PDO::FETCH_ASSOC);
    }
}
