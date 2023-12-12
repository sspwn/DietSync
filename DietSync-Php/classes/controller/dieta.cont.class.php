<?php
class RegistrarDieta
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


    // Cadastrar dieta
    public function AdicionarDieta($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $fk_id_usuario, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes)
    {
        $comando = $this->pdo->prepare("INSERT INTO dieta (nome_dieta, tipo_dieta, calorias, proteinas, carboidratos, gorduras, FK_usuario_id_usuario, data_dieta, refeicao, alimentos, quantidade, observacoes) VALUES(:nd, :td, :c, :pr, :cb, :g, :fk, :data, :refeicao, :alimentos, :quantidade, :observacoes)");

        $comando->bindValue(":nd", $nome_dieta);
        $comando->bindValue(":td", $tipo_dieta);
        $comando->bindValue(":c", $calorias);
        $comando->bindValue(":pr", $proteinas);
        $comando->bindValue(":cb", $carboidratos);
        $comando->bindValue(":g", $gorduras);
        $comando->bindValue(":fk", $fk_id_usuario);
        $comando->bindValue(":data", $data_dieta);
        $comando->bindValue(":refeicao", $refeicao);
        $comando->bindValue(":alimentos", $alimentos);
        $comando->bindValue(":quantidade", $quantidade);
        $comando->bindValue(":observacoes", $observacoes);
        $comando->execute();

        header("Location: ../php/registrar-dieta.php");
        exit();
    }

    public function DadosDieta($id_usuario){
        $resultado = array();
        $comando = $this->pdo->prepare("SELECT nome_dieta, refeicao, alimentos FROM dieta WHERE FK_usuario_id_usuario = :id )");
        $comando->bindValue(":id",$id_usuario);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;	
    }
}
