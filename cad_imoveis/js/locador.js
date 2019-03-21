/*
 * @author: Caio Cesar Lacerda
 * data: 16/03/2019
 */

var url =
  "http://localhost:8080/topicos-BD/cad_imoveis/Controller/cad_locador_controller.php?";

$(document).ready(function() {
  $(".alert ").hide();
  listar_locador();
  $("#cpf").mask("000.000.000-00");
  $("#celular").mask("(00) 0000-0000");
  $("#fone").mask("(00) 0000-0000");
  $("#rg").mask("0000000-0");
  $("#cpf_editar").mask("000.000.000-00");
  $("#celular_editar").mask("(00) 0000-0000");
  $("#fone_editar").mask("(00) 0000-0000");
  $("#rg_editar").mask("0000000-0");
});

function limparModal() {
  $(".input-cadastro").each(function(index) {
    $(this).val("");
  });
}

function listar_locador() {
  limparModal();
  $("#tab_locador").html("");
  $.getJSON(url + "funcao=listar", function(data) {
    console.log(data);

    $.each(data, function(i) {
      $("#tab_locador").append(
        `<tr>
            <td>` +
          data[i]["codloc"] +
          ` </td>
            <td> ` +
          data[i]["nome"] +
          ` </td>
          <td> ` +
          data[i]["preferencia"] +
          ` </td>
          <td> ` +
          data[i]["fone"] +
          ` </td>
          <td> ` +
          data[i]["cel"] +
          ` </td>
          <td> ` +
          data[i]["rg"] +
          ` </td>
          <td> ` +
          data[i]["cpf"] +
          ` </td>
          <td> ` +
          data[i]["data_cont"] +
          ` </td>
          
            <td class="buttons-actions">
            <button class="btn btn-outline-dark"  data-toggle="modal" data-target="#modal_locador_editar" data-whatever="@mdo" onclick="
          addFormAtualizar('` +
          data[i]["nome"] +
          `',` +
          data[i]["codloc"] +
          `,'` +
          data[i]["preferencia"] +
          `','` +
          data[i]["fone"] +
          `','` +
          data[i]["cel"] +
          `'
          ,'` +
          data[i]["rg"] +
          `','` +
          data[i]["cpf"] +
          `','` +
          data[i]["data_cont"] +
          `'
          )" 
          >
                Editar
            </button>
            <button class="btn btn-outline-dark"    onclick=deletar_locador(` +
          data[i]["codloc"] +
          `)>
                Excluir
            </button>
            </td></tr>`
      );
    });
  });
}

// function teste() {
//   window.location.href = "http://pt.stackoverflow.com";
// }

function cadastrar_locador() {
  var nome = $("#nome").val();
  var preferencia = $("#preferencia").val();
  var fone = $("#fone").val();
  var celular = $("#celular").val();
  var rg = $("#rg").val();
  var cpf = $("#cpf").val();
  var data = $("#data_contrato").val();

  dados = {
    nome: nome,
    preferencia: preferencia,
    fone: fone,
    celular: celular,
    rg: rg,
    cpf: cpf,
    data: data
  };
  $.post(url + "funcao=cadastrar", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");
      listar_locador();
      $("#msg-sucesso").text(data.msg);
      $("#alertaSucesso ")
        .show()
        .delay(2000)
        .fadeOut();
    } else {
      console.log("erro");
      $("#msg-erro").text(data.msg);
      $("#alertaDanger ")
        .show()
        .delay(2000)
        .fadeOut();
    }
  });
}

function deletar_locador(codigo_locador) {
  // var cod_imovel = ();

  var dados = {
    codigo_locador: codigo_locador
  };
  $.post(url + "funcao=excluir", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");
      listar_locador();
      $("#msg-sucesso").text(data.msg);
      $("#alertaSucesso ")
        .show()
        .delay(2000)
        .fadeOut();
    } else {
      console.log("erro");
      $("#msg-erro").text(data.msg);
      $("#alertaDanger ")
        .show()
        .delay(2000)
        .fadeOut();
    }
  });
}

function addFormAtualizar(
  nome,
  codloc,
  preferencia,
  fone,
  celular,
  rg,
  cpf,
  data
) {
  console.log(codloc, nome);
  $("#codloc_editar").val(codloc);
  $("#nome_editar").val(nome);
  $("#preferencia_editar").val(preferencia);
  $("#fone_editar").val(fone);
  $("#celular_editar").val(celular);
  $("#rg_editar").val(rg);
  $("#cpf_editar").val(cpf);
  $("#data_contrato_editar").val(data);
}

function atualizar_locador() {
  dados = {
    codigo: $("#codloc_editar").val(),
    nome: $("#nome_editar").val(),
    preferencia: $("#preferencia_editar").val(),
    fone: $("#fone_editar").val(),
    celular: $("#celular_editar").val(),
    rg: $("#rg_editar").val(),
    cpf: $("#cpf_editar").val(),
    data: $("#data_contrato_editar").val()
  };

  $.post(url + "funcao=atualizar", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");
      listar_locador();
      $("#msg-sucesso").text(data.msg);
      $("#alertaSucesso ")
        .show()
        .delay(2000)
        .fadeOut();
    } else {
      console.log("erro");
      $("#msg-erro").text(data.msg);
      $("#alertaDanger ")
        .show()
        .delay(2000)
        .fadeOut();
    }
  });
}
