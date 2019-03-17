<?php
require_once '../config/Conexao.php';

class Cad_imovel_model extends Conexao{
    private $query;
    private $retorno;

    // private $recnum;
    // private $id_espera;
    // private $qtd_espera;
    // private $id_usuario; 
    // private $situacao;
    // private $codigo_barra;
    // private $id_produto;
    // private $id_palete;
    // private $log;
    // private $log_data;
    // private $log_hora;

	public function __construct(){
        
        parent::__construct();
    }

    public function listar(){
        $this->query = 'select * from cad_imovel ';

        $stmt = $this->pdo->prepare($this->query);
        $stmt->execute(); 
        $this->retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        return $this->retorno;
    }

    public function cadastrarImovel($cod_imo,$desc){

        $this->query = "insert into cad_imovel (cod_imo,descr)  values ({$cod_imo},'{$desc}')";
       
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute(); 
    
        return $this->retorno;
    }

    public function excluir($id_imovel){
        $this->query = "delete from cad_imovel where cod_imo = {$id_imovel}";
        
        $stmt = $this->pdo->prepare($this->query);
        $this->retorno = $stmt->execute(); 

        return $this->retorno;
    }

    // public function editar( $id_espera, $qtd_espera, $situacao, $id_usuario, $codigo_barra, $id_produto, $id_palete, $log, $log_data, $log_hora){
    //     $this->query ="
    //     update
    //         cfma025 set 
    //         qtd_espera = {$qtd_espera},
    //         situacao = '{$situacao}',
    //         id_usuario = {$id_usuario},
    //         codigo_barra = '{$codigo_barra}',
    //         id_produto = {$id_produto},
    //         id_palete = {$id_palete},
    //         log = '{$log}',
    //         log_data = '{$log_data}',
    //         log_hora = {$log_hora}
    //     where
    //         id_espera = {$id_espera}";

    //         // echo "<pre>";
    //         //  print_r($this->query);
    //         //  exit;

    //     $stmt = $this->pdo->prepare($this->query);
    //     $this->retorno = $stmt->execute(); 

    //     return $this->retorno;
    // }
}