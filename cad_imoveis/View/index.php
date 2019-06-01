<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIS CAD ALUGUEIS</title>


    <script type="text/javascript" src="../js/jquery-3.3.1.min.map"></script>
    <script type="text/javascript" src="../js/imovel.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/principal.css">
    <link rel="stylesheet" href="../js/css/bootstrap.min.css">

</head>

<body>
    <!-- Navigation -->

    <div id="header"></div>
    <?php
    require_once "navBar.php";
    echo "<script>$('#inicio').addClass('active')</script>";
    ?>

    <!-- Page Content -->
    <div>
            <section class="jumbotron pb-1">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="text-muted">Bem vindo (a) ao</h5>
                            <h3 class="jumbotron-heading">Sistema TI</h3>
                        </div>
                    </div>

                </div>
            </section>
         </div>

    <div class="container" >
        <!-- Jumbotron Header -->
       

        <!-- Page Features -->
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaj_Jmna8Hm8phonHZfM8iSiPxhgNyF5Iv_nn-8zrOH_Xmlc_0"
                        alt="" />
                    <div class="card-body" >
                        <h4 class="card-title">Imóveis</h4>
                        <p class="card-text">
                            Imóveis disponiveis :
                            <h1>34</h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="http://localhost:8080/topicos-BD/cad_imoveis/View/imoveis.php"
                            class="btn btn-outline-dark">Cadastrar</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6w4gS7JTjqz4xxp3iDIFT3deuHpoUlELTMds1-Ie6uJPvfYAL"
                        alt="" height="200px" width="500px" />
                    <div class="card-body">
                        <h4 class="card-title">Clientes</h4>
                        <p class="card-text">
                            Clientes:
                            <h1>13</h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="http://localhost:8080/topicos-BD/cad_imoveis/View/locador.php"
                            class="btn btn-outline-dark">Cadastrar</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="data:image/jpeg;base64,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"
                        alt="" height="200px" width="500px" />
                    <div class="card-body">
                        <h4 class="card-title">Pagamentos</h4>
                        <p class="card-text">
                            Concluidos:
                            <h1>13</h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="http://localhost:8080/topicos-BD/cad_imoveis/View/pagamentos.php"
                            class="btn btn-outline-dark"><Var>Visualizar</Var></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="https://www.jcorreiodopovo.com.br/fl/normal/economia_mercado_de_alugueis_oferece_boas_opcoes_com_precos_acessiveis_1516451462.jpeg"
                        alt="" height="200px" width="500px" />
                    <div class="card-body">
                        <h4 class="card-title">Alugueis</h4>
                        <p class="card-text">
                            Imoveis alugados:
                            <h1>15</h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="http://localhost:8080/topicos-BD/cad_imoveis/View/locacao.php"
                            class="btn btn-outline-dark">Alugar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="  position: fixed;  left: 0; bottom: 0; width: 100%;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Caio César 2019</p>
        </div>
        <!-- /.container -->
    </footer>


    <!-- Bootstrap core JavaScript -->


    <script src="../js/js/bootstrap.min.js"></script>
</body>

</html>