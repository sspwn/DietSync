<?php

require_once '..\classes\dao\treino-dao.class.php';

class TreinoController
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
            $this->pdo = new TreinoModel($pdo);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            exit();
        }
    }

    // Cadastrar treino
    public function AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id)
    {
        $this->pdo->AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id);
    }

    public function Treinos($user_id)
    {
        $resultado = array();
        $resultado = $this->pdo->Treinos($user_id);
        return $resultado;
    }

    public function BuscarTreino($id_treino)
    {
        $resultado = array();
        $resultado = $this->pdo->BuscarTreino($id_treino);
        return $resultado;
    }
}
