<!DOCTYPE html>
<?php
require_once '../Controller/PessoaController.php';

$ret = '-100';

if (isset($_POST["btn_salvar"])) {
    $nova_senha = $_POST['nova_senha'];
    $repetir_senha = $_POST['repetir_senha'];
    $cod_usuario = 1;


    $obj = new PessoaController();
    $ret = $obj->AlterarSenha($nova_senha, $repetir_senha, $cod_usuario);
}


$objController = new PessoaController();

$pessoa = $objController->CarregarMinhasInformacoes(1);
?>



<html lang="en">

    <!-- Mirrored from logiciel-tek.com/demo/html/healthline/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2015 21:43:48 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Perfil Sangue Solidario</title>
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/magnific-popup.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.transitions.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/color.css" rel="stylesheet">



        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>                          
        <script src="js/script.js"></script>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- page-wraper -->
        <main class="page-wraper"> 

            <!-- tp-bar -->
            <div class="tp-bar">
                <div class="container">
                    <div class="logo"><a href="index-2.html"><img src="images/logo.png" alt="health line"></a></div>
                </div>
            </div>

            <!-- navbar -->
            <div class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button>
                    </div>

                    <!--nav-collapse -->
                    <nav class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.html" class="on">Meu Perfil</a></li>

                            <li><a href="#doctors" class="on">Buscar Pessoas</a></li>
                            <li><a href="#news" class="on">Sair</a></li>
                        </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>


            <!-- content-section -->
            <form action="alterar_senha.php" method="post">
                </div>
                </article>
                <div class="wrap clearfix">


                    <!--//breadcrumbs-->


                    <!--content-->
                    <section class="content">
                        <br><div class="appointment-box"></br>
                            <!--row-->
                            <div class="row">
                                <!--profile left part-->
                                <div class="tab-content"><div class="row">

                                        <div class="container">

                                            <h2><?php echo $pessoa [0]['nome_pessoa']; ?></h2>
                                        </div>
                                        <div class="my_account one-fourth wow fadeInLeft">
                                            <figure>
                                                <img src="images/avatar4.jpg" alt="" />

                                            </figure>
                                            <div class="container">

                                                <h2>Tipo:<?php echo $pessoa[0] ['nome_tipo'] ?></h2>
                                            </div>
                                        </div>
                                        <!--//profile left part-->

                                        <div class="three-fourth wow fadeInRight">
                                            <nav class="tabs">
                                                <ul>
                                                    <li ><a href="perfil.php" title="About me">Sobre</a></li>

                                                    <li class="active"><a href="alterar_senha.php" title="My posts">Alterar Senha</a></li>
                                                </ul>
                                            </nav>
                                            <?php
                                            if ($ret == -3) {

                                                echo 'Digitar uma senha com no minimo 6 caracteres';
                                            } else if ($ret == -4) {

                                                echo 'O campo senha não confere';
                                            } else if ($ret == -1) {

                                                echo 'Ocorreu um erro tente mais tarde';
                                            } else if ($ret == 1) {

                                                echo 'Senha alterada com sucesso.';
                                            }   else if ($ret == 0) {

                                                echo 'Favor preencher campos obrigatorios.';
                                            } 
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            ?>
                                            <!--about-->
                                            <br><br><br><div class="appointment-box"></br></br></br>
                                                <div class="tab-content" id="about">
                                                    <div class="row">
                                                        <dl class="basic two-third">
                                                            <dt>Digite a nova senha:</dt>
                                                            <input type="password" id="nova_senha" name="nova_senha" placeholder="Nova Senha" value="" class="form-control">
                                                            <dt>Repetir Senha</dt>
                                                            <input type="password" placeholder="Repetir Senha" id="repetir_senha" name="repetir_senha" value="" class="form-control">
                                                            
                                                            <br><br>
                                                            <button type="" class="btn btn-primary" value="Salvar" id="btn_salvar" name="btn_salvar">Salvar </button>
                                                            </br></br>
                                                        </dl>
                                                    </div>
                                                </div>
                                                <!--//about-->

                                                <!--my recipes-->
                                                <div class="tab-content" id="recipes">
                                                    <div class="entries row">
                                                        <!--item--><!--item-->

                                                        <!--item--><!--item-->

                                                        <!--item--><!--item-->
                                                    </div>
                                                </div>
                                                <!--//my recipes-->


                                                <!--my favorites-->
                                                <div class="tab-content" id="favorites">
                                                    <div class="entries row">
                                                        <!--item--><!--item-->

                                                        <!--item--><!--item-->

                                                        <!--item--><!--item-->
                                                    </div>
                                                </div>
                                                <!--//my favorites-->

                                                <!--my posts-->
                                                <div class="tab-content" id="posts">
                                                    <!--entries-->
                                                    <div class="entries row">
                                                        <!--item--><!--item-->

                                                        <!--item--><!--item-->

                                                        <!--item--><!--item-->
                                                    </div>
                                                    <!--//entries-->
                                                </div>
                                                <!--//my posts-->
                                            </div>
                                        </div>
                                        <!--//row-->
                                        </section>
                                        <!--//content-->
                                        </form>
                                    </div>

                                    <!-- footer -->
                                    <br><br> 
                                    <script>

                                        $('#btn_salvar').click(function () {

                                            if ($('#nova_senha').val().trim()==''){
                                                alert('Favor preeencher o campo NOVA SENHA');
                                                return false;
                                            } else if($('#repetir_senha').val().trim()==''){
                                                alert ('Favor preencher o campo REPETIR SENHA');
                                                return false;
                                            } else if ($('#nova_senha').val().trim().length < 6) {
                                                alert ('Digitar uma senha com no minimo 6 caracteres')
                                                return false;
                                            } else if ($('#nova_senha').val().trim() != $('#repetir_senha').val().trim()){
                                                alert ('O campo senha não confere')
                                                return false;   
                                            }

                                        });

                                    </script>	
                                    <footer class="footer">
                                        <div class="container">
                                            <div class="row">


                                                </footer>

                                                <!-- Section Social -->
                                                <div class="section-social">
                                                    <span class="social-opener"></span>
                                                    <div class="container">
                                                        <ul class="social-links">
                                                            <li><a href="#" class="fa fa-facebook"></a></li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Site Bottom -->
                                                <div class="site-btm">
                                                    <div class="container">
                                                        <p class="copyright">© Sangue Solidario 2016</p>
                                                        <ul class="bottom-links">
                                                            <li><a href="#">Inicio</a></li>
                                                            <li><a href="#">Sobre</a></li>
                                                            <li><a href="#">Acessar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                </main>