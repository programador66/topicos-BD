<?php
require_once "../Model/locacao_model.php";

function data($data)
{
    return date("Y/m/d", strtotime($data));
}

$funcao = $_REQUEST['funcao'];

if ($funcao == 'listar') {

    $locacao = new locacao_model();

    $listagem = $locacao->listar();

    echo json_encode($listagem);

} else if ($funcao == 'cadastrar') {
    // print_r($_REQUEST);exit();
    $imovel = $_POST['imovel'];
    $cliente = $_POST['cliente'];
    $valor = str_replace(',', '.', str_replace('.', '', $_POST['valor']));
    $valor_ext = $_POST['valor_ext'];
    $dt_loca = $_POST['dt_loca'];
    $situacao = "encerrado";

    $locacao = new locacao_model();
    $cadastro = $locacao->cadastrarLocacao($imovel, $cliente, $valor, $valor_ext, $dt_loca, $situacao);

    if ($cadastro) {
        $retorno = array("codigo" => 1, "msg" => "cadastrado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao cadastrar!");
        echo json_encode($retorno);

    }
} else if ($funcao == 'excluir') {
    // print_r($_REQUEST);exit();
    $cod_locacao = $_POST['codigo_locacao'];

    $locacao = new locacao_model();
    $exclusao = $locacao->excluir($cod_locacao);

    if ($exclusao) {
        $retorno = array("codigo" => 1, "msg" => "Excluido com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao Excluir!");
        echo json_encode($retorno);

    }
}
else if ($funcao == 'atualizarSituacao') {

    $cod_loca = $_POST['codpg'];
    $situacao = $_POST['situacao'];  

    $locacaoSituacao = new Locacao_model();
    $response = $locacaoSituacao->atualizarSituacao($cod_loca, $situacao);

    if ($response) {
        $retorno = array("codigo" => 1, "msg" => "Atualizado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao Atualizar os dados!");
        echo json_encode($retorno);

    }

}
// else {
//     $retorno = array("codigo" => 0, "msg" => "Erro contato o ADM!");
//     echo json_encode($retorno);
// }