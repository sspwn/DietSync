<?php

require_once 'usuario-dao.class.php';
require_once 'conexao.php';

class UsuarioController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Utiliza a variável $pdo definida no arquivo de conexão
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new UsuarioModel($pdo);
    }

    public function VerificarEmail($email)
    {
        return $this->pdo->VerificarEmail($email);
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
            // Chama a função Contador do DAO
            $this->pdo->Contador();
            return $user; // Retorna os dados do usuário
        }
    }

    public function TotalAcesso()
    {
        return $this->pdo->TotalAcesso();
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

    public function AtualizarUsuario($id, $nome, $sobrenome, $meta, $sexo, $data_nasc, $peso, $altura, $email)
    {
        $this->pdo->AtualizarUsuario($id, $nome, $sobrenome, $meta, $sexo, $data_nasc, $peso, $altura, $email);
    }

    public function AlterarSenha($id_user, $novaSenha)
    {
        $this->pdo->AlterarSenha($id_user, $novaSenha);
    }

    public function BuscarDadosAlterarSenha($email, $data_nasc)
    {
        return $this->pdo->BuscarDadosAlterarSenha($email, $data_nasc);
    }
}
