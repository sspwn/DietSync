<?php
require_once '..\classes\dao\receitas-dao.class.php';

class ReceitasController
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
            $this->pdo = new ReceitasModel($pdo);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            exit();
        }
    }

    public function RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura)
    {
        $this->pdo->RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura);
    }

    public function Receitas()
    {
        $resultado = array();
        $resultado = $this->pdo->Receitas();
        return $resultado;
    }

    public function BuscarReceita($id_receita)
    {
        $resultado = array();
        $resultado = $this->pdo->BuscarReceita($id_receita);
        return $resultado;
    }
}
