<!DOCTYPE html>

<?php
require_once '../Controller/PessoaController.php';
//phpinfo();

$ret = '-100';

if (isset($_POST['btn_cadastrar'])) {


    $email = $_POST['email_usuario'];
    $sexo_pessoa = $_POST['sexo_pessoa'];
    $cod_cidade = $_POST['cod_cidade'];
    $senha = $_POST['senha_usuario'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $tel_fixo = $_POST['telefone_usuario'];
    $tel_cel = $_POST['celular_usuario'];
    $data_ultima = (isset($_POST['data_doacao']) == '' ? null : $_POST['data_doacao']);
    $precisa_sangue = $_POST['doacao_sangue'];
    $nome = $_POST['nome_usuario'];
    $data_nascimento = $_POST['data_nascimento'];
    $cod_tiposangue = $_POST['cod_tiposangue'];

    $objGravar = new PessoaController();
       $ret =   $objGravar->InserirPessoa($nome, $email, $senha, $confirmar_senha, $data_nascimento, $tel_fixo, $tel_cel, $data_ultima, $cod_cidade, $cod_tiposangue, $sexo_pessoa, $precisa_sangue,1);
}



$objController = new PessoaController();
$ListaCidades = $objController->ListarCidades(1);

$ListaTipo = $objController->ListarTipoSangues();
?>

<html lang="en">

    <!-- Mirrored from logiciel-tek.com/demo/html/healthline/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2015 21:38:33 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sangue Solidario</title>
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/settings.css" rel="stylesheet">
        <link href="css/magnific-popup.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.transitions.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/color.css" rel="stylesheet">
        <link href="css/datepicker.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->


        <!-- JavaScript Files
                       ================================================== -->
        <script src="js/jquery-1.11.0.min.js"></script>        
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/mask.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>                          
        <script src="js/script.js"></script>

        <!-- Google Map Script -->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script>
            /*		function initialize() {
             var location = new google.maps.LatLng(42.345573,-71.098326);
             var mapOptions = {
             center: location,
             zoom: 17
             };
             var mapElement = document.getElementById('map-canvas');
             var map = new google.maps.Map(mapElement, mapOptions);
             }
             google.maps.event.addDomListener(window, 'load', initialize);*/
        </script>


    </head>

    <body class="single-page">

        <!--preloader start-->
        <!--<div class="preloading-screen" style=" background:url(images/preloader_img.gif) #fff no-repeat center fixed;">
            <div class="spinners">
              <div class="bounce1">
                 
              </div>
            </div>
            
        </div>  
        <!--preloader end-->
        <!-- page-wraper -->
        <main class="page-wraper">

            <div id="home" class="sticky-menu-trigger">
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

                        <ul class="nav navbar-nav">
                            <li><a href="#home" class="on">Inicio</a></li>
                            <li><a href="#services" class="on">Sobre</a></li>
                            <li><a href="acessar.php" class="on">Acessar</a></li>                        

                            </nav>

                    </div>
                    <!-- fullscreen-slider -->
                    <article class="section">
                        <div class="section-image" style="background-image:url(images/resource/bg-image-1.png);">
                            <div class="container">
                                <!-- appointment-area -->
                                <div class="appointment-area">
                                    <div class="row">
                                        <div class="col-sm-10 col-md-6">
                                            <!-- appointment-box -->
                                            <div class="appointment-box">
                                                <header>
                                                    <h4>Cadastrar uma conta !</h4>
                                               <?php
                                               
                                               if($ret == 0){
                                               
                                                   echo 'Preencher campos Obrigatorios';
                                               
                                               }
                                               
                                               else if ($ret == -1){
                                                   
                                                   echo 'Ocorreu um erro tente mais tarde obrigado';
                                               }
                                               elseif ($ret == -2) {
                                                   
                                                   echo 'Preencher o campo nome';                                          
                                                   
                                               }
                                               else if ($ret == -3) {
                                                   
                                                   echo 'Digitar uma senha com no minimo 6 caracteres';
                                                   
                                               }
                                               else if ($ret == -4 ) {
                                                   
                                                   echo 'O campo senha não confere';
                                                   
                                               }
                                               else if ($ret == -5) {
                                                   
                                                   echo 'O campo telefone não esta preenchido';
                                                   
                                               }
                                               else if ($ret == 1) {
                                                   
                                                   echo '<script>window.location.href="http://localhost/sanguesolidariolocal/HTML/perfil.php"</script>';
                                                   
                                               }
                                     
                                               
                                               ?>
                                                </header>
                                                <div class="text">
                                                    <form class="appointment-form" method="post" action="index.php">
                                                        <ul class="row">
                                                            <li class="col-sm-12">
                                                                <label>Nome Completo</label>
                                                                <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Seu nome" class="form-control">
                                                            </li>										
                                                            <li class="col-sm-12">
                                                                <label>Email</label>
                                                                <input type="text" placeholder="Seu email" id="email_usuario" name="email_usuario" class="form-control">
                                                            </li>
                                                            <li class="col-sm-12">
                                                                <label>Seu sexo:</label>
                                                                <select name="sexo_pessoa" id="sexo_pessoa">
                                                                    <option value="">Selecione</option>
                                                                    <option value="F">Feminino</option>
                                                                    <option value="M">Masculino</option>
                                                                </select>
                                                            </li>
                                                            <li class="col-sm-12">
                                                                <label>Cidade:</label>
                                                                <select name="cod_cidade" id="cod_cidade">

                                                                    <option value="">Selecione</option>

                                                                    <?php
//Abre FOR
                                                                    for ($i = 0; $i < count($ListaCidades); $i++) {
                                                                        ?>

                                                                        <option value="<?php echo $ListaCidades[$i]['cod_cidade'] ?>"><?php echo $ListaCidades[$i]['nome_cidade'] ?> </option>

                                                                        <?php
                                                                        //Fecha FOR
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </li>
                                                            <li class="col-sm-5">
                                                                <label>Senha</label>
                                                                <input type="password" placeholder="Sua senha" id="senha_usuario" name="senha_usuario" class="form-control">
                                                            </li>
                                                            <li class="col-sm-5">
                                                                <label>Confirmar Senha</label>
                                                                <input type="password" placeholder="" id="confirmar_senha" name="confirmar_senha" class="form-control">
                                                            </li>
                                                            <li class="col-sm-5">
                                                                <label>Telefone</label>
                                                                <input type="text" placeholder="Seu telefone" id="telefone_usuario" name="telefone_usuario" class="form-control">
                                                            </li>
                                                            <li class="col-sm-5">
                                                                <label>Celular</label>
                                                                <input type="text" placeholder="Seu celular" id="celular_usuario" name="celular_usuario" class="form-control">
                                                            </li>
                                                            <li class="col-sm-6">
                                                                <label>Data de nascimento</label>
                                                                <span class="input-date">
                                                                    <input type="text" placeholder="Selecionar Data" id="data_nascimento" name="data_nascimento" class="form-control date datapree num"  value="" data-date-format="mm/dd/yy">
                                                                </span>
                                                            </li>
                                                            <li class="col-sm-12">
                                                                <label>Seu tipo de sangue:</label>
                                                                <select name="cod_tiposangue" id="cod_tiposangue">

                                                                    <option value="">Selecione</option>

                                                                    <?php
//Abre FOR
                                                                    for ($i = 0; $i < count($ListaTipo); $i++) {
                                                                        ?>

                                                                        <option value="<?php echo $ListaTipo[$i]['cod_tiposangue'] ?>"><?php echo $ListaTipo[$i]['nome_tipo'] ?> </option>

                                                                        <?php
                                                                        //Fecha FOR
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </li>
                                                            <li class="col-sm-6">
                                                                <label>Ultima Doação</label>
                                                                <span class="input-date">
                                                                    <input type="text" placeholder="Selecionar Data" id="data_doacao" name="data_doacao" class="form-control date datapree num" value="" >
                                                                </span>
                                                            </li>
                                                            <li class="col-sm-12">
                                                                <label>Preciso de Sangue ?:</label>
                                                                <select name="doacao_sangue" id="doacao_sangue">
                                                                    <option value="0">Não</option>
                                                                    <option value="1">Sim</option>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                        <ul class="row form-buttons">
                                                            </li>
                                                        </ul>
                                                        <div class="appintment-form-btm">
                                                            <div class="checkbox">
                                                                <label>

                                                            </div>
                                                            <input type="submit" class="btn btn-primary" value="Cadastrar" id="btn_cadastrar" name="btn_cadastrar" >
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 appointment-box-snap"> <img src="images/resource/img-1.png" alt="image doctor"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- quick-contact section -->
                <!-- /#home -->

                <div id="services">
                    <!-- services section --><!-- appointment section -->
                    <!-- /#services --><!--  /#doctors --><!-- /#news --><!-- /#gallery -->

                    <div id="blog">
                        <!-- blog section -->


                        <footer class="footer">
                            <div class="container">
                                <div class="row">

                                    <h4>Receba Novidades</h4>
                                </div>
                                <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.</p>
                                <form class="clearfix" action="http://logiciel-tek.com/demo/html/healthline/index.html" method="post">
                                    <input type="text" class="form-control" placeholder="Enter your Email">
                                    <input type="submit" class="btn btn-primary" value="Subscribe">
                                </form>
                            </div>

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


                        <script>

                            $('#btn_cadastrar').click(function () {

                                if ($('#nome_usuario').val().trim() == '') {
                                    alert('Favor preencher o campo NOME COMPLETO');
                                    return false;
                                } else if ($('#nome_usuario').val().trim().length < 7) {
                                    alert('Favor preencher o nome COMPLETO');
                                    return false;
                                }


                                if ($('#email_usuario').val().trim() == '') {
                                    alert('Favor preencher o campo EMAIL');
                                    return false;
                                }

                                if ($('#sexo_pessoa').val().trim() == '') {
                                    alert('Favor preencher o campo SEU SEXO');
                                    return false;
                                }
                                if ($('#cod_cidade').val().trim() == '') {
                                    alert('Favor preencher o campo CIDADE');
                                    return false;
                                }


                                if ($('#data_nascimento').val().trim() == '') {
                                    alert('Favor preencher o campo DATA NASCIMENTO');
                                    return false;
                                }
                                if ($('#cod_tiposangue').val().trim() == '') {
                                    alert('Favor preencher o campo TIPO DE SANGUE');
                                    return false;
                                }


                                if ($('#senha_usuario').val().trim() == '') {
                                    alert('Favor preencher o campo SENHA');
                                    return false;
                                } else if ($('#senha_usuario').val().trim().length < 6) {
                                    alert('Digitar uma senha com no mínimo 6 caracteres');
                                    return false;
                                }
                                if ($('#confirmar_senha').val().trim() == '') {
                                    alert('Favor preencher o campo REPETIR SENHA');
                                    return false;
                                } else if ($('#confirmar_senha').val().trim() != $('#senha_usuario').val().trim()) {
                                    alert('O campo SENHA e REPETIR SENHA não conferem');
                                    return false;
                                }
                                if ($('#telefone_usuario').val().trim() == '' && $('#celular_usuario').val().trim() == '') {
                                    alert('Informe ao menos um telefone');
                                    return false;
                                }


                            });

                        </script>


                        </body>

                        <!-- Mirrored from logiciel-tek.com/demo/html/healthline/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2015 21:42:07 GMT -->
                        </html>
