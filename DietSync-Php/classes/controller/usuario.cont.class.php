<?php
class Usuario
{
    private $pdo;

    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
        } catch (PDOException $th) {
            echo "Erro com banco de dados: " . $th->getMessage();
            exit();
        } catch (Exception $e) {
            echo "Erro genérico: " . $e->getMessage();
            exit();
        }
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

        header("Location: ../php/index1.php");
        exit();
    }

    public function VerificarLogin($email, $senha)
    {
        $comando = $this->pdo->prepare("SELECT email, password FROM users WHERE email = :email");
        $comando->bindValue(":email", $email);
        $comando->execute();

        $usuario = $comando->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['password'])) {
            // As credenciais estão corretas
            return true;
        } else {
            // As credenciais estão incorretas
            return false;
        }
    }

    public function ObterNomeUsuario($email) {
        $comando = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $comando->bindValue(":email", $email);
        $comando->execute();

        $resultado = $comando->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function ObterUsuario($name)
    {
        $comando = $this->pdo->prepare("SELECT * FROM users WHERE name = :nome");
        $comando->bindValue(":nome", $name);
        $comando->execute();

       $resultado = $comando->fetch(PDO::FETCH_ASSOC);
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
