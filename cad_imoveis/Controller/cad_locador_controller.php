<?php
require_once "../Model/cad_locador_model.php";

$funcao = $_REQUEST['funcao'];

if ($funcao == 'listar') {

    $conexao = new cad_locador_model();

    $listagem = $conexao->listar();

    echo json_encode($listagem);

} else if ($funcao == 'cadastrar') {

    $nome = $_POST['nome'];
    $preferencia = $_POST['preferencia'];
    $fone = $_POST['fone'];
    $celular = $_POST['celular'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data = $_POST['data'];

    $locador = new cad_locador_model();
    $cadastro = $locador->cadastrarLocador($nome, $preferencia, $fone, $celular, $rg, $cpf, $data);

    if ($cadastro) {
        $retorno = array("codigo" => 1, "msg" => "cadastrado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao cadastrar!");
        echo json_encode($retorno);

    }
} else if ($funcao == 'excluir') {

    $cod_locador = $_POST['codigo_locador'];

    $locador = new cad_locador_model();
    $excluir = $locador->excluir($cod_locador);

    if ($excluir) {
        $retorno = array("codigo" => 1, "msg" => "Excluido com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao Excluir!");
        echo json_encode($retorno);

    }
} else if ($funcao == 'atualizar') {

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $preferencia = $_POST['preferencia'];
    $fone = $_POST['fone'];
    $celular = $_POST['celular'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data = $_POST['data'];

    $locador = new cad_locador_model();
    $atualizar = $locador->editar($codigo, $nome, $preferencia, $fone, $celular, $rg, $cpf, $data);

    if ($atualizar) {
        $retorno = array("codigo" => 1, "msg" => "Atualizado com sucesso!");
        echo json_encode($retorno);

    } else {

        $retorno = array("codigo" => 0, "msg" => "erro ao Atualizar os dados!");
        echo json_encode($retorno);

    }

} else if ($funcao == 'listarLocadorAlugueis') {

    $conexao = new cad_locador_model();

    $listagem = $conexao->listarLocadorAlugueis();

    echo json_encode($listagem);

} else {
    $retorno = array("codigo" => 0, "msg" => "Erro contato o ADM!");
    echo json_encode($retorno);
}