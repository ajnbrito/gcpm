<?php
    session_start();
    include_once "../../controller/FeController.php";
    $FeController = new FeController();
    $FeController->treinamentoDetalhe();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="../../lib/css/MarketPlace.css" type="text/css" />

<title>ALIX - Gest&atilde;o em Seguran&ccedil;a da Informa&ccedil;&atilde;o</title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>

<!-- wrap starts here -->
<div id="twitter"><a href="http://twitter.com/#!/alixsecurity" target="_blank"><img src="../../lib/images/icnTwitterLateral.gif" alt="" width="45" height="160" /></a></div>
<div id="wrap">

	<!--header -->
	<div id="header">
	  <!--header ends-->
</div>
		
	<div id="header-photo">
	
	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','850','height','250','src','../..//lib/flash/banner','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../..//lib/flash/banner' ); //end AC code
          </script>
	  <noscript>
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="850" height="250">
        <param name="movie" value="../..//lib/flash/banner.swf" />
        <param name="quality" value="high" />
        <embed src="../..//lib/flash/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="850" height="250"></embed>
      </object>
	  </noscript>
	  <h6 id="h6">&nbsp;</h6>
  </div>		
			
	<!-- navigation starts-->	
	<div  id="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="../../controller/FeController.php?opcao=sobre">empresa</a></li>
			<li><a href="servico.php">servi&Ccedil;os</a></li>			
			<li id="current"><a href="treinamento.php">treinamentos</a></li>
			<li><a href="evento.php">eventos</a></li>
			<li><a href="parceiro.php">parceiros</a></li>
			<li><a href="contato.php">case</a><a href="contato.php">contato</a></li>					
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap" class="three-col"  >
	  <div id="main2">
              <?php
              
                 echo "<h1>{$_SESSION['list_treinamentoDetalhe']->nome}</h1>";
                 echo "<h3>Sobre o curso</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_sobre}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Público Alvo</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_publico_alvo}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Conteúdo Programático</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_conteudo}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Sobre o Instrutor</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_instrutor}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Número de Vagas</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->numero_vagas}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Locais dos Cursos/Treinamentos</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_locais}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Próximas turmas</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_proximas_turmas}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>In Company</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_incompany}</p>";
                 echo "<br>";
                 echo "<hr>";
                 echo "<h3>Informações Gerais</h3>";
                 echo "<p>{$_SESSION['list_treinamentoDetalhe']->texto_informacoes}</p>";
                 
              
              ?>		  
	  </div>
		
	  <!-- content-wrap ends-->	
  </div>
		
	<!-- footer starts -->			
	<div id="footer-wrap"><div id="footer">				
			
			<p><?= RODAPE ?> | Desenvolvido por <a href="http://www.marcelojaques.com.br" target="_blank">MJ</a> </p>
			
	</div></div>
	<!-- footer ends-->
</div>


</body>
</html>
