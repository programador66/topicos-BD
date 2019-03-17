/*
* @author: Caio Cesar Lacerda
* data: 16/03/2019
*/
var codigo_imovel=0;
var url = 'http://localhost/cad_imoveis/Controller/cad_imovel_controller.php?';

$( document ).ready(function() {
    $('.alert ').hide();
    listar_imoveis();
});

function listar_imoveis(){
    $.getJSON(url+'funcao=listar',function(data){
        console.log(data);
        
        $.each(data,function(i){
            codigo_imovel = parseInt(data[i]['cod_imo'])+1;
            

            $('#tb_listar_imoveis').append(`<tr>
            <td>`+data[i]['cod_imo']+` </td>
            <td> `+data[i]['descr']+` </td>
            <td class="buttons-actions">
            <button class="btn btn-outline-dark" (click)="edit(client)">
                Editar
            </button>
            <button class="btn btn-outline-dark" (click)="remove(client)">
                Excluir
            </button>
            </td></tr>`);
        });
        
    });
}




function cadastrar_imovel(){
  var descricao =   $('#imovel_descr').val();

    console.log(descricao+" e "+codigo_imovel);
    dados = {
        'descricao':descricao,
        'codigo_imovel':codigo_imovel
    };
    $.post( url+'funcao=cadastrar',dados, function( data ) {
         data = JSON.parse(data);   
        console.log(data);

        if(data.codigo == 1){
            console.log("sucesso");
            $('#alertaSucesso ').show().delay(2000).fadeOut();

        }else{
            console.log("erro");
            $('#alertaDanger ').show().delay(2000).fadeOut();
        }

      });
}



function toggleAlert(){
    $(".alert-success").toggleClass('in out'); 
    return false; // Keep close.bs.alert event from removing from DOM
}