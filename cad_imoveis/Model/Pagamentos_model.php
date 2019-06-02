<?php
require_once '../config/Conexao.php';

class Pagamentos_model extends Conexao
{
    private $query;
    private $retorno;

    public function __construct()
    {

        parent::__construct();
    }

    public function listarPagamentosPorId($codloca_pg)
    {
        $this->query = "select * from cad_pgto where codloca = {$codloca_pg}";

        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute();
        $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->retorno;
    }

    // public function listarImovelAlugueis()
    // {

    //     $this->query = ' select * from cad_imovel where cod_imo not in(select codimo_loca from cad_locacao )';

    //     $stmt = $this->pdo->prepare($this->query);
    //     $stmt->execute();
    //     $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $this->retorno;
    // }

    public function cadastrarPagamentos($codloca_pg,$data_pg,$num_rec,$dt_inicio,$dt_venc)
    {

        $this->query = "INSERT INTO cad_pgto (codloca,data_pg,num_rec,dt_inicio,dt_vence)
                         VALUES('$codloca_pg','$data_pg',$num_rec,'$dt_inicio','$dt_venc')";

        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

    // public function excluir($id_imovel)
    // {
    //     $this->query = "delete from cad_imovel where cod_imo = {$id_imovel}";

    //     $stmt = $this->pdo->prepare($this->query);
    //     $this->retorno = $stmt->execute();

    //     return $this->retorno;
    // }

    public function atualizarPagamento($codloca_pg,$data_pg,$num_rec,$dt_inicio,$dt_venc)
    {
        $this->query = "update cad_pgto set data_pg = '{$data_pg}', num_rec = {$num_rec}, 
                        dt_inicio = '{$dt_inicio}', dt_vence = '{$dt_venc}' where codloca = '{$codloca_pg}'";
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute();

        return $this->retorno;
    }

}