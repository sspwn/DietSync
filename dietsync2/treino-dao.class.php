<?php
class TreinoModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Cadastrar treino
    public function AdicionarTreino($data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino, $user_id)
    {
        $comando = $this->pdo->prepare("INSERT INTO treino (data, tipo, exercicios, repeticoes, series, objetivo, duracao, frequencia, nome_treino, fk_id_usuario_treino ) VALUES(:data_treino, :tipo, :exercicios, :repeticoes, :series, :objetivo, :duracao, :frequencia, :nome_treino, :user_id)");
        $comando->bindValue(":data_treino", $data);
        $comando->bindValue(":tipo", $tipo);
        $comando->bindValue(":exercicios", $exercicios);
        $comando->bindValue(":repeticoes", $repeticoes);
        $comando->bindValue(":series", $series);
        $comando->bindValue(":objetivo", $objetivo);
        $comando->bindValue(":duracao", $duracao);
        $comando->bindValue(":frequencia", $frequencia);
        $comando->bindValue(":nome_treino", $nome_treino);
        $comando->bindValue(":user_id", $user_id);
        $comando->execute();
        header("Location: treinos.php");
        exit();
    }

    public function ExcluirTreino($id_treino)
    {
        $comando = $this->pdo->prepare("DELETE FROM treino WHERE id = :id");
        $comando->bindValue(":id", $id_treino);
        $comando->execute();
        header("Location: treinos.php");
        exit();
    }

    public function EditarTreino($id_treino, $data, $tipo, $exercicios, $repeticoes, $series, $objetivo, $duracao, $frequencia, $nome_treino)
    {
        $comando = $this->pdo->prepare("UPDATE treino SET data = :data, tipo = :tipo, exercicios = :exercicios, repeticoes = :repeticoes, series = :series, objetivo = :objetivo, duracao = :duracao, frequencia = :frequencia, nome_treino = :nome_treino WHERE id = :id_treino");

        $comando->bindValue(":id_treino", $id_treino);
        $comando->bindValue(":data", $data);
        $comando->bindValue(":tipo", $tipo);
        $comando->bindValue(":exercicios", $exercicios);
        $comando->bindValue(":repeticoes", $repeticoes);
        $comando->bindValue(":series", $series);
        $comando->bindValue(":objetivo", $objetivo);
        $comando->bindValue(":duracao", $duracao);
        $comando->bindValue(":frequencia", $frequencia);
        $comando->bindValue(":nome_treino", $nome_treino);
        $comando->execute();
        header("Location: treinos.php");
        exit();
    }


    public function Treinos($user_id)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT nome_treino,id FROM treino WHERE fk_id_usuario_treino = :fk_id_usuario_treino ");
        $comando->bindValue(":fk_id_usuario_treino", $user_id);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function BuscarTreinoInfos($id_treino)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM treino WHERE id = :id");
        $comando->bindValue(":id", $id_treino);
        $comando->execute();
        $resultado = $comando->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
