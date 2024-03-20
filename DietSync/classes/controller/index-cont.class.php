<?php
require_once '..\classes\dao\index-dao.class.php';

class MenuController
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
            $this->pdo = new MenuModel($pdo);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
            exit();
        }
    }
}
