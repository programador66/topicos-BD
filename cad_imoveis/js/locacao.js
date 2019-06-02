/*
 * @author: Caio Cesar Lacerda
 * data: 16/03/2019
 */

var url ="http://localhost:8080/topicos-BD/cad_imoveis/Controller/locacao_controller.php?";
var url_pgto = "http://localhost:8080/topicos-BD/cad_imoveis/Controller/pagamentos_controller.php?";
var urlCombox = "http://localhost:8080/topicos-BD/cad_imoveis/Controller/";
var dadosAlugueis = {};

$(document).ready(function() {
  $(".alert ").hide();

  listar_alugueis();
  listarComboImovel();
  listarComboLocador();
  $("#valor").mask("000.000.000,00", { reverse: true });
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

function atualizaPagina(){
        window.location.href = "http://localhost:8080/topicos-BD/cad_imoveis/View/index.php";
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
    dadosAlugueis = data;

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
          <td><p id="dt_inicio`+[i]+`"> ` +
          data[i]["dt_loca"] +
          ` </p></td>
          <td> `+((data[i]["situacao"]==="locado")?`
          <img src="http://localhost:8080/topicos-BD/cad_imoveis/js/img/locado.png"  WIDTH="25" HEIGHT="25"  alt="LOCADO"></img>
          `:`<img src="http://localhost:8080/topicos-BD/cad_imoveis/js/img/encerrado.png"  WIDTH="25" HEIGHT="25"  alt="LOCADO"></img>`)  +` </td>
            <td class="buttons-actions" style="text-align:center"><button class="btn btn-dark" id="btpg`+[i]+`" onclick="pagamentos(`+[i]+`) ">Confirmar Pgt </button></td></tr>`
      );
      
      if (data[i]['situacao']=="locado"){
        $("#btpg"+[i]).attr("disabled",'true');
      }
      
    });



  });
}

function getRandom() {
  return Math.floor(Math.random() * 9999998 + 1)
}
function pagamentos(cod_loca) {
 console.log(cod_loca);
 $("#btn-confirmar").show();
  let dt_string = dadosAlugueis[cod_loca]['dt_loca'];
  let dt_separada = dt_string.split("-");
  let ano =  parseInt(dt_separada[0],10);
  let mes = parseInt(dt_separada[1],10)+1;
  let dia =  parseInt(dt_separada[2],10);
  
    let cad_pgto = {
                      'cod_loca':dadosAlugueis[cod_loca]['cod_loca'],
                      'numRecibo':getRandom(),
                      'dt_loca':dadosAlugueis[cod_loca]['dt_loca'],// ultilizando variavel globar para resgatar dados
                      'dt_inicio': dadosAlugueis[cod_loca]['dt_loca'],
                      'dia':dia,
                      'mes':mes,
                      'ano':ano  
                    };
              
  $.post(url_pgto + "funcao=inserir",cad_pgto,function(data){
      data = JSON.parse(data);
      if (data.codigo==1){
        console.log('cadastrado');
     
        $("#locacao_body").load("http://localhost:8080/topicos-BD/cad_imoveis/View/pagamentos");
          confirmaPagamento(cod_loca);
        
      }else{
        console.log('erro ao cadastrar');
      }
  });
  
}

function confirmaPagamento(cod_loca){
  var cod_loc = dadosAlugueis[cod_loca]['cod_loca']
  $.getJSON(url_pgto + "funcao=listarPagamentoPorId&cod_loca="+cod_loc, function(data){
      
      console.log(dadosAlugueis);
      console.log(data);
      $("#cod_pagamento").val(data[0]['codpg']);
      $("#cod_locacao").val(data[0]['codloca']);
      $("#dt_pgto").val(data[0]['data_pg']);
      $("#dt_inicio").val(data[0]['dt_inicio']);
      $("#dt_vence").val(data[0]['dt_vence']);
      $("#recibo").val(data[0]['num_rec']);
      $("#nome").val(dadosAlugueis[cod_loca]['nome']);
  });
}

 function atualizarPgto(){
 
  var pagamento = {
                'cod_loca':$("#cod_locacao").val(),
                'numRecibo':$("#recibo").val(),
                'dt_loca': $("#dt_pgto").val(),
                'dt_inicio':$("#dt_inicio").val(),
                'dt_vence':$("#dt_vence").val(),
                'nome': $("#nome").val()
                  }

  $.post(url_pgto + "funcao=atualizar",pagamento,function(data){
    data = JSON.parse(data);
      if (data.codigo==1){
        funcaoAtualizarSituacao(); 
      }else{
        $("#modal_resposta_pgto").modal('show');
        $("#msg-pgto").text(data.msg);
        $("#msg-pergunta").text("Tente novamente! ");
        
      }
  }); 

}

function geraPdf(){


  var codpg = $("#cod_pagamento").val();
  
    window.open(url_pgto + "funcao=geraPdfPagto&codpg="+codpg);
    $("#cod_pagamento").val("");
    $("#cod_locacao").val("");
    $("#dt_pgto").val("");
    $("#dt_inicio").val("");
    $("#dt_vence").val("");
    $("#recibo").val("");
    $("#nome").val("");
    $("#btn-confirmar").hide();
}

function funcaoAtualizarSituacao(){
  
  var codpg = $("#cod_locacao").val();
  var situacao = {
                  'codpg':codpg,
                  'situacao':'locado'
                  };

  $.post(url + "funcao=atualizarSituacao",situacao,function(data){
    data = JSON.parse(data);
        if (data.codigo==1){
           
          $("#modal_resposta_pgto").modal('show');
          $("#msg-pgto").text(data.msg);
          $("#msg-pergunta").text("Deseja gerar o recibo? "); 
        }else{
          disparaPagamento(codpg);
          $("#modal_resposta_pgto").modal('show');
          $("#msg-pgto").text(data.msg);
          $("#msg-pergunta").text("Tente novamente! ");
         
        }

  });
}

function disparaPagamento(codpg){

  var situacao = {
    'codpg':codpg,
    'situacao':'encerrado'
    };

  $.post(url + "funcao=atualizarSituacao",situacao,function(data){
    data = JSON.parse(data);
        if (data.codigo==1){  
          $("#modal_resposta_pgto").modal('show');
          $("#msg-pgto").text(data.msg);
          $("#msg-pergunta").text("Deseja gerar o recibo? "); 
        }else{
          $("#modal_resposta_pgto").modal('show');
          $("#msg-pgto").text(data.msg);
          $("#msg-pergunta").text("Tente novamente! ");
        }

  });
}

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

function deletar_locacao(codigo_locacao) {
  console.log(codigo_locacao);

  var dados = {
    codigo_locacao: codigo_locacao
  };
  $.post(url + "funcao=excluir", dados, function(data) {
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
      listar_alugueis();
      $("#msg-erro").text(data.msg);
      $("#alertaDanger ")
        .show()
        .delay(2000)
        .fadeOut();
    }
  });
}

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
