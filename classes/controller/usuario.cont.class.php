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
        $comando = $this->pdo->prepare("SELECT name FROM users WHERE email = :email");
        $comando->bindValue(":email", $email);
        $comando->execute();

        $resultado = $comando->fetch(PDO::FETCH_ASSOC);

        return $resultado['name']; // Supondo que o campo seja 'nome' no seu banco de dados
    }

}