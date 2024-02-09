<?php

class Evolucao
{
    private $pdo;
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
        } catch (PDOException $th) {
            echo "erro com banco de dados" . $th->getMessage();
            exit();
        } catch (PDOException $th) {
            echo "erro generico: " . $th->getMessage();
            exit();
        }
    }

    public function RegistrarMedicao($data,$peso, $altura, $cintura,$user_id)
    {
        $comando = $this->pdo->prepare("INSERT INTO evolucaos (data, peso, altura, cintura, fk_id_evolucaos ) VALUES (:d, :p, :a, :c, :id)");
        // $comando->bindValue(":id",$id_usuario);
        $comando->bindValue(":d",$data);
        $comando->bindValue(":p",$peso);
        $comando->bindValue(":a",$altura);
        $comando->bindValue(":c",$cintura);
        $comando->bindValue(":id",$user_id);
        $comando->execute();
        header("Location: ../php/evolucao.php");
        exit();
    }

    public function dadosEvolucao($user_id){
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM evolucaos WHERE fk_id_evolucaos = :id");
        $comando->bindValue(":id", $user_id);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;	
    }
}
