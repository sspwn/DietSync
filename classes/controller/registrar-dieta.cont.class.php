<?php

class RegistrarDieta
{
    private $pdo;

    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            echo "Erro com banco de dados: " . $th->getMessage();
            exit();
        }
    }

    public function adicionarDieta($data, $alimentos, $quantidade, $refeicao, $calorias, $observacoes, $lembrete)
    {
        $comando = $this->pdo->prepare("INSERT INTO dieta (data, alimentos, quantidade, refeicao, calorias, observacoes, lembrete) VALUES (:data, :alimentos, :quantidade, :refeicao, :calorias, :observacoes, :lembrete)");

        $comando->bindValue(':data', $data);
        $comando->bindValue(':alimentos', $alimentos);
        $comando->bindValue(':quantidade', $quantidade);
        $comando->bindValue(':refeicao', $refeicao);
        $comando->bindValue(':calorias', $calorias);
        $comando->bindValue(':observacoes', $observacoes);
        $comando->bindValue(':lembrete', $lembrete);
        $comando->execute();
        header("Location: ../php/registrar-dieta.php");
        exit();
    }
}
 