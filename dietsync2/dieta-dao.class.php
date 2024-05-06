<?php
class DietaModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Cadastrar dieta
    public function AdicionarDietaDao($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id)
    {
        $comando = $this->pdo->prepare("INSERT INTO dietas (nome_dieta, tipo_dieta, calorias, proteinas, carboidratos, gorduras, data_dieta, refeicao, alimentos, quantidade, observacoes, fk_id_usuario_dieta) VALUES(:nd, :td, :c, :pr, :cb, :g, :data, :refeicao, :alimentos, :quantidade, :observacoes, :id)");

        $comando->bindValue(":nd", $nome_dieta);
        $comando->bindValue(":td", $tipo_dieta);
        $comando->bindValue(":c", $calorias);
        $comando->bindValue(":pr", $proteinas);
        $comando->bindValue(":cb", $carboidratos);
        $comando->bindValue(":g", $gorduras);
        $comando->bindValue(":data", $data_dieta);
        $comando->bindValue(":refeicao", $refeicao);
        $comando->bindValue(":alimentos", $alimentos);
        $comando->bindValue(":quantidade", $quantidade);
        $comando->bindValue(":observacoes", $observacoes);
        $comando->bindValue(":id", $user_id);
        $comando->execute();

        header("Location: dieta.php");
        exit();
    }

    public function DadosEditarDieta($id_editar_dieta)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM dietas WHERE id_dieta = :id ");
        $comando->bindValue(":id", $id_editar_dieta);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function EditarDieta($id_editar_dieta,$nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes)
    {
        $comando = $this->pdo->prepare("UPDATE dietas SET 
            nome_dieta = :nome_dieta, 
            tipo_dieta = :tipo_dieta, 
            calorias = :calorias, 
            proteinas = :proteinas, 
            carboidratos = :carboidratos, 
            gorduras = :gorduras, 
            data_dieta = :data_dieta, 
            refeicao = :refeicao, 
            alimentos = :alimentos, 
            quantidade = :quantidade, 
            observacoes = :observacoes 
            WHERE id_dieta = :id_dieta");
        $comando->bindValue(':nome_dieta', $nome_dieta);
        $comando->bindValue(':tipo_dieta', $tipo_dieta);
        $comando->bindValue(':calorias', $calorias);
        $comando->bindValue(':proteinas', $proteinas);
        $comando->bindValue(':carboidratos', $carboidratos);
        $comando->bindValue(':gorduras', $gorduras);
        $comando->bindValue(':data_dieta', $data_dieta);
        $comando->bindValue(':refeicao', $refeicao);
        $comando->bindValue(':alimentos', $alimentos);
        $comando->bindValue(':quantidade', $quantidade);
        $comando->bindValue(':observacoes', $observacoes);
        $comando->bindParam(':id_dieta', $id_editar_dieta);
        $comando->execute();
        header("Location: dieta.php");
        exit();
    }

    public function ExcluirDieta($id_dieta_excluir)
    {
        $comando = $this->pdo->prepare("DELETE FROM dietas WHERE id_dieta = :id");
        $comando->bindValue(":id", $id_dieta_excluir);
        $comando->execute();
        header("Location: dieta.php");
        exit();
    }
    public function DadosDieta($user_id)
    {
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT * FROM dietas WHERE fk_id_usuario_dieta = :id ");
        $comando->bindValue(":id", $user_id);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
