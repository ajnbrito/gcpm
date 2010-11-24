<?php
session_start();
include_once "../../controller/FeController.php";
$FeController = new FeController();
$FeController->index();
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
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="850" height="250">
                    <param name="movie" value="../..//lib/flash/banner.swf" />
                    <param name="quality" value="high" />
                    <embed src="../..//lib/flash/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="850" height="250"></embed>
                  </object></noscript>
                
                <h6 id="h6">&nbsp;</h6>
          </div>

            <!-- navigation starts-->
            <div  id="nav">
                <ul>
                    <li id="current"><a href="index.php">Home</a></li>
					<li><a href="empresa.php">empresa</a></li>
					<li><a href="servico.php">servi&Ccedil;os</a></li>			
					<li><a href="treinamento.php">treinamentos</a></li>
					<li><a href="evento.php">eventos</a></li>
					<li><a href="parceiro.php">parceiros</a></li>
					<li><a href="noticia.php">notícias</a></li>
					<li><a href="case.php">case</a></li>					
					<li><a href="contato.php">contato</a></li>
                </ul>
                <!-- navigation ends-->
            </div>

            <!-- content-wrap starts -->
            <div id="content-wrap" class="three-col"  >

                <div id="sidebar">
                  <h1>Serviços</h1>

                    <ul class="sidemenu">
                        <?php
                        foreach ($_SESSION['list_servico'] as $servico)
                        {
                            echo "<li><a href=\"../../controller/FeController.php?opcao=servico&id_servico={$servico['id_servico']}\">{$servico['titulo']}</a></li>";
                        }
                        ?>
                    </ul>
                    <h1>&nbsp;</h1>
                    <h1>Parceiros</h1>
                    <ul class="sidemenu">
                        <?php
                        foreach ($_SESSION['list_parceiro'] as $parceiro)
                        {
                            echo "<li><a href=\"../../controller/FeController.php?opcao=parceiro&id_parceiro={$parceiro['id_parceiro']}\">{$parceiro['nome']}</a></li>";
                        }
                        ?>
                    </ul>
                    <h1>&nbsp;</h1>
                    <h1>Treinamentos</h1>
                    <ul class="sidemenu">
                        <?php
                        foreach ($_SESSION['list_treinamento'] as $treinamento)
                        {
                            echo "<li><a href=\"../../controller/FeController.php?opcao=treinamentoDetalhe&id_treinamento={$treinamento['id_treinamento']}\">{$treinamento['nome']}</a></li>";
                        }
                        ?>
                    </ul>

                    <h1>&nbsp;</h1>
                    <h1>Eventos</h1>
                    <ul class="sidemenu">
                        <?php
                        foreach ($_SESSION['list_evento'] as $evento)
                        {
                            echo "<li><a href=\"../../controller/FeController.php?opcao=evento&id_evento={$evento['id_evento']}\">{$evento['titulo']}</a></li>";
                        }
                        ?>
                    </ul>
              </div>

                <div id="main">
                    <?php
                        foreach ($_SESSION['list_home'] as $home)
                        {
                            //echo "<h1>{$home['titulo']}</h1>";

                            if ($home['arquivo_arquivo'])
                            {
                                echo "<div id=\"esquerda\"><h1>{$home['titulo']}</h1><p>{$home['texto_texto']}</p><br></div>";
                                echo "<div id=\"direita\"><br><br><br><p><img src=\"../../upload/{$home['arquivo_arquivo']}\" width=\"200\"></p></div>";
                            }
                            else
                            {
                                echo "<div id=\"esquerda2\"><h1>{$home['titulo']}</h1><p>{$home['texto_texto']}</p><br></div>";
                            }
                        }
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
