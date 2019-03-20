/*
 * @author: Caio Cesar Lacerda
 * data: 16/03/2019
 */
var codigo_imovel = 0;
var url =
  "http://localhost:8080/topicos-BD/cad_imoveis/Controller/cad_imovel_controller.php?";

$(document).ready(function() {
  $(".alert ").hide();
  listar_imoveis();
});

function listar_imoveis() {
  $.getJSON(url + "funcao=listar", function(data) {
    console.log(data);

    $.each(data, function(i) {
      codigo_imovel = parseInt(data[i]["cod_imo"]) + 1;

      $("#tb_listar_imoveis").append(
        `<tr>
            <td>` +
          data[i]["cod_imo"] +
          ` </td>
            <td> ` +
          data[i]["descr"] +
          ` </td>
            <td class="buttons-actions">
            <button class="btn btn-outline-dark"  data-toggle="modal" data-target="#modal_imoveis_editar" data-whatever="@mdo" onclick="
          addFormAtualizar('` +
          data[i]["descr"] +
          `',` +
          data[i]["cod_imo"] +
          `)" 
          >
                Editar
            </button>
            <button class="btn btn-outline-dark"    onclick=deletar_imovel(` +
          data[i]["cod_imo"] +
          `)>
                Excluir
            </button>
            </td></tr>`
      );
    });
  });
}

function teste() {
  window.location.href = "http://pt.stackoverflow.com";
}

function cadastrar_imovel() {
  var descricao = $("#imovel_descr").val();

  console.log(descricao + " e " + codigo_imovel);
  dados = {
    descricao: descricao,
    codigo_imovel: codigo_imovel
  };
  $.post(url + "funcao=cadastrar", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");
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

  setTimeout(function() {
    $("#tb_listar_imoveis").load("#tb_listar_imoveis"); //parte da mesma página
    location.reload(1000);
  }, 2500);
}

function deletar_imovel(codigo_imovel) {
  // var cod_imovel = ();

  var dados = {
    codigo_imovel: codigo_imovel
  };
  $.post(url + "funcao=excluir", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");
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

  setTimeout(function() {
    $("#tb_listar_imoveis").load(" #tb_listar_imoveis"); //parte da mesma página
    location.reload(1000);
  }, 2500);
}

function addFormAtualizar(descr, cod_imo) {
  console.log(descr, cod_imo);
  $("#imovel_id_editar").val(cod_imo);
  $("#imovel_id_editar").prop("disabled", true);
  $("#imovel_descr_editar").val(descr);
}

function atualizar_imoveis() {
  var codigo_imovel = $("#imovel_id_editar").val();
  var descricao = $("#imovel_descr_editar").val();

  dados = {
    descricao: descricao,
    codigo_imovel: codigo_imovel
  };

  $.post(url + "funcao=editar", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");
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

  setTimeout(function() {
    $("#tb_listar_imoveis").load(" #tb_listar_imoveis"); //parte da mesma página
    location.reload(1000);
  }, 2500);
}
