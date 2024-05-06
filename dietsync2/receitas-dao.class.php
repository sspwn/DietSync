<?php

class ReceitasModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function RegistrarReceita($nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura, $user_id)
    {
        $comando = $this->pdo->prepare("INSERT INTO receita (nome_receita, ingredientes, modo_preparo, calorias,proteinas,carboidratos, gordura, fk_id_user_receita) VALUES(:nr, :ing, :md, :cal, :pro, :carb, :gor, :fk_id_user_receita )");

        $comando->bindValue(":nr", $nome_receita);
        $comando->bindValue(":ing", $ingredientes);
        $comando->bindValue(":md", $modo_preparo);
        $comando->bindValue(":cal", $calorias);
        $comando->bindValue(":pro", $proteinas);
        $comando->bindValue(":carb", $carboidratos);
        $comando->bindValue(":gor", $gordura);
        $comando->bindValue(":fk_id_user_receita", $user_id);
        $comando->execute();
        header("Location: receitas.php");
        exit();
    }

    public function Receitas()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT nome_receita,id_receitas FROM receita");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function ReceitasPorUsuario($userId)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT nome_receita, id_receitas FROM receita WHERE fk_id_user_receita = :id");
        $comando->bindValue(":id", $userId);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function BuscarReceita($id_receita)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM receita WHERE id_receitas = :id");
        $comando->bindValue(":id", $id_receita);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function EditarReceita($id_receita, $nome_receita, $ingredientes, $modo_preparo, $calorias, $proteinas, $carboidratos, $gordura)
    {
        $comando = $this->pdo->prepare("UPDATE receita SET 
    nome_receita = :nr, 
    ingredientes = :ing, 
    modo_preparo = :md, 
    calorias = :cal, 
    proteinas = :pro, 
    carboidratos = :carb, 
    gordura = :gor 
    WHERE id_receitas = :id AND :id");

        $comando->bindValue(":id", $id_receita);
        $comando->bindValue(":nr", $nome_receita);
        $comando->bindValue(":ing", $ingredientes);
        $comando->bindValue(":md", $modo_preparo);
        $comando->bindValue(":cal", $calorias);
        $comando->bindValue(":pro", $proteinas);
        $comando->bindValue(":carb", $carboidratos);
        $comando->bindValue(":gor", $gordura);
        $comando->execute();
        header("Location: receitas.php");
        exit();
    }

    public function ExcluirReceita($id_receita)
    {
        $comando = $this->pdo->prepare("DELETE FROM receita WHERE id_receitas = :id");
        $comando->bindValue(":id", $id_receita);
        $comando->execute();
        header("Location: receitas.php");
        exit();
    }
}
