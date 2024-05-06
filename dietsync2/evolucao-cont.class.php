<?php
require_once 'evolucao-dao.class.php';
require_once 'conexao.php';

class EvolucaoController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Utiliza a variável $pdo definida no arquivo de conexão
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new EvolucaoModel($pdo);
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
