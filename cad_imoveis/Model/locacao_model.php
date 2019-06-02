<?php

require_once "../config/Conexao.php";

class Locacao_model extends Conexao
{

    private $query;
    private $retorno;

    public function __construct()
    {

        parent::__construct();
    }

    public function listar()
    {

        $this->query = 'select cl.cod_loca, cm.descr, cl.`codimo_loca`,ld.nome, cl.`codloc_loca`, cl.`valor`, cl.`valor_ext`, cl.`dt_loca`, cl.`situacao` from cad_locacao as cl
                        inner join cad_imovel as cm on  cl.codimo_loca = cm.cod_imo
                        inner join cad_locador as ld on cl.codloc_loca = ld.codloc
                        order by cl.cod_loca';

        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute();
        $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->retorno;
    }

    public function atualizarSituacao($cod_loca, $situacao){
       
        $this->query = "update cad_locacao set situacao = '{$situacao}' where cod_loca = $cod_loca";
        // print_r($this->query);exit();
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

    public function cadastrarLocacao($imovel, $cliente, $valor, $valor_ext, $dt_loca, $situacao)
    {

        $this->query = "INSERT INTO `cad_locacao` ( `codimo_loca`, `codloc_loca`, `valor`, `valor_ext`, `dt_loca`, `situacao`)
                         VALUES ( '{$imovel}', '{$cliente}', '{$valor}', '{$valor_ext}', '{$dt_loca}', '{$situacao}')";
        // print_r($this->query);exit();
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

    public function excluir($cod_locacao)
    {

        $this->query = "delete from cad_locacao where cod_loca = {$cod_locacao} ";
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

}