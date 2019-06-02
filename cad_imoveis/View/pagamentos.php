<!DOCTYPE html>
<html lang="pt-br">

<body id="pg_body">
    <!-- Navigation -->

    <div id="header"></div>
    <?php
    require_once "navBar.php";
    echo "<script>$('#pagamentos').addClass('active')</script>";
    ?>

    <!-- Page Content -->
    <div>
            <section class="jumbotron pb-1">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="text-muted">Bem vindo (a) ao</h5>
                            <h3 class="jumbotron-heading">Sistema TI - Pagamentos</h3>
                        </div>
                    </div>

                </div>
            </section>
    </div>

     <!-- alertas-->

     <!-- <div class="container">
        <div class="alert alert-success " id="alertaSucessoPg" role="alert">
            <span id="msg-sucessopg">Cadastrado com Sucesso!</span>
        </div>

        <div class="alert alert-danger " id="alertaDangerPg" role="alert">
            <span id="msg-erropg">Erro ao cadastrar!</span>
        </div>

    </div> -->
    <!--fim  alertas-->

    <div class="container">
           <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cod_pagamento">Codigo do Pagamento</label>
                        <input type="text" class="form-control" id="cod_pagamento" >
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputPassword4">Codigo Locação</label>
                        <input type="text" class="form-control" id="cod_locacao" >
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputPassword4">Data Pagamento</label>
                        <input type="text" class="form-control" id="dt_pgto" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="dt_inicio">Per Inicio</label>
                    <input type="text" class="form-control" id="dt_inicio">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="dt_vence">Per Vencimento</label>
                    <input type="text" class="form-control" id="dt_vence">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="recibo">Num Recibo</label>
                    <input type="text" class="form-control" id="recibo">
                    </div>
                </div>
                </form>
        <button type="submit" class="btn btn-outline-dark" onclick="atualizarPgto()">Confirmar</button>
          
    </div>
        <img src="../img/locado.png"  alt=""><img>
     <!-- modal cadastrar imovel -->
     <div class="modal fade" id="modal_resposta_pgto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">MSG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div><div style="text-align:center"><label id="msg-pgto"><label></div>
                         <div style="text-align:center"><label id="msg-pergunta"></label></div>  
                         <div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="atualizaPagina()">Fechar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="">Gerar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fim modal cadastrar imovel -->
</body>

</html>