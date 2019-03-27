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
    <div class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-5">Bem vindo !</h1>
            <p class="lead">
                Sistema gerenciador de alugueis de imóveis
            </p>

        </header>

        <!-- Page Features -->
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaj_Jmna8Hm8phonHZfM8iSiPxhgNyF5Iv_nn-8zrOH_Xmlc_0"
                        alt="" />
                    <div class="card-body">
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
                        src="https://www.pagueveloz.com.br/blog/wp-content/uploads/2018/04/pagamentos-e-recebimentos-1200x480.jpg"
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