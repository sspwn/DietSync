<?php
class UsuarioModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function CadastrarUser($nome, $meta, $sexo, $data_nasc, $peso, $altura, $email, $senha)
    {
        $comando = $this->pdo->prepare("INSERT INTO users(name, meta, sexo, data_nasc, peso, altura, email, password) VALUES(:name, :meta, :sexo, :data, :peso, :altura, :email, :password)");

        $comando->bindValue(":name", $nome);
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

        // Se o usuário estiver na tabela 'users', retorna os dados
        if ($user) {
            return $user;
        }

        // Se não estiver na tabela 'users', verifica na tabela 'personal'
        $comandoPersonal = $this->pdo->prepare("SELECT * FROM personal WHERE email = :email");
        $comandoPersonal->bindValue(":email", $email);
        $comandoPersonal->execute();
        $personal = $comandoPersonal->fetch(PDO::FETCH_ASSOC);

        // Se o usuário estiver na tabela 'personal', retorna os dados
        if ($personal) {
            return $personal;
        }

        // Se não estiver na tabela 'personal', verifica na tabela 'nutricionista'
        $comandoNutricionista = $this->pdo->prepare("SELECT * FROM nutricionista WHERE email = :email");
        $comandoNutricionista->bindValue(":email", $email);
        $comandoNutricionista->execute();
        $nutricionista = $comandoNutricionista->fetch(PDO::FETCH_ASSOC);

        // Se o usuário estiver na tabela 'nutricionista', retorna os dados
        if ($nutricionista) {
            return $nutricionista;
        }

        // Se o usuário não estiver em nenhuma das tabelas, retorna falso
        return false;
    }

    public function ObterUsuario($name)
    {
        // Verifica na tabela 'users'
        $comandoUser = $this->pdo->prepare("SELECT * FROM users WHERE name = :name");
        $comandoUser->bindValue(":name", $name);
        $comandoUser->execute();
        $user = $comandoUser->fetch(PDO::FETCH_ASSOC);

        // Se o usuário estiver na tabela 'users', retorna os dados
        if ($user) {
            return $user;
        }

        // Se não estiver na tabela 'users', verifica na tabela 'personal'
        $comandoPersonal = $this->pdo->prepare("SELECT * FROM personal WHERE `name` = :name");
        $comandoPersonal->bindValue(":name", $name);
        $comandoPersonal->execute();
        $personal = $comandoPersonal->fetch(PDO::FETCH_ASSOC);

        // Se o usuário estiver na tabela 'personal', retorna os dados
        if ($personal) {
            return $personal;
        }

        // Se não estiver na tabela 'personal', verifica na tabela 'nutricionista'
        $comandoNutricionista = $this->pdo->prepare("SELECT * FROM nutricionista WHERE `name` = :name");
        $comandoNutricionista->bindValue(":name", $name);
        $comandoNutricionista->execute();
        $nutricionista = $comandoNutricionista->fetch(PDO::FETCH_ASSOC);

        // Se o usuário estiver na tabela 'nutricionista', retorna os dados
        if ($nutricionista) {
            return $nutricionista;
        }

        // Se o usuário não estiver em nenhuma das tabelas, retorna falso
        return false;
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
}
