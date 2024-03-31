<?php
require_once '..\classes\dao\evolucao-dao.class.php';
class EvolucaoController
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
            $this->pdo = new EvolucaoModel($pdo);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            exit();
        }
    }

    public function RegistrarMedicao($data, $peso, $altura, $cintura, $user_id)
    {
        $this->pdo->RegistrarMedicao($data, $peso, $altura, $cintura, $user_id);
    }

    public function ExcluirEvolucao($id_excluir_evolucao)
    {
        $this->pdo->ExcluirEvolucao($id_excluir_evolucao);
    }

    
    public function dadosEvolucao($user_id)
    {
        $resultado = array();
        $resultado = $this->pdo->dadosEvolucao($user_id);
        return $resultado;
    }
}
