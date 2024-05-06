<?php

require_once 'dieta-dao.class.php';
require_once 'conexao.php';

class DietaController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Utiliza a variável $pdo definida no arquivo de conexão
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new DietaModel($pdo);
    }


    // Cadastrar dieta
    public function AdicionarDieta($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id)
    {
        $this->pdo->AdicionarDietaDao($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id);
    }

    public function DadosEditarDieta($id_editar_dieta)
    {
        $resultado = array();
        $resultado = $this->pdo->DadosEditarDieta($id_editar_dieta);
        return $resultado;
    }
    
    public function EditarDieta($id_editar_dieta,$nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes){
        $this->pdo->EditarDieta($id_editar_dieta,$nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes);
    }

    public function ExcluirDieta($id_dieta_excluir){
        $this->pdo->ExcluirDieta($id_dieta_excluir);
    }

    public function DadosDieta($user_id)
    {
        $resultado = array();
        $resultado = $this->pdo->DadosDieta($user_id);
        return $resultado;
    }
}
