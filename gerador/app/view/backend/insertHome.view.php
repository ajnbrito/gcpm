<?php 
/*  
 * Inicia session  
 * Descrição do arquivo  
 * @author Marcelo Jaques  
 * @version 1.0  
 * @package views  
 * @name viewHome 
 */  
session_start();  
if(!$_SESSION['login'])  
{  
  header("Location: ../../view/backend/erro.php");  
  break;  
}  
/*  
* Função autoload, carrega as classes automáticamente  
*/  
function __autoload($classe)  
{  
    include_once "../../model/{$classe}.class.php";  
}  
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>IN ADMIN PANEL | Powered by INDEZINER</title>  
        <script type="text/javascript" src="../../lib/js/dhtmlgoodies_calendar.js"></script>  
        <link rel="stylesheet" type="text/css" href="../../lib/css/style.css" />  
        <script type="text/javascript" src="../../lib/js/clockp.js"></script>  
        <script type="text/javascript" src="../../lib/js/clockh.js"></script>  
        <script type="text/javascript" src="../../lib/js/jquery.min.js"></script>  
        <script type="text/javascript" src="../../lib/js/ddaccordion.js"></script>  
        <script type="text/javascript">  
            ddaccordion.init({  
                headerclass: "submenuheader", //Shared CSS class name of headers group  
                contentclass: "submenu", //Shared CSS class name of contents group  
                revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"  
                mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover  
                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false  
                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content  
                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)  
                animatedefault: false, //Should contents open by default be animated into view?  
                persiststate: true, //persist state of opened contents within browser session?  
                toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]  
                togglehtml: ["suffix", "<img src='../../lib/images/plus.gif' class='statusicon' />", "<img src='../../lib/images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)  
                animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"  
                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized  
                    //do nothing  
                },  
                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed  
                    //do nothing  
                }  
            })  
        </script>  
        <script type="text/javascript" src="../../lib/js/jconfirmaction.jquery.js"></script>  
        <script type="text/javascript">  
            $(document).ready(function() {  
                $('.ask').jConfirmAction();  
            });  
        </script>  
       <script language="javascript" type="text/javascript" src="../../lib/js/niceforms.js"></script>  
       <link rel="stylesheet" type="text/css" media="all" href="../../lib/css/niceforms-default.css" />  
       <link rel="stylesheet" type="text/css" media="screen" href="../../lib/css/dhtmlgoodies_calendar.css"></link> 
    </head>  
    <body>  
        <div id="main_container">  
            <div class="header">  
                <div class="logo"><a href="#"><img src="../../lib/images/logo.gif" alt="" title="" border="0" /></a></div>  
                <div class="right_header">Bem Vindo, <?= $_SESSION['login']->nome ?> | <a href="../../controller/LoginController.php?opcao=logout" class="logout">Logout</a></div>  
               <div id="clock_a"></div>  
            </div>  
            <div class="main_content">   
                <div class="menu">   
                    <ul>   
                        <li>   
                            <h2>Incluir  Home</h2>   
                        </li>   
                    </ul>   
                </div>   
                <div class="center_content">   
                    <div class="left_content">   
                    <?php $Menu = new Menu(); ?>    
                    </div>   
                    <div class="right_content">   
                        <div class="form">   
                            <form action="../../controller/Home.controller.php" method="post" class="niceform" enctype="multipart/form-data">   
                                <fieldset>   
                                    <input type="hidden" name="opcao" value="insert" />   
                                    <dl>   
                                        <dt></dt>   
                                        <dd><input type="hidden" name="id_home" id="id_home" value="" /></dd>   
                                    </dl>   
                                    <dl>   
                                        <dt></dt>   
                                        <dd><input type="hidden" name="fk_id_usuario" id="fk_id_usuario" value="<?= $_SESSION['login']->id_usuario ?>"/></dd>   
                                    </dl>   
                                    <dl>   
                                        <dt><label for="titulo">titulo:</label></dt>   
                                        <dd><input type="text" name="titulo" size="40" />   
                                        </dd>   
                                    </dl>   
                                    <dl>      
                                    <dt><label for="texto_texto">texto_texto:</label></dt>      
                                    <dd><textarea name="texto_texto" id="texto_texto" rows="6" cols="41"></textarea></dd>      
                                    </dl>      
                                    <dl>    
                                         <dt><label for="arquivo_arquivo">Arquivo_arquivo:</label></dt>    
                                         <dd><input type="file" name="arquivo_arquivo" id="arquivo_arquivo" /></dd>    
                                    </dl>    
                                <dl class="submit">    
                                <dt><label></label></dt>    
                                <dd>    
                                <input type="submit" name="submit" id="submit" value="Salvar" />    
                                </dd>    
                                </dl>    
                                </fieldset>   
                            </form>   
                        </div>   
                    </div><!-- end of right content-->   
                </div>   <!--end of center content -->   
                <div class="clear"></div>   
            </div> <!--end of main content-->   
            <div class="footer">  
                <div class="left_footer">RODAPE<a href="http://indeziner.com"></a></div>  
            </div>  
        </div>  
    </body>  
</html>  
