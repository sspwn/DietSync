<?php
require_once '..\classes\dao\index-dao.class.php';
require_once '..\classes\utils\conexao.php';

class MenuController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Utiliza a variável $pdo definida no arquivo de conexão
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new MenuModel($pdo);
    }
}
