<?php
require_once "../Model/locacao_model.php";

$funcao = $_REQUEST['funcao'];

if ($funcao == 'listar') {

    $locacao = new locacao_model();

    $listagem = $locacao->listar();

    echo json_encode($listagem);

} else if ($funcao == 'cadastrar') {

//    $cod_loca = $_POST['cod_loca'];
    //    $cod_loca = $_POST['cod_loca'];
    //    $cod_loca = $_POST['cod_loca'];
    //    $cod_loca = $_POST['cod_loca'];
    //    $cod_loca = $_POST['cod_loca'];
    //    $cod_loca = $_POST['cod_loca'];

    $locacao = new locacao_model();
    $cadastro = $locacao->cadastrarImovel($imovel, $cliente, $valor, $valor_ext, $dt_loca, $situacao);

    if ($cadastro) {
        $retorno = array("codigo" => 1, "msg" => "cadastrado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao cadastrar!");
        echo json_encode($retorno);

    }
}
//  else if ($funcao == 'excluir') {

//     $cod_imovel = $_POST['codigo_imovel'];

//     $imovel = new cad_imovel_model();
//     $cadastro = $imovel->excluir($cod_imovel);

//     if ($cadastro) {
//         $retorno = array("codigo" => 1, "msg" => "Excluido com sucesso!");
//         echo json_encode($retorno);

//     } else {

//         $retorno = array("codigo" => 0, "msg" => "erro ao Excluir!");
//         echo json_encode($retorno);

//     }
// } else if ($funcao == 'editar') {

//     $cod_imovel = $_POST['codigo_imovel'];
//     $descr_imovel = $_POST['descricao'];

//     $imovel = new cad_imovel_model();
//     $atualizar = $imovel->editar($cod_imovel, $descr_imovel);

//     if ($atualizar) {
//         $retorno = array("codigo" => 1, "msg" => "Atualizado com sucesso!");
//         echo json_encode($retorno);

//     } else {

//         $retorno = array("codigo" => 0, "msg" => "erro ao Atualizar os dados!");
//         echo json_encode($retorno);

//     }

// } else {
//     $retorno = array("codigo" => 0, "msg" => "Erro contato o ADM!");
//     echo json_encode($retorno);
// }