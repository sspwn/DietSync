<?php
class InserirTreino
{
    private $pdo;

    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
        } catch (PDOException $th) {
            echo "Erro com banco de dados: " . $th->getMessage();
            exit();
        } catch (Exception $e) {
            echo "Erro genérico: " . $e->getMessage();
            exit();
        }
    }

    // Cadastrar treino
    public function AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino)
    {
        $comando = $this->pdo->prepare("INSERT INTO treino (data, tipo, exercicios, repeticoes, series, objetivo, duracao, frequencia, nome_treino) VALUES(:data_treino, :tipo, :exercicios, :repeticoes, :series, :objetivo, :duracao, :frequencia, :nome_treino)");
        $comando->bindValue(":data_treino", $data);
        $comando->bindValue(":tipo", $tipo);
        $comando->bindValue(":exercicios", $exercicios);
        $comando->bindValue(":repeticoes", $repeticoes);
        $comando->bindValue(":series", $series);
        $comando->bindValue(":objetivo", $objetivo);
        $comando->bindValue(":duracao", $duracao);
        $comando->bindValue(":frequencia", $frequencia);
        $comando->bindValue(":nome_treino", $nome_treino);
        $comando->execute();
        header("Location: ../php/registrar-treino.php");
        exit();
    }

    public function Treinos()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT nome_treino,id FROM treino");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function BuscarTreino($id_treino)
{
    $resultado = array();
    $comando = $this->pdo->prepare("SELECT * FROM treino WHERE id = :id");
    $comando->bindValue(":id", $id_treino);
    $comando->execute(); 
    $resultado = $comando->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

}
