<!DOCTYPE html>

<?php
require_once '../Controller/PessoaController.php';
//phpinfo();

$ret = '-100';

if (isset($_POST['btn_logar'])) {


    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];

    $obj = new PessoaController();
    $ret = $obj->ValidarLogin($email, $senha);
}

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
                            <li><a href="#gallery" class="on">Acessar</a></li>                        

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
                                                    <h4>Acesso</h4>
                                               <?php
                                               
                                               if($ret == 0){
                                               
                                                   echo 'Preencher campos Obrigatorios';
                                               
                                               }
                                               
                                               else if ($ret == -1){
                                                   
                                                   echo 'Ocorreu um erro tente mais tarde obrigado';
                                               }
                                               elseif ($ret == -2) {
                                                   
                                                   echo 'Usuario não encontrado';                                          
                                                   
                                               }
                                               else if ($ret == 1) {
                                                   
                                                   echo '<script>window.location.href="http://localhost/sanguesolidariolocal/HTML/perfil.php"</script>';
                                                   
                                               }
                                             
                                               ?>
                                                </header>
                                                <div class="text">
                                                    <form class="appointment-form" method="post" action="acessar.php">
                                                        <ul class="row">
                                                           									
                                                            <li class="col-sm-12">
                                                                <label>Email</label>
                                                                <input type="text" placeholder="Seu email" id="email_usuario" name="email_usuario" class="form-control">
                                                            </li>
                                                             <li class="col-sm-12">
                                                                <label>Senha</label>
                                                                <input type="password" id="senha_usuario" name="senha_usuario" placeholder="Senha" class="form-control">
                                                            </li>	

                                                        <ul class="row form-buttons">
                                                            </li>
                                                        </ul>
                                                        <div class="appintment-form-btm">
                                                            <div class="checkbox">
                                                                <label>

                                                            </div>
                                                            <input type="submit" class="btn btn-primary" value="Entrar" id="btn_logar" name="btn_logar" >
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

                            $('#btn_logar').click(function () {
                                if ($('#email_usuario').val().trim() == '') {
                                    alert('Favor preencher o campo EMAIL');
                                    return false;
                                }
                                if ($('#senha_usuario').val().trim() == '') {
                                    alert('Favor preencher o campo SENHA');
                                    return false;                     
                                }


                            });

                        </script>


                        </body>

                        <!-- Mirrored from logiciel-tek.com/demo/html/healthline/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2015 21:42:07 GMT -->
                        </html>
