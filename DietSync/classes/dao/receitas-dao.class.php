<?php

class ReceitasModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura)
    {
        $comando = $this->pdo->prepare("INSERT INTO receita (nome_receita, ingredientes, modo_preparo, calorias,proteinas,carboidratos, gordura) VALUES(:nr, :ing, :md, :cal, :pro, :carb, :gor)");

        $comando->bindValue(":nr", $nome_receita);
        $comando->bindValue(":ing", $ingredientes);
        $comando->bindValue(":md", $modo_preparo);
        $comando->bindValue(":cal", $calorias);
        $comando->bindValue(":pro", $proteinas);
        $comando->bindValue(":carb", $carboidratos);
        $comando->bindValue(":gor", $gordura);
        $comando->execute();
        header("Location: ../php/receitas.php");
        exit();
    }

    public function Receitas()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT nome_receita,id_receitas FROM receita");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function BuscarReceita($id_receita)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM receita WHERE id_receitas = :id");
        $comando->bindValue(":id",$id_receita);
        $comando->execute(); 
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;	
    }
}
