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

    public function RegistrarMedicao($peso, $altura, $cintura, $data)
    {
        $comando = $this->pdo->prepare("INSERT INTO evolucaos (data, peso, altura, cintura) VALUES (:d :p, :a, :c, :d)");
        // $comando->bindValue(":id",$id_usuario);
        $comando->bindValue(":d",$data);
        $comando->bindValue(":p",$peso);
        $comando->bindValue(":a",$altura);
        $comando->bindValue(":c",$cintura);
        $comando->bindValue(":d",$data);
        $comando->execute();
        header("Location: ../php/evolucao.php");
        exit();
    }

    public function dadosEvolucao(){
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM evolucaos");
        // $comando->bindValue(":id", $id_usuario);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;	
    }
}
