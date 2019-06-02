<?php
require_once "../Model/Pagamentos_model.php";

$funcao = $_REQUEST['funcao'];

if ($funcao == "inserir"){

    $codloca_pg = $_REQUEST['cod_loca'];
    $num_rec = $_REQUEST['numRecibo'];
    $data_pg = $_REQUEST['dt_loca'];
    $dt_inicio = $_REQUEST['dt_inicio'];
    $dia = $_REQUEST['dia'];
    $mes = $_REQUEST['mes'];
    $ano = $_REQUEST['ano'];
    $dt_venc = $ano.'-0'.$mes.'-0'.$dia;
    
    $pagt = new Pagamentos_model();
    $response = $pagt->cadastrarPagamentos($codloca_pg,$data_pg,$num_rec,$dt_inicio,$dt_venc);

    if ($response) {
        $retorno = array("codigo" => 1, "msg" => "cadastrado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao cadastrar!");
        echo json_encode($retorno);

    }
} elseif ($funcao == "listarPagamentoPorId"){

    $codloca_pg = $_REQUEST['cod_loca'];
    $listar = new Pagamentos_model();

    $response = $listar->listarPagamentosPorId($codloca_pg);
    
    echo json_encode($response);

} elseif ($funcao == "atualizar"){

    $codloca_pg = $_REQUEST['cod_loca'];
    $num_rec = $_REQUEST['numRecibo'];
    $data_pg = $_REQUEST['dt_loca'];
    $dt_inicio = $_REQUEST['dt_inicio'];
    $dt_venc = $_REQUEST['dt_vence'];

    $pagt = new Pagamentos_model();
    $response = $pagt->atualizarPagamento($codloca_pg,$data_pg,$num_rec,$dt_inicio,$dt_venc);

    if ($response) {
        $retorno = array("codigo" => 1, "msg" => "Atualizado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "Erro ao atualizar!");
        echo json_encode($retorno);

    }
}
