<?php

class EvolucaoModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function RegistrarMedicao($data,$peso, $altura, $cintura,$user_id)
    {
        $comando = $this->pdo->prepare("INSERT INTO evolucaos (`data`, peso, altura, cintura, fk_id_evolucaos ) VALUES (:d, :p, :a, :c, :id)");
        // $comando->bindValue(":id",$id_usuario);
        $comando->bindValue(":d",$data);
        $comando->bindValue(":p",$peso);
        $comando->bindValue(":a",$altura);
        $comando->bindValue(":c",$cintura);
        $comando->bindValue(":id",$user_id);
        $comando->execute();
        header("Location:evolucao.php");
        exit();
    }

    public function ExcluirEvolucao($id_excluir_evolucao){
        $comando = $this->pdo->prepare("DELETE FROM evolucaos WHERE id = :id");
        $comando->bindValue(":id", $id_excluir_evolucao);
        $comando->execute();
        header("Location: evolucao.php");
        exit();
    }

    public function dadosEvolucao($user_id){
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM evolucaos WHERE fk_id_evolucaos = :id ORDER BY `data`");
        $comando->bindValue(":id", $user_id);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;	
    }
}
