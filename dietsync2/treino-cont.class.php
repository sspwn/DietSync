<?php

require_once 'treino-dao.class.php';
require_once 'conexao.php';

class TreinoController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Utiliza a variável $pdo definida no arquivo de conexão
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new TreinoModel($pdo);
    }

    // Cadastrar treino
    public function AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id)
    {
        $this->pdo->AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id);
    }
    public function EditarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id)
    {
        $this->pdo->EditarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id);
    }

    public function ExcluirTreino($id_treino){
        $this->pdo->ExcluirTreino($id_treino);
    }
    public function Treinos($user_id)
    {
        $resultado = array();
        $resultado = $this->pdo->Treinos($user_id);
        return $resultado;
    }

    public function BuscarTreinoInfos($id_treino)
    {
        $resultado = array();
        $resultado = $this->pdo->BuscarTreinoInfos($id_treino);
        return $resultado;
    }
}
