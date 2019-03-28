/*
 * @author: Caio Cesar Lacerda
 * data: 16/03/2019
 */

var url =
  "http://localhost:8080/topicos-BD/cad_imoveis/Controller/locacao_controller.php?";

var urlCombox = "http://localhost:8080/topicos-BD/cad_imoveis/Controller/";

$(document).ready(function() {
  $(".alert ").hide();
  listar_alugueis();
  listarComboImovel();
  listarComboLocador();
  $("#valor").mask("000.000.000,00", { reverse: true });
  $("#valor_ext").mask("000.000.000,00", { reverse: true });
});

function limparModal() {
  $(".input-cadastro").each(function(index) {
    $(this).val("");
  });
}

function listarComboImovel() {
  $.getJSON(
    urlCombox + "cad_imovel_controller.php?funcao=listarImoveisAlugueis",
    function(data) {
      $.each(data, function(i) {
        $("#imovel").append(
          "<option value=" +
            data[i]["cod_imo"] +
            ">" +
            data[i]["descr"] +
            "</option>"
        );
      });
    }
  );
}

function listarComboLocador() {
  $.getJSON(
    urlCombox + "cad_locador_controller.php?funcao=listarLocadorAlugueis",
    function(data) {
      console.log(data);

      $.each(data, function(i) {
        $("#cliente").append(
          "<option value=" +
            data[i]["codloc"] +
            ">" +
            data[i]["nome"] +
            "</option>"
        );
      });
    }
  );
}

function listar_alugueis() {
  limparModal();
  $("#tb_listar_alugueis").html(" ");
  $.getJSON(url + "funcao=listar", function(data) {
    console.log(data);

    $.each(data, function(i) {
      $("#tb_listar_alugueis").append(
        `<tr>
            <td>` +
          data[i]["cod_loca"] +
          ` </td>
            <td> ` +
          data[i]["descr"] +
          ` </td>
          <td> ` +
          data[i]["nome"] +
          ` </td>
          <td> ` +
          data[i]["valor"] +
          ` </td>
          <td> ` +
          data[i]["valor_ext"] +
          ` </td>
          <td> ` +
          data[i]["dt_loca"] +
          ` </td>
          <td> ` +
          data[i]["situacao"] +
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

// function teste() {
//   window.location.href = "http://pt.stackoverflow.com";
// }

function cadastrar_locacao() {
  var dados = $("#form_locacao").serialize();

  $.post(url + "funcao=cadastrar", dados, function(data) {
    data = JSON.parse(data);
    console.log(data);

    if (data.codigo == 1) {
      console.log("sucesso");

      listar_alugueis();

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

// function deletar_imovel(codigo_imovel) {
//   // var cod_imovel = ();

//   var dados = {
//     codigo_imovel: codigo_imovel
//   };
//   $.post(url + "funcao=excluir", dados, function(data) {
//     data = JSON.parse(data);
//     console.log(data);

//     if (data.codigo == 1) {
//       console.log("sucesso");
//       listar_imoveis();
//       $("#msg-sucesso").text(data.msg);
//       $("#alertaSucesso ")
//         .show()
//         .delay(2000)
//         .fadeOut();
//     } else {
//       console.log("erro");
//       listar_imoveis();
//       $("#msg-erro").text(data.msg);
//       $("#alertaDanger ")
//         .show()
//         .delay(2000)
//         .fadeOut();
//     }
//   });
// }

// function addFormAtualizar(descr, cod_imo) {
//   console.log(descr, cod_imo);
//   $("#imovel_id_editar").val(cod_imo);
//   $("#imovel_id_editar").prop("disabled", true);
//   $("#imovel_descr_editar").val(descr);
// }

// function atualizar_imoveis() {
//   var codigo_imovel = $("#imovel_id_editar").val();
//   var descricao = $("#imovel_descr_editar").val();

//   dados = {
//     descricao: descricao,
//     codigo_imovel: codigo_imovel
//   };

//   $.post(url + "funcao=editar", dados, function(data) {
//     data = JSON.parse(data);
//     console.log(data);

//     if (data.codigo == 1) {
//       console.log("sucesso");
//       listar_imoveis();
//       $("#msg-sucesso").text(data.msg);
//       $("#alertaSucesso ")
//         .show()
//         .delay(2000)
//         .fadeOut();
//     } else {
//       console.log("erro");
//       listar_imoveis();
//       $("#msg-erro").text(data.msg);
//       $("#alertaDanger ")
//         .show()
//         .delay(2000)
//         .fadeOut();
//     }
//   });
// }
