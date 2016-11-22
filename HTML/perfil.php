<!DOCTYPE html>
<?php


require_once '../Controller/PessoaController.php';
require_once '../Controller/util.php';

$ret = '-100';
if ($_SESSION['codigo']=='' && $_SESSION['nome'] =='' ){
    
    echo '<script>window.location.href="http://localhost/sanguesolidariolocal/HTML/acessar.php"</script>';
    exit;
}  

if (isset($_POST['bt_sair'])){
    unset($_SESSION['codigo']);
    unset($_SESSION['nome']);
    echo '<script>window.location.href="http://localhost/sanguesolidariolocal/HTML/acessar.php"</script>';
}
if (isset($_POST['btn_cadastrar'])) {


    $email = $_POST['email_usuario'];
    $sexo_pessoa = $_POST['sexo_pessoa'];
    $cod_cidade = $_POST['cod_cidade'];
    $senha = $_POST['senha_usuario'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $tel_fixo = $_POST['telefone_usuario'];
    $tel_cel = $_POST['celular_usuario'];
    $data_ultima = $_POST['data_doacao'];
    $precisa_sangue = $_POST['doacao_sangue'];
    $nome = $_POST['nome_usuario'];
    $data_nascimento = $_POST['data_nascimento'];
    $cod_tiposangue = $_POST['cod_tiposangue'];
 
    
    $objGravar = new PessoaController();
   $ret = $objGravar->InserirPessoa($nome, $email, $senha, $confirmar_senha, $data_nascimento, $tel_fixo, $tel_cel, $data_ultima, $cod_cidade, $sexo_pessoa, $cod_tiposangue, $precisa_sangue, 1);
}
if(isset($_POST["btn_salvar"])){
    $nome_pessoa = $_POST['nome_usuario'];
    $email = $_POST['email_usuario'];
    $sexo_pessoa = $_POST ['sexo_pessoa'];
    $cod_cidade = $_POST['cod_cidade'];
    $tel_fixo = $_POST['telefone_usuario'];
    $tel_cel = $_POST ['celular_usuario'];
    $data_nascimento = $_POST ['data_nascimento'];
    $tipo_sangue = $_POST ['cod_tiposangue'];
    $data_ultima = $_POST ['data_doacao'];
    $precisa_sangue = $_POST ['doacao_sangue'];
    $cod_pessoa = util::RetornaCodigoLogado();

    
    $obj = new PessoaController();
    $ret = $obj->AlterarPessoa($nome_pessoa, $email, $data_nascimento, $tel_fixo, $tel_cel, $data_ultima, $cod_cidade, $tipo_sangue, $sexo_pessoa, $precisa_sangue, 1, $cod_pessoa);
    
}


$objController = new PessoaController();

$pessoa = $objController->CarregarMinhasInformacoes(util::RetornaCodigoLogado());

$ListaCidades = $objController->ListarCidades(1);

$ListaTipo = $objController->ListarTipoSangues();



        

?>



<html lang="en">

<!-- Mirrored from logiciel-tek.com/demo/html/healthline/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Sep 2015 21:43:48 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="author" content="">
<title>Alterar Senha - Sangue Solidario</title>
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
                                                        <li><form method="post"><button name="bt_sair" lass="on">Sair</button></form></li>
        </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>


      <!-- content-section -->
      <form action="perfil.php" method="post">
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
                                                            <li class="active"><a href="perfil.php" title="Perfil">Sobre</a></li>
							
                                                                <li><a href="alterar_senha.php" title="Alterar Senha">Alterar Senha</a></li>
							</ul>
						</nav>
						 <?php
                                               
                                               if($ret == 0){
                                               
                                                   echo 'Preencher campos Obrigatorios';
                                               
                                               }
                                               
                                               else if ($ret == -1){
                                                   
                                                   echo 'Ocorreu um erro tente mais tarde obrigado';
                                               }
                                               elseif ($ret == 1) {
                                                   
                                                   echo 'Dados Gravados com sucesso !';                                          
                                                   
                                               }
                                               
                                               
                                               ?>
						<!--about-->
					<br><br><br><div class="appointment-box"></br></br></br>
                        <div class="tab-content" id="about">
							<div class="row">
								<dl class="basic two-third">
									<dt>Nome</dt>
                                                                        <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Seu nome" value="<?php echo $pessoa [0]['nome_pessoa'];?>" class="form-control">
									<dt>E-mail</dt>
									 <input type="text" placeholder="Seu email" id="email_usuario" name="email_usuario"value="<?php echo $pessoa [0]['email_pessoa'];?>" class="form-control">
                                                                         <br>
                                                                         <dt>Sexo</dt>
                                                                        <select name="sexo_pessoa" id="sexo_pessoa" >
                                                                  <?php
                                                                  
                                                                  if ($pessoa[0]['sexo_pessoa'] == 'M'){
                                                                      echo '             
                                                                   
                                                                    <option value="F">Feminino</option>
                                                                    <option value="M" selected="selected">Masculino</option>';
 
                                                                  }else if ($pessoa[0]['sexo_pessoa'] == 'F') {
                                                                      echo '            
                                                                 
                                                                    <<option value="F" selected="selected">Feminino</option>
                                                                    <option value="M">Masculino</option>';   
                                                                            }
                                                                  
                                                                  
                                                                  ?>
                                                                  
                                                                        </select>
                                                                         </br>
                                                                         <br>
                                                                         <dt>Cidade</dt>
                                                                        <select name="cod_cidade" id="cod_cidade">

                                                                    <option value="">Selecione</option>

                                                                    <?php
//Abre FOR
                                                                    for ($i = 0; $i < count($ListaCidades); $i++) {
                                                                        
                                                                       if($pessoa[0]['cod_cidade'] == $ListaCidades [$i]['cod_cidade'])
                                                                       echo "<option selected='selected' value=".$ListaCidades[$i]['cod_cidade'].">".$ListaCidades[$i]['nome_cidade']."</option>";
                                                                       else
                                                                           echo "<option value=".$ListaCidades[$i]['cod_cidade'].">".$ListaCidades[$i]['nome_cidade']."</option>";    
                                                                        
                                                                        //Fecha FOR
                                                                    }
                                                                    ?>
                                                                </select>
                                                                         </br>
                                                                         <br>
                                                                         <dt>Telefone</dt>
									 <input type="text" id="telefone_usuario" name="telefone_usuario" placeholder="Seu telefone" value="<?php echo $pessoa [0]['telefone_pessoa'];?>"  class="form-control">
                                                                         </br>
									<dt>Celular</dt>
									 <input type="text" id="celular_usuario" name="celular_usuario" placeholder="Seu Celular" value="<?php echo $pessoa [0]['celular_pessoa'];?>" class="form-control">
									<dt>Data de nascimento</dt>
									
                                                                <span class="input-date">
                                                                    <input type="text" placeholder="Selecionar Data" id="data_nascimento" name="data_nascimento" class="form-control" value="<?php echo $pessoa [0]['data_nascimento'];?>" data-date-format="mm/dd/yy">
                                                                </span>
                                                                         <dt>Tipo de Sangue</dt>
									 <select name="cod_tiposangue" id="cod_tiposangue">

                                                                    <option value="">Selecione</option>

                                                                    <?php
//Abre FOR
                                                                    for ($i = 0; $i < count($ListaTipo); $i++) {
                                                                   
                                                                        if($pessoa[0]['cod_tiposangue'] == $ListaTipo[$i]['cod_tiposangue'] )
                                                                        {
                                                                            
                                                                        
                                                                        
                                                                        ?>

                                                                    <option selected="selected" value="<?php echo $ListaTipo[$i]['cod_tiposangue'] ?>"><?php echo $ListaTipo[$i]['nome_tipo'] ?> </option>

                                                                        <?php
                                                                        //Fecha FOR
                                                                    } else {?>
                                                                    
                                                                    <option  value="<?php echo $ListaTipo[$i]['cod_tiposangue'] ?>"><?php echo $ListaTipo[$i]['nome_tipo'] ?> </option>
                                                                     <?php
                                                                    }
                                                                    
                                                                    
                                                                    }    
                                                                    
                                                                    ?>
                                                                </select>
                                                                         <br><br>
                                                                         <dt>Ultima doação</dt>
								
                                                                <span class="input-date">
                                                                    <input type="text" placeholder="Selecionar Data" id="data_doacao" name="data_doacao" class="form-control datepicker" value="<?php echo $pessoa [0]['ultima_doacao'];?>" data-date-format="mm/dd/yy">
                                                                </span>
                                                                         </br></br>
                                                                         <dt>Precisa de Sangue ?</dt>
                                                                         <select name="doacao_sangue" id="doacao_sangue">
                                                                   <?php
                                                                    
                                                                   if($pessoa [0]['precisa_sangue'] == 0){
                                                                             
                                                                    echo '<option selected="selected" value="0">Não</option>
                                                                          <option value="1">Sim</option>';
                                                                    }else if($pessoa [0] ['precisa_sangue'] == 1){
                                                                        echo '<option  value="0">Não</option>
                                                                          <option selected="selected" value="1">Sim</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                         <br><br>
                                                                         <button type="submit" class="btn btn-primary" value="Salvar" id="btn_salvar" name="btn_salvar">Salvar </button>
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