<?php 
/*  
 * Inicia session  
 * Descrição do arquivo  
 * @author Marcelo Jaques  
 * @version 1.0  
 * @package views  
 * @name viewBanner 
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
                            <h2>Listar  Banner</h2>  
                        </li>  
                    </ul>  
                </div>  
                <div class="center_content">  
                    <div class="left_content">  
                    <?php $Menu = new Menu(); ?>   
                    </div>  
                     <div class="right_content">  
                       <table id="rounded-corner" > 
                       <thead> 
                           <tr> 
                               <th width="34"   class="rounded-company" scope="col"></th> 
                               <th width="378"   class="rounded" scope="col"><b>Titulo</b></th> 
                               <th width="69"  class="rounded" scope="col"><div align="center"><b>Detalhes</b></div></th> 
                               <th width="59"  class="rounded" scope="col"><div align="center"><b>Alterar</b></div></th> 
                               <th width="61"  class="rounded-q4" scope="col"><div align="center"><b>Excluir</b></div></th> 
                           </tr> 
                       </thead> 
                       <tfoot> 
                       </tfoot> 
                       <tbody> 
                       <form action="../../controller/Banner.controller.php" method="POST" name="form" enctype="multipart/form-data" class="niceform" >  
                       <input type="hidden" name="opcao" value="deleteAll" />  
                       <?php  
                       if(!$_SESSION['listFilter']) 
                                               { 
                                              ?> 
                                              <tr> 
                                                  <td></td> 
                                                  <td>Nenhum Registro Encontrado</td> 
                                                  <td></td> 
                                                  <td></td> 
                                                  <td></td> 
                                              </tr> 
                                             <?php 
                                              }         
                       foreach($_SESSION['listFilter'] as $campo) {  ?>  
                          <tr>  
                              <td><input type="checkbox" name="id_banner[]" value="<?= $campo['id_banner'] ?>" /></td>  
                              <td><?= $campo['titulo'] ?></td>  
                              <td><div align="center"><a href="#" onclick="window.open('../../controller/Banner.controller.php?id_banner=<?= $campo['id_banner'] ?>&opcao=details', 'Detalhes', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=200, LEFT=300, WIDTH=670, HEIGHT=320')"><img src="../../lib/images/zoom.png" alt="" title="" border="0" /></a></div></td>  
                              <td><div align="center"><a href="../../controller/Banner.controller.php?id_banner=<?= $campo['id_banner'] ?>&opcao=listPk "><img src="../../lib/images/user_edit.png" alt="" title="" border="0" /></a></div></td>  
                              <td><div align="center"><a href="../../controller/Banner.controller.php?id_banner=<?= $campo['id_banner'] ?>&opcao=delete" class="ask"><img src="../../lib/images/trash.png" alt="" title="" border="0" /></a></div></td>  
                          </tr>  
                       <?php  } ?>  
                       </form>  
                       </tbody>  
                       </table>  
                       <p></p>  
                       <div align="right">  
                          <a href="insertBanner.view.php"><img src="../../lib/images/bt-novo.png" alt="" title="" border="0" /></a>  
                          <a href="selectBanner.view.php"><img src="../../lib/images/bt-pesquisar.png" alt="" title="" border="0" /></a>  
                          <a href="javascript:document.form.submit()" class="ask"><img src="../../lib/images/bt-excluir.png" alt="" title="" border="0" /></a>  
                       </div>  
                       <div class="pagination">  
                       <?php    
                                  if($_SESSION['countAll'] > $_SESSION['totalPorPg'])   
                                  {   
                                     if($_SESSION['countAll'][0]['total'] > $_SESSION['totalPorPg'])   
                                     {   
                                         for($i=0; $i < $_SESSION['countAll'][0]['total'] / $_SESSION['totalPorPg']; $i++)   
                                         {  
                                             if($_SESSION['inicio'] == $i*$_SESSION['totalPorPg'])  
                                             {  
                                  ?>   
                                                   <span class="current"><?= $i+1 ?></span>  
                                  <?php    
                                             }  
                                             else  
                                             {  
                                  ?>   
                                                   <a href="../../controller/Banner.controller.php?inicio=<?= $i ?>&opcao=listAll"><?= $i+1 ?></a>   
                                  <?php     
                                             }  
                                         }  
                                     }   
                                  }   
                                  else   
                                  {   
                                     if($_SESSION['countFilter'][0]['total'] > $_SESSION['totalPorPg'])  
                                     {  
                                         for($i=0; $i < $_SESSION['countFilter'][0]['total'] / $_SESSION['totalPorPg']; $i++)   
                                         {                    
                                           if($_SESSION['inicio'] == $i*$_SESSION['totalPorPg'])  
                                             {  
                                  ?>  
                                                   <span class="current"><?= $i+1 ?></span>  
                                  <?php  
                                             }  
                                             else  
                                             {  
                                  ?>  
                                                   <a href="../../controller/Banner.controller.php?inicio=<?= $i ?>&opcao=listFilter"><?= $i+1 ?></a>  
                                  <?php  
                                             }  
                                         }  
                                     }  
                                  }   
                                  ?>  
                       </div> 
                   </div> <!-- end of right content--> 
                </div>   <!--end of center content -->  
                <div class="clear"></div>  
            </div> <!--end of main content-->  
            <div class="footer">  
                <div class="left_footer">RODAPE<a href="http://indeziner.com"></a></div>  
            </div>  
        </div>  
    </body>  
</html>  
