<?php
require_once "../Model/Pagamentos_model.php";
require_once "../pdf/fpdf.php";
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
} elseif ($funcao == "geraPdfPagto"){

    $codpg = $_REQUEST['codpg'];
    $pgto = new Pagamentos_model();
    $response = $pgto->geraPdfPgto($codpg);

    // print_r($response);
    $pdf= new FPDF("P","pt","A4");
     
    $pdf->AddPage();
    $pdf->SetFont('arial','B',18);
    $pdf->Cell(0,14,"Recibo De Aluguel                                       Recibo: ".$response[0]['num_rec'],"B",0,'L');

    $pdf->Ln(30);

    $pdf->SetFont('times','',12);
    $pdf->Cell(0,16,"Aluguel: ".$response[0]['valor']."                        Liquido: ".$response[0]['valor'],"B",1,'C');
    $pdf->Ln(15);


    $pdf->SetFont('times','',12);
    $pdf->Cell(0,16,"Recebi(emos) de :  ".$response[0]['nome'],0,1,'L');
    $pdf->Ln(0);

    $pdf->Cell(0,16,"A quantia de: $ ".$response[0]['valor'],0,1,'L');
    $pdf->Ln(0);

    $pdf->Cell(0,16,"Proveniente do Aluguel de um(a): ".$response[0]['descr'],0,1,'L');
    $pdf->Ln(0);    

    $pdf->Cell(0,16,"Sito a: Rua Beco Carangola; n. 137. Conj.: Vila Amazonas. Bairro: Nsa das Gracas ",0,1,'L');
    $pdf->Ln(0);
    
    $pdf->Cell(0,16,"Correspondente ao Periodo de: ".$response[0]['dt_inicio']."              Vencido em: ".$response[0]['data_pg'],0,1,'L');
   
    $pdf->Ln(0);

    $pdf->Cell(0,16,"Nome: Manoel Henrique Reis Nascimento ",0,1,'B');
    $pdf->Ln(0);

    $pdf->Cell(0,16,"RG: 1090030-6                      CPF: ",0,1,'L');
    $pdf->Ln(10);

    $pdf->Cell(0,14,"Data:                                   Assinatura :  ","B",1,'L');
    $pdf->Ln(30);



    $pdf->SetFont('arial','B',18);
    $pdf->Cell(0,14,"Recibo De Aluguel                                       Recibo: ".$response[0]['num_rec'],"B",0,'L');

    $pdf->Ln(30);

    $pdf->SetFont('times','',12);
    $pdf->Cell(0,16,"Aluguel: ".$response[0]['valor']."                        Liquido: ".$response[0]['valor'],"B",1,'C');
    $pdf->Ln(15);


    $pdf->SetFont('times','',12);
    $pdf->Cell(0,16,"Recebi(emos) de :  ".$response[0]['nome'],0,1,'L');
    $pdf->Ln(0);

    $pdf->Cell(0,16,"A quantia de: $ ".$response[0]['valor'],0,1,'L');
    $pdf->Ln(0);

    $pdf->Cell(0,16,"Proveniente do Aluguel de um(a): ".$response[0]['descr'],0,1,'L');
    $pdf->Ln(0);    

    $pdf->Cell(0,16,"Sito a: Rua Beco Carangola; n. 137. Conj.: Vila Amazonas. Bairro: Nsa das Gracas ",0,1,'L');
    $pdf->Ln(0);
    
    $pdf->Cell(0,16,"Correspondente ao Periodo de: ".$response[0]['dt_inicio']."              Vencido em: ".$response[0]['data_pg'],0,1,'L');
   
    $pdf->Ln(0);

    $pdf->Cell(0,16,"Nome: Manoel Henrique Reis Nascimento ",0,1,'B');
    $pdf->Ln(0);

    $pdf->Cell(0,16,"RG: 1090030-6                      CPF: ",0,1,'L');
    $pdf->Ln(10);

    $pdf->Cell(0,14,"Data:                                   Assinatura :  ","B",1,'L');
    $pdf->Ln(10);

    $pdf->Output();

}
