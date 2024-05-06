<?php
require_once 'receitas-dao.class.php';
require_once 'conexao.php';

class ReceitasController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Utiliza a variável $pdo definida no arquivo de conexão
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new ReceitasModel($pdo);
    }

    public function RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura, $user_id)
    {
        $this->pdo->RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura, $user_id);
    }

    public function Receitas()
    {
        $resultado = array();
        $resultado = $this->pdo->Receitas();
        return $resultado;
    }

    public function ReceitasPorUsuario($userId)
    {
        $resultado = array();
        $resultado = $this->pdo->ReceitasPorUsuario($userId);
        return $resultado;
    }

    public function BuscarReceita($id_receita)
    {
        $resultado = array();
        $resultado = $this->pdo->BuscarReceita($id_receita);
        return $resultado;
    }

    public function EditarReceita($id_receita, $nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura)
    {
        $this->pdo->EditarReceita($id_receita, $nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura);
    }

    public function ExcluirReceita($id_receita)
    {
        $this->pdo->ExcluirReceita($id_receita);
    }
}
