<?php

class Gerenciar
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

    //Mostra os técnicos disponíveis para ser selecionado nos trabalhos
    public function BuscarTecnico()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT nome_tecnico FROM tecnico  WHERE mostrar <> 0 ORDER BY nome_tecnico");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    //Mostra as SSI que aguardam técnicos
    public function AguardandoTecnico()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT  id_ssi,nome_solicitante, ramal, tipo_servico,desc_problema FROM registro WHERE responsavel_tecnico IS NULL ORDER BY nome_solicitante");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }


    //Atribui um técnico a SSI
    public function AtribuirTecnico($id, $tecnico,$andamento)
    {
        $comando = $this->pdo->prepare("UPDATE registro SET responsavel_tecnico	 = :tecnico, andamento = :a WHERE id_ssi =:id");
        $comando->bindParam(":id", $id);
        $comando->bindParam(":tecnico", $tecnico);
        $comando->bindValue(":a", $andamento);
        $comando->execute();
    }

    //Seleciona as SSI que já estão com técnico
    public function EmAndamento()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT id_ssi, nome_solicitante, ramal, tipo_servico, desc_problema, responsavel_tecnico FROM registro WHERE responsavel_tecnico IS NOT NULL AND andamento <> 5 ORDER BY nome_solicitante");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function Finalizar($id, $andamento){
        $comando = $this->pdo->prepare("UPDATE registro SET andamento = :andamento WHERE id_ssi = :id");
        $comando->bindValue(":id", $id);
        $comando->bindValue(":andamento",$andamento);
        $comando->execute();
    }
}
