<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de imoveis</title>


    <script type="text/javascript" src="../js/jquery-3.3.1.min.map"></script>
    <script type="text/javascript" src="../js/locador.js"></script>
    <script type="text/javascript" src="../js/jqmask/src/jquery.mask.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/principal.css">
    <link rel="stylesheet" href="../js/css/bootstrap.min.css">


</head>

<body>
    <div id="header"></div>
    <?php
require_once "navBar.php";
echo "<script>$('#locador').addClass('active')</script>";
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
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modal_locador"
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
        <table class="table" id="">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prefêrencia</th>
                    <th scope="col">Fone</th>
                    <th scope="col">Cel</th>
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data Contrato</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="tab_locador">

            </tbody>
        </table>
    </div>

    <!-- fim tabela -->





    <!-- modal cadastrar locador -->
    <div class="modal fade" id="modal_locador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Locador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control input-cadastro" id="nome">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Preferência:</label>
                            <input type="text" class="form-control input-cadastro" id="preferencia">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Telefone - Residencial:</label>
                            <input type="text" class="form-control input-cadastro" id="fone">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Celular:</label>
                            <input type="text" class="form-control input-cadastro" id="celular">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RG:</label>
                            <input type="text" class="form-control input-cadastro" id="rg">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">CPF:</label>
                            <input type="text" class="form-control input-cadastro" id="cpf">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Data do Contrato:</label>
                            <input type="date" class="form-control input-cadastro" id="data_contrato">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="cadastrar_locador()">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fim modal cadastrar imovel -->






    <!-- modal editar locador -->
    <div class="modal fade" id="modal_locador_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atualizar de Locador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Codigo:</label>
                            <input type="text" class="form-control input-cadastro" id="codloc_editar" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control input-cadastro" id="nome_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Preferência:</label>
                            <input type="text" class="form-control input-cadastro" id="preferencia_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Telefone - Residencial:</label>
                            <input type="text" class="form-control input-cadastro" id="fone_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Celular:</label>
                            <input type="text" class="form-control input-cadastro" id="celular_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RG:</label>
                            <input type="text" class="form-control input-cadastro" id="rg_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">CPF:</label>
                            <input type="text" class="form-control input-cadastro" id="cpf_editar">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Data do Contrato:</label>
                            <input type="date" class="form-control input-cadastro" id="data_contrato_editar">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="atualizar_locador()">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fim modal editar locador -->



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