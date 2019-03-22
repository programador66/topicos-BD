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

        $this->query = 'select * from cad_locacao order by cod_loca ';

        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute();
        $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

}