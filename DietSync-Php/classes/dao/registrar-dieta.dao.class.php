<?php

class Registrar
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

    //Buscar serviços para ser selecioando na tela
    public function BuscarServico()
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT id_servico, nome_servico, patrimonio FROM servico ORDER BY nome_servico");
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    //Cadastrar serviço
    public function Cadastrar($nome, $chapa, $centro_custo, $ramal, $tipo_servico, $desc_problema, $pat_equipamento, $data_hora_registro,$andamento)
    {
        $comando = $this->pdo->prepare("INSERT INTO registro (nome_solicitante, chapa_solicitante, centro_custo, ramal, tipo_servico, desc_problema, pat_equipamento, data_registro, andamento) VALUES(:n, :c, :cc, :r, :ts, :dp, :pe, :d, :a)");
        $comando->bindValue(":n", $nome);
        $comando->bindValue(":c", $chapa);
        $comando->bindValue(":cc", $centro_custo);
        $comando->bindValue(":r", $ramal);
        $comando->bindValue(":ts", $tipo_servico);
        $comando->bindValue(":dp", $desc_problema);
        $comando->bindValue(":pe", $pat_equipamento);
        $comando->bindValue(":d", $data_hora_registro);
        $comando->bindValue(":a", $andamento);
        $comando->execute();
        header("Location: ../php/registrar-ssi.php");
        exit();
    }

    //Tentar exibir o campo de patrimonio, na tela, caso o patrimonio do servico seja necessário
    public function Patrimonio($nome_servico)
    {
        $resultado = array();
        $comando = $this->pdo->query("SELECT patrimonio FROM servico WHERE nome_servico = :n");
        $comando->bindValue(":n", $nome_servico);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
