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
            
        <button type="submit" class="btn btn-outline-dark" onclick="atualizarPgto()">Confirmar</button>
        </form>
    </div>

</body>

</html>