<?php
require_once '../config/Conexao.php';

class Cad_locador_model extends Conexao
{
    private $query;
    private $retorno;

    public function __construct()
    {

        parent::__construct();
    }

    public function listar()
    {
        $this->query = 'select * from cad_locador order by codloc ';

        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute();
        $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->retorno;
    }

    public function listarLocadorAlugueis()
    {

        $this->query = ' select * from cad_locador where codloc not in(select codloc_loca from cad_locacao )';

        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute();
        $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->retorno;
    }

    public function cadastrarLocador($nome, $preferencia, $fone, $celular, $rg, $cpf, $data)
    {

        $this->query = "insert into cad_locador (nome,preferencia,fone,cel,rg,cpf,data_cont)  values ('{$nome}', '{$preferencia}','{$fone}','{$celular}','{$rg}','{$cpf}','{$data}')";
        // print_r($this->query);exit();
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

    public function excluir($cod_locador)
    {
        $this->query = "delete from cad_locador where codloc = {$cod_locador}";

        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

    public function editar($codigo, $nome, $preferencia, $fone, $celular, $rg, $cpf, $data)
    {
        $this->query = "update cad_locador set nome = '{$nome}',preferencia = '{$preferencia}',
                        fone = '{$fone}',cel = '{$celular}',rg = '{$rg}',cpf = '{$cpf}',data_cont = '{$data}' where codloc = {$codigo}";

        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

}