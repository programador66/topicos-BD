<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de imoveis</title>


    <script type="text/javascript" src="../js/jquery-3.3.1.min.map"></script>
    <script type="text/javascript" src="../js/imovel.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/principal.css">
    <link rel="stylesheet" href="../js/css/bootstrap.min.css">


</head>

<body>

    <div id="header"></div>
    <?php
require_once "navBar.php";
echo "<script>$('#imoveis').addClass('active')</script>";
?>

    <div>
        <section class="jumbotron pb-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="text-muted">Bem vindo (a) ao</h5>
                        <h3 class="jumbotron-heading">Sistema TI</h3>
                    </div>
                    <div class="col-sm-6 text-right position-relative pt-3">
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modal_imoveis"
                            data-whatever="@mdo">Novo cadastro</button>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- alertas-->

    <div class="container">
        <div class="alert alert-success " id="alertaSucesso" role="alert">
            <span id="msg-sucesso">Cadastrado com Sucesso!</span>
        </div>

        <div class="alert alert-danger " id="alertaDanger" role="alert">
            <span id="msg-erro">Erro ao cadastrar!</span>
        </div>

    </div>
    <!--fim  alertas-->

    <!-- tabela -->
    <div class="container">
        <table class="table" id="imoveis">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Imovel Descrição</th>

                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="tb_listar_imoveis">

            </tbody>
        </table>
    </div>

    <!-- fim tabela -->





    <!-- modal cadastrar imovel -->
    <div class="modal fade" id="modal_imoveis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Imóveis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descrição do imóvel:</label>
                            <input type="text" class="form-control input-cadastro" id="imovel_descr">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="cadastrar_imovel();">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fim modal cadastrar imovel -->





    <!-- modal editar imovel -->
    <div class="modal fade" id="modal_imoveis_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atualização de Imóveis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Codigo:</label>
                            <input type="text" class="form-control" id="imovel_id_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descrição do imóvel:</label>
                            <input type="text" class="form-control" id="imovel_descr_editar">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnatualizar"
                        onclick="atualizar_imoveis()">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fim modal editar imovel -->



    <footer class="py-5 bg-dark" style="  position: fixed;  left: 0; bottom: 0; width: 100%;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Caio César 2019</p>
        </div>
        <!-- /.container -->
    </footer>


    <script src="../js/js/bootstrap.min.js"></script>
</body>
</body>

</html>