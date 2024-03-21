<?php

require_once '..\classes\dao\usuario-dao.class.php';

class UsuarioController
{
    private $pdo;
    public function __construct()
    {
        // Conexão com o banco de dados. Substitua as credenciais pelas suas.
        $dbname = 'dietsync';
        $host = 'localhost';
        $user = 'root';
        $senha = '';
        try {
            $pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = new UsuarioModel($pdo);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            exit();
        }
    }
    public function CadastrarUser($nome, $sobrenome, $meta, $sexo, $data_nasc, $peso, $altura, $email, $senha)
    {
        $this->pdo->CadastrarUser($nome, $sobrenome, $meta, $sexo, $data_nasc, $peso, $altura, $email, $senha);
    }

    public function VerificarLogin($email, $senha)
    {
        // Verifica na tabela 'users'
        $user = $this->pdo->VerificarLogin($email, $senha);
        // Verifica se o usuário foi encontrado e se a senha está correta
        if ($user && password_verify($senha, $user['password'])) {
            return $user; // Retorna os dados do usuário
        }
    }

    public function ObterNomeUsuario($email)
    {
        // Verifica na tabela 'users'
        $user = $this->pdo->ObterNomeUsuario($email);
        // Se o usuário estiver na tabela 'users', retorna os dados
        return $user;
    }
    public function ObterUsuario($id_user)
    {
        // Verifica na tabela 'users'
        $user = $this->pdo->ObterUsuario($id_user);
        return $user;
    }

    public function ObterTodosUsuarios()
    {
        $resultado = array();
        $resultado = $this->pdo->ObterTodosUsuarios();
        return $resultado;
    }

    public function AtualizarUsuario($id, $nome, $meta, $sexo, $data_nasc, $peso, $altura, $email)
    {
       $this->pdo->AtualizarUsuario($id, $nome, $meta, $sexo, $data_nasc, $peso, $altura, $email);
    }
}
