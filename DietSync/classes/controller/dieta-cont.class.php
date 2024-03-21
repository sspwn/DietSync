<?php

require_once '..\classes\dao\dieta-dao.class.php';
class DietaController
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
            $this->pdo = new DietaModel($pdo);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            exit();
        }
    }


    // Cadastrar dieta
    public function AdicionarDieta($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id)
    {
        $this->pdo->AdicionarDietaDao($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id);
    }

    public function DadosDieta($user_id)
    {
        $resultado = array();
        $resultado = $this->pdo->DadosDieta($user_id);
        return $resultado;
    }
}
