<?php

class Historico{
    private $pdo;
    public function __construct($dbname, $host,$user,$senha){
        try {
            $this->pdo = new PDO ("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        } catch (PDOException $th) {
            echo "erro com banco de dados".$th->getMessage();
            exit();
        }
        catch (PDOException $th) {
        echo"erro generico: ".$th->getMessage();
        exit();
        }
    }
    
    public function Historico(){
        $resultado = array();
        $comando = $this->pdo->query("SELECT DATE_FORMAT(STR_TO_DATE(data_registro, '%Y-%m-%d %H:%i:%s'), '%d/%m/%Y %H:%i:%s') as data_formatada, desc_problema, responsavel_tecnico FROM registro WHERE andamento = 5");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
