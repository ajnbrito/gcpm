<?php

/*
 * Inicia seção
 */
session_start();

/*
 * função auto loader, garrega classes automaticamente
 */

function __autoload($classe) {
    require_once ucfirst($classe) . '.class.php';
}

/*
 * Dia e hora da criação do arquivo
 */
$hoje = date("d/m/Y");
$hora = date("H:i:s");

/*
 * Listar tabelas do banco de dados
 */
$Conexao = new Conexao();
foreach ($Conexao->nomeTabela() as $nomeTabela) {
    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php";
    $linha = "<?php \n";
    $linha .= "/*  \n";
    $linha .= " * Inicia session  \n";
    $linha .= " * Descrição do arquivo  \n";
    $linha .= " * @author Marcelo Jaques  \n";
    $linha .= " * @version 1.0  \n";
    $linha .= " * @package views  \n";
    $linha .= " * @name view" . ucfirst($nomeTabela[0]) . " \n";
    $linha .= " */  \n";
    $linha .= "session_start();  \n";
    $linha .= "if(!\$_SESSION['login'])  \n";
    $linha .= "{  \n";
    $linha .= "  header(\"Location: ../../view/backend/erro.php\");  \n";
    $linha .= "  break;  \n";
    $linha .= "}  \n";

    $linha .= "/*  \n";
    $linha .= "* Função autoload, carrega as classes automáticamente  \n";
    $linha .= "*/  \n";
    $linha .= "function __autoload(\$classe)  \n";
    $linha .= "{  \n";
    $linha .= "    include_once \"../../model/{\$classe}.class.php\";  \n";
    $linha .= "}  \n";
    $linha .= "?>  \n";

    $linha .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">  \n";
    $linha .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">  \n";
    $linha .= "    <head>  \n";
    $linha .= "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />  \n";
    $linha .= "        <title>IN ADMIN PANEL | Powered by INDEZINER</title>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/dhtmlgoodies_calendar.js\"></script>  \n";
    $linha .= "        <link rel=\"stylesheet\" type=\"text/css\" href=\"../../lib/css/style.css\" />  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockp.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockh.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jquery.min.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/ddaccordion.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            ddaccordion.init({  \n";
    $linha .= "                headerclass: \"submenuheader\", //Shared CSS class name of headers group  \n";
    $linha .= "                contentclass: \"submenu\", //Shared CSS class name of contents group  \n";
    $linha .= "                revealtype: \"click\", //Reveal content when user clicks or onmouseover the header? Valid value: \"click\", \"clickgo\", or \"mouseover\"  \n";
    $linha .= "                mouseoverdelay: 200, //if revealtype=\"mouseover\", set delay in milliseconds before header expands onMouseover  \n";
    $linha .= "                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false  \n";
    $linha .= "                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content  \n";
    $linha .= "                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)  \n";
    $linha .= "                animatedefault: false, //Should contents open by default be animated into view?  \n";
    $linha .= "                persiststate: true, //persist state of opened contents within browser session?  \n";
    $linha .= "                toggleclass: [\"\", \"\"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively [\"class1\", \"class2\"]  \n";
    $linha .= "                togglehtml: [\"suffix\", \"<img src='../../lib/images/plus.gif' class='statusicon' />\", \"<img src='../../lib/images/minus.gif' class='statusicon' />\"], //Additional HTML added to the header when it's collapsed and expanded, respectively  [\"position\", \"html1\", \"html2\"] (see docs)  \n";
    $linha .= "                animatespeed: \"fast\", //speed of animation: integer in milliseconds (ie: 200), or keywords \"fast\", \"normal\", or \"slow\"  \n";
    $linha .= "                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                },  \n";
    $linha .= "                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                }  \n";
    $linha .= "            })  \n";
    $linha .= "        </script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jconfirmaction.jquery.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            $(document).ready(function() {  \n";
    $linha .= "                $('.ask').jConfirmAction();  \n";
    $linha .= "            });  \n";
    $linha .= "        </script>  \n";
    $linha .= "       <script language=\"javascript\" type=\"text/javascript\" src=\"../../lib/js/niceforms.js\"></script>  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"../../lib/css/niceforms-default.css\" />  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"../../lib/css/dhtmlgoodies_calendar.css\"></link> \n";
    $linha .= "    </head>  \n";
    $linha .= "    <body>  \n";
    $linha .= "        <div id=\"main_container\">  \n";
    $linha .= "            <div class=\"header\">  \n";
    $linha .= "                <div class=\"logo\"><a href=\"#\"><img src=\"../../lib/images/logo.gif\" alt=\"\" title=\"\" border=\"0\" /></a></div>  \n";
    $linha .= "                <div class=\"right_header\">Bem Vindo, <?= \$_SESSION['login']->nome ?> | <a href=\"../../controller/LoginController.php?opcao=logout\" class=\"logout\">Logout</a></div>  \n";
    $linha .= "               <div id=\"clock_a\"></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "            <div class=\"main_content\">  \n";
    $linha .= "                <div class=\"menu\">  \n";
    $linha .= "                    <ul>  \n";
    $linha .= "                        <li>  \n";
    $linha .= "                            <h2>Listar  " . ucfirst($nomeTabela[0]) . "</h2>  \n";
    $linha .= "                        </li>  \n";
    $linha .= "                    </ul>  \n";
    $linha .= "                </div>  \n";
    $linha .= "                <div class=\"center_content\">  \n";
    $linha .= "                    <div class=\"left_content\">  \n";
    $linha .= "                    <?php \$Menu = new Menu(); ?>   \n";
    $linha .= "                    </div>  \n";
    $linha .= "                     <div class=\"right_content\">  \n";
    $linha .= "                       <table id=\"rounded-corner\" > \n";
    $linha .= "                       <thead> \n";
    $linha .= "                           <tr> \n";
    $linha .= "                               <th width=\"34\"   class=\"rounded-company\" scope=\"col\"></th> \n";
    $linha .= "                               <th width=\"378\"   class=\"rounded\" scope=\"col\"><b>";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $ex = explode("_", $nomeCampo['Field']);
        if ($ex[0] != "id" && $ex[0] != "fk" && $ex[0] != "data") {
            $linha .= ucfirst($nomeCampo['Field']);
            break;
        }
    }
    $linha .= "</b></th> \n";
    $linha .= "                               <th width=\"69\"  class=\"rounded\" scope=\"col\"><div align=\"center\"><b>Detalhes</b></div></th> \n";
    $linha .= "                               <th width=\"59\"  class=\"rounded\" scope=\"col\"><div align=\"center\"><b>Alterar</b></div></th> \n";
    $linha .= "                               <th width=\"61\"  class=\"rounded-q4\" scope=\"col\"><div align=\"center\"><b>Excluir</b></div></th> \n";
    $linha .= "                           </tr> \n";
    $linha .= "                       </thead> \n";
    $linha .= "                       <tfoot> \n";
    $linha .= "                       </tfoot> \n";
    $linha .= "                       <tbody> \n";
    $linha .= "                       <form action=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php\" method=\"POST\" name=\"form\" enctype=\"multipart/form-data\" class=\"niceform\" >  \n";
    $linha .= "                       <input type=\"hidden\" name=\"opcao\" value=\"deleteAll\" />  \n";
    $linha .= "                       <?php  \n";
    $linha .= "                       if(!\$_SESSION['listFilter']) \n";
    $linha .= "                                               { \n";
    $linha .= "                                              ?> \n";
    $linha .= "                                              <tr> \n";
    $linha .= "                                                  <td></td> \n";
    $linha .= "                                                  <td>Nenhum Registro Encontrado</td> \n";
    $linha .= "                                                  <td></td> \n";
    $linha .= "                                                  <td></td> \n";
    $linha .= "                                                  <td></td> \n";
    $linha .= "                                              </tr> \n";
    $linha .= "                                             <?php \n";
    $linha .= "                                              }         \n";
    $linha .= "                       foreach(\$_SESSION['listFilter'] as \$campo) {  ?>  \n";
    $linha .= "                          <tr>  \n";
    $linha .= "                              <td><input type=\"checkbox\" name=\"id_" . ($nomeTabela[0]) . "[]\" value=\"<?= \$campo['id_" . ($nomeTabela[0]) . "'] ?>\" /></td>  \n";
    $linha .= "                              <td>";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $ex = explode("_", $nomeCampo['Field']);
        if ($ex[0] != "id" && $ex[0] != "fk" && $ex[0] != "data") {
            $linha .= "<?= \$campo['{$nomeCampo['Field']}'] ?>";
            break;
        }
    }
    $linha .= "</td>  \n";
    $linha .= "                              <td><div align=\"center\"><a href=\"#\" onclick=\"window.open('../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?id_" . ($nomeTabela[0]) . "=<?= \$campo['id_" . ($nomeTabela[0]) . "'] ?>&opcao=details', 'Detalhes', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=200, LEFT=300, WIDTH=670, HEIGHT=320')\"><img src=\"../../lib/images/zoom.png\" alt=\"\" title=\"\" border=\"0\" /></a></div></td>  \n";
    $linha .= "                              <td><div align=\"center\"><a href=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?id_" . ($nomeTabela[0]) . "=<?= \$campo['id_" . ($nomeTabela[0]) . "'] ?>&opcao=listPk \"><img src=\"../../lib/images/user_edit.png\" alt=\"\" title=\"\" border=\"0\" /></a></div></td>  \n";
    $linha .= "                              <td><div align=\"center\"><a href=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?id_" . ($nomeTabela[0]) . "=<?= \$campo['id_" . ($nomeTabela[0]) . "'] ?>&opcao=delete\" class=\"ask\"><img src=\"../../lib/images/trash.png\" alt=\"\" title=\"\" border=\"0\" /></a></div></td>  \n";
    $linha .= "                          </tr>  \n";
    $linha .= "                       <?php  } ?>  \n";
    $linha .= "                       </form>  \n";
    $linha .= "                       </tbody>  \n";
    $linha .= "                       </table>  \n";
    $linha .= "                       <p></p>  \n";
    $linha .= "                       <div align=\"right\">  \n";
    $linha .= "                          <a href=\"insert" . ucfirst($nomeTabela[0]) . ".view.php\"><img src=\"../../lib/images/bt-novo.png\" alt=\"\" title=\"\" border=\"0\" /></a>  \n";
    $linha .= "                          <a href=\"select" . ucfirst($nomeTabela[0]) . ".view.php\"><img src=\"../../lib/images/bt-pesquisar.png\" alt=\"\" title=\"\" border=\"0\" /></a>  \n";
    $linha .= "                          <a href=\"javascript:document.form.submit()\" class=\"ask\"><img src=\"../../lib/images/bt-excluir.png\" alt=\"\" title=\"\" border=\"0\" /></a>  \n";
    $linha .= "                       </div>  \n";
    $linha .= "                       <div class=\"pagination\">  \n";
    $linha .= "                       <?php    \n";
    $linha .= "                                  if(\$_SESSION['countAll'] > \$_SESSION['totalPorPg'])   \n";
    $linha .= "                                  {   \n";
    $linha .= "                                     if(\$_SESSION['countAll'][0]['total'] > \$_SESSION['totalPorPg'])   \n";
    $linha .= "                                     {   \n";
    $linha .= "                                         for(\$i=0; \$i < \$_SESSION['countAll'][0]['total'] / \$_SESSION['totalPorPg']; \$i++)   \n";
    $linha .= "                                         {  \n";
    $linha .= "                                             if(\$_SESSION['inicio'] == \$i*\$_SESSION['totalPorPg'])  \n";
    $linha .= "                                             {  \n";
    $linha .= "                                  ?>   \n";
    $linha .= "                                                   <span class=\"current\"><?= \$i+1 ?></span>  \n";
    $linha .= "                                  <?php    \n";
    $linha .= "                                             }  \n";
    $linha .= "                                             else  \n";
    $linha .= "                                             {  \n";
    $linha .= "                                  ?>   \n";
    $linha .= "                                                   <a href=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?inicio=<?= \$i ?>&opcao=listAll\"><?= \$i+1 ?></a>   \n";
    $linha .= "                                  <?php     \n";
    $linha .= "                                             }  \n";
    $linha .= "                                         }  \n";
    $linha .= "                                     }   \n";
    $linha .= "                                  }   \n";
    $linha .= "                                  else   \n";
    $linha .= "                                  {   \n";
    $linha .= "                                     if(\$_SESSION['countFilter'][0]['total'] > \$_SESSION['totalPorPg'])  \n";
    $linha .= "                                     {  \n";
    $linha .= "                                         for(\$i=0; \$i < \$_SESSION['countFilter'][0]['total'] / \$_SESSION['totalPorPg']; \$i++)   \n";
    $linha .= "                                         {                    \n";
    $linha .= "                                           if(\$_SESSION['inicio'] == \$i*\$_SESSION['totalPorPg'])  \n";
    $linha .= "                                             {  \n";
    $linha .= "                                  ?>  \n";
    $linha .= "                                                   <span class=\"current\"><?= \$i+1 ?></span>  \n";
    $linha .= "                                  <?php  \n";
    $linha .= "                                             }  \n";
    $linha .= "                                             else  \n";
    $linha .= "                                             {  \n";
    $linha .= "                                  ?>  \n";
    $linha .= "                                                   <a href=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?inicio=<?= \$i ?>&opcao=listFilter\"><?= \$i+1 ?></a>  \n";
    $linha .= "                                  <?php  \n";
    $linha .= "                                             }  \n";
    $linha .= "                                         }  \n";
    $linha .= "                                     }  \n";
    $linha .= "                                  }   \n";
    $linha .= "                                  ?>  \n";
    $linha .= "                       </div> \n";
    $linha .= "                   </div> <!-- end of right content--> \n";
    $linha .= "                </div>   <!--end of center content -->  \n";
    $linha .= "                <div class=\"clear\"></div>  \n";
    $linha .= "            </div> <!--end of main content-->  \n";
    $linha .= "            <div class=\"footer\">  \n";
    $linha .= "                <div class=\"left_footer\">RODAPE<a href=\"http://indeziner.com\"></a></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "        </div>  \n";
    $linha .= "    </body>  \n";
    $linha .= "</html>  \n";



    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);



    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/view/backend/insert" . ucfirst($nomeTabela[0]) . ".view.php";
    $linha = "<?php \n";
    $linha .= "/*  \n";
    $linha .= " * Inicia session  \n";
    $linha .= " * Descrição do arquivo  \n";
    $linha .= " * @author Marcelo Jaques  \n";
    $linha .= " * @version 1.0  \n";
    $linha .= " * @package views  \n";
    $linha .= " * @name view" . ucfirst($nomeTabela[0]) . " \n";
    $linha .= " */  \n";
    $linha .= "session_start();  \n";
    $linha .= "if(!\$_SESSION['login'])  \n";
    $linha .= "{  \n";
    $linha .= "  header(\"Location: ../../view/backend/erro.php\");  \n";
    $linha .= "  break;  \n";
    $linha .= "}  \n";

    $linha .= "/*  \n";
    $linha .= "* Função autoload, carrega as classes automáticamente  \n";
    $linha .= "*/  \n";
    $linha .= "function __autoload(\$classe)  \n";
    $linha .= "{  \n";
    $linha .= "    include_once \"../../model/{\$classe}.class.php\";  \n";
    $linha .= "}  \n";
    $linha .= "?>  \n";

    $linha .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">  \n";
    $linha .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">  \n";
    $linha .= "    <head>  \n";
    $linha .= "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />  \n";
    $linha .= "        <title>IN ADMIN PANEL | Powered by INDEZINER</title>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/dhtmlgoodies_calendar.js\"></script>  \n";
    $linha .= "        <link rel=\"stylesheet\" type=\"text/css\" href=\"../../lib/css/style.css\" />  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockp.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockh.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jquery.min.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/ddaccordion.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            ddaccordion.init({  \n";
    $linha .= "                headerclass: \"submenuheader\", //Shared CSS class name of headers group  \n";
    $linha .= "                contentclass: \"submenu\", //Shared CSS class name of contents group  \n";
    $linha .= "                revealtype: \"click\", //Reveal content when user clicks or onmouseover the header? Valid value: \"click\", \"clickgo\", or \"mouseover\"  \n";
    $linha .= "                mouseoverdelay: 200, //if revealtype=\"mouseover\", set delay in milliseconds before header expands onMouseover  \n";
    $linha .= "                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false  \n";
    $linha .= "                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content  \n";
    $linha .= "                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)  \n";
    $linha .= "                animatedefault: false, //Should contents open by default be animated into view?  \n";
    $linha .= "                persiststate: true, //persist state of opened contents within browser session?  \n";
    $linha .= "                toggleclass: [\"\", \"\"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively [\"class1\", \"class2\"]  \n";
    $linha .= "                togglehtml: [\"suffix\", \"<img src='../../lib/images/plus.gif' class='statusicon' />\", \"<img src='../../lib/images/minus.gif' class='statusicon' />\"], //Additional HTML added to the header when it's collapsed and expanded, respectively  [\"position\", \"html1\", \"html2\"] (see docs)  \n";
    $linha .= "                animatespeed: \"fast\", //speed of animation: integer in milliseconds (ie: 200), or keywords \"fast\", \"normal\", or \"slow\"  \n";
    $linha .= "                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                },  \n";
    $linha .= "                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                }  \n";
    $linha .= "            })  \n";
    $linha .= "        </script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jconfirmaction.jquery.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            $(document).ready(function() {  \n";
    $linha .= "                $('.ask').jConfirmAction();  \n";
    $linha .= "            });  \n";
    $linha .= "        </script>  \n";
    $linha .= "       <script language=\"javascript\" type=\"text/javascript\" src=\"../../lib/js/niceforms.js\"></script>  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"../../lib/css/niceforms-default.css\" />  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"../../lib/css/dhtmlgoodies_calendar.css\"></link> \n";
    $linha .= "    </head>  \n";
    $linha .= "    <body>  \n";
    $linha .= "        <div id=\"main_container\">  \n";
    $linha .= "            <div class=\"header\">  \n";
    $linha .= "                <div class=\"logo\"><a href=\"#\"><img src=\"../../lib/images/logo.gif\" alt=\"\" title=\"\" border=\"0\" /></a></div>  \n";
    $linha .= "                <div class=\"right_header\">Bem Vindo, <?= \$_SESSION['login']->nome ?> | <a href=\"../../controller/LoginController.php?opcao=logout\" class=\"logout\">Logout</a></div>  \n";
    $linha .= "               <div id=\"clock_a\"></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "            <div class=\"main_content\">   \n";
    $linha .= "                <div class=\"menu\">   \n";
    $linha .= "                    <ul>   \n";
    $linha .= "                        <li>   \n";
    $linha .= "                            <h2>Incluir  " . ucfirst($nomeTabela[0]) . "</h2>   \n";
    $linha .= "                        </li>   \n";
    $linha .= "                    </ul>   \n";
    $linha .= "                </div>   \n";
    $linha .= "                <div class=\"center_content\">   \n";
    $linha .= "                    <div class=\"left_content\">   \n";
    $linha .= "                    <?php \$Menu = new Menu(); ?>    \n";
    $linha .= "                    </div>   \n";
    $linha .= "                    <div class=\"right_content\">   \n";
    $linha .= "                        <div class=\"form\">   \n";
    $linha .= "                            <form action=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php\" method=\"post\" class=\"niceform\" enctype=\"multipart/form-data\">   \n";
    $linha .= "                                <fieldset>   \n";
    $linha .= "                                    <input type=\"hidden\" name=\"opcao\" value=\"insert\" />   \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $ex = explode("_", $nomeCampo['Field']);
        switch ($ex[0]) {
            case "id":
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt></dt>   \n";
                $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" value=\"\" /></dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
            case "fk":

                if ($nomeCampo[0] == "fk_id_usuario") {
                    $linha .= "                                    <dl>   \n";
                    $linha .= "                                        <dt></dt>   \n";
                    $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" value=\"<?= \$_SESSION['login']->id_usuario ?>\"/></dd>   \n";
                    $linha .= "                                    </dl>   \n";
                } else {
                    $linha .= "                                    <dl>   \n";
                    $linha .= "                                        <dt></dt>   \n";
                    $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" value=\"<?= \$_SESSION['login']->{$nomeCampo['Field']} ?>\"/></dd>   \n";
                    $linha .= "                                    </dl>   \n";
                }

                break;
            case "arquivo":
                $linha .= "                                    <dl>    \n";
                $linha .= "                                         <dt><label for=\"{$nomeCampo['Field']}\">Arquivo_arquivo:</label></dt>    \n";
                $linha .= "                                         <dd><input type=\"file\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" /></dd>    \n";
                $linha .= "                                    </dl>    \n";
                break;
            case "data":
                $linha .= "                                    <dl>     \n";
                $linha .= "                                         <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>     \n";
                $linha .= "                                         <dd><input name=\"{$nomeCampo['Field']}\" type='text'  id=\"{$nomeCampo['Field']}\" value=''/><input name='button' class='botaocalendario'  type='button' onclick=\"displayCalendar(document.forms[0].{$nomeCampo['Field']},'dd/mm/yyyy',this) \"  value='Calendário'/></dd>     \n";
                $linha .= "                                    </dl>     \n";
                break;
            case "texto":
                $linha .= "                                    <dl>      \n";
                $linha .= "                                    <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>      \n";
                $linha .= "                                    <dd><textarea name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" rows=\"6\" cols=\"41\"></textarea></dd>      \n";
                $linha .= "                                    </dl>      \n";
                break;
            default:
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>   \n";
                $linha .= "                                        <dd><input type=\"text\" name=\"{$nomeCampo['Field']}\" size=\"40\" />   \n";
                $linha .= "                                        </dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
        }
    }
    $linha .= "                                <dl class=\"submit\">    \n";
    $linha .= "                                <dt><label></label></dt>    \n";
    $linha .= "                                <dd>    \n";
    $linha .= "                                <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Salvar\" />    \n";
    $linha .= "                                </dd>    \n";
    $linha .= "                                </dl>    \n";
    $linha .= "                                </fieldset>   \n";
    $linha .= "                            </form>   \n";
    $linha .= "                        </div>   \n";
    $linha .= "                    </div><!-- end of right content-->   \n";
    $linha .= "                </div>   <!--end of center content -->   \n";
    $linha .= "                <div class=\"clear\"></div>   \n";
    $linha .= "            </div> <!--end of main content-->   \n";
    $linha .= "            <div class=\"footer\">  \n";
    $linha .= "                <div class=\"left_footer\">RODAPE<a href=\"http://indeziner.com\"></a></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "        </div>  \n";
    $linha .= "    </body>  \n";
    $linha .= "</html>  \n";

    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);





    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/view/backend/select" . ucfirst($nomeTabela[0]) . ".view.php";
    $linha = "<?php \n";
    $linha .= "/*  \n";
    $linha .= " * Inicia session  \n";
    $linha .= " * Descrição do arquivo  \n";
    $linha .= " * @author Marcelo Jaques  \n";
    $linha .= " * @version 1.0  \n";
    $linha .= " * @package views  \n";
    $linha .= " * @name view" . ucfirst($nomeTabela[0]) . " \n";
    $linha .= " */  \n";
    $linha .= "session_start();  \n";
    $linha .= "if(!\$_SESSION['login'])  \n";
    $linha .= "{  \n";
    $linha .= "  header(\"Location: ../../view/backend/erro.php\");  \n";
    $linha .= "  break;  \n";
    $linha .= "}  \n";

    $linha .= "/*  \n";
    $linha .= "* Função autoload, carrega as classes automáticamente  \n";
    $linha .= "*/  \n";
    $linha .= "function __autoload(\$classe)  \n";
    $linha .= "{  \n";
    $linha .= "    include_once \"../../model/{\$classe}.class.php\";  \n";
    $linha .= "}  \n";
    $linha .= "?>  \n";

    $linha .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">  \n";
    $linha .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">  \n";
    $linha .= "    <head>  \n";
       $linha .= "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />  \n";
    $linha .= "        <title>IN ADMIN PANEL | Powered by INDEZINER</title>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/dhtmlgoodies_calendar.js\"></script>  \n";
    $linha .= "        <link rel=\"stylesheet\" type=\"text/css\" href=\"../../lib/css/style.css\" />  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockp.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockh.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jquery.min.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/ddaccordion.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            ddaccordion.init({  \n";
    $linha .= "                headerclass: \"submenuheader\", //Shared CSS class name of headers group  \n";
    $linha .= "                contentclass: \"submenu\", //Shared CSS class name of contents group  \n";
    $linha .= "                revealtype: \"click\", //Reveal content when user clicks or onmouseover the header? Valid value: \"click\", \"clickgo\", or \"mouseover\"  \n";
    $linha .= "                mouseoverdelay: 200, //if revealtype=\"mouseover\", set delay in milliseconds before header expands onMouseover  \n";
    $linha .= "                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false  \n";
    $linha .= "                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content  \n";
    $linha .= "                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)  \n";
    $linha .= "                animatedefault: false, //Should contents open by default be animated into view?  \n";
    $linha .= "                persiststate: true, //persist state of opened contents within browser session?  \n";
    $linha .= "                toggleclass: [\"\", \"\"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively [\"class1\", \"class2\"]  \n";
    $linha .= "                togglehtml: [\"suffix\", \"<img src='../../lib/images/plus.gif' class='statusicon' />\", \"<img src='../../lib/images/minus.gif' class='statusicon' />\"], //Additional HTML added to the header when it's collapsed and expanded, respectively  [\"position\", \"html1\", \"html2\"] (see docs)  \n";
    $linha .= "                animatespeed: \"fast\", //speed of animation: integer in milliseconds (ie: 200), or keywords \"fast\", \"normal\", or \"slow\"  \n";
    $linha .= "                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                },  \n";
    $linha .= "                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                }  \n";
    $linha .= "            })  \n";
    $linha .= "        </script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jconfirmaction.jquery.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            $(document).ready(function() {  \n";
    $linha .= "                $('.ask').jConfirmAction();  \n";
    $linha .= "            });  \n";
    $linha .= "        </script>  \n";
    $linha .= "       <script language=\"javascript\" type=\"text/javascript\" src=\"../../lib/js/niceforms.js\"></script>  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"../../lib/css/niceforms-default.css\" />  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"../../lib/css/dhtmlgoodies_calendar.css\"></link> \n";
    $linha .= "    </head>  \n";
    $linha .= "    <body>  \n";
    $linha .= "        <div id=\"main_container\">  \n";
    $linha .= "            <div class=\"header\">  \n";
    $linha .= "                <div class=\"logo\"><a href=\"#\"><img src=\"../../lib/images/logo.gif\" alt=\"\" title=\"\" border=\"0\" /></a></div>  \n";
    $linha .= "                <div class=\"right_header\">Bem Vindo, <?= \$_SESSION['login']->nome ?> | <a href=\"../../controller/LoginController.php?opcao=logout\" class=\"logout\">Logout</a></div>  \n";
    $linha .= "               <div id=\"clock_a\"></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "            <div class=\"main_content\">   \n";
    $linha .= "                <div class=\"menu\">   \n";
    $linha .= "                    <ul>   \n";
    $linha .= "                        <li>   \n";
    $linha .= "                            <h2>Pesquisar " . ucfirst($nomeTabela[0]) . "</h2>   \n";
    $linha .= "                        </li>   \n";
    $linha .= "                    </ul>   \n";
    $linha .= "                </div>   \n";
    $linha .= "                <div class=\"center_content\">   \n";
    $linha .= "                    <div class=\"left_content\">   \n";
    $linha .= "                    <?php \$Menu = new Menu(); ?>    \n";
    $linha .= "                    </div>   \n";
    $linha .= "                    <div class=\"right_content\">   \n";
    $linha .= "                        <div class=\"form\">   \n";
    $linha .= "                            <form action=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php\" method=\"post\" class=\"niceform\" enctype=\"multipart/form-data\">   \n";
    $linha .= "                                <fieldset>   \n";
    $linha .= "                                    <input type=\"hidden\" name=\"opcao\" value=\"listFilter\" />   \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $ex = explode("_", $nomeCampo['Field']);
        switch ($ex[0]) {
            case "id":
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt></dt>   \n";
                $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}P\" id=\"{$nomeCampo['Field']}P\" value=\"\" /></dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
            case "fk":
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt></dt>   \n";
                $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}P\" id=\"{$nomeCampo['Field']}P\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\"/></dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
            case "arquivo":
                $linha .= "                                    <dl>    \n";
                $linha .= "                                         <dt><label for=\"{$nomeCampo['Field']}\">Arquivo_arquivo:</label></dt>    \n";
                $linha .= "                                         <dd><input type=\"file\" name=\"{$nomeCampo['Field']}P\" id=\"{$nomeCampo['Field']}P\" /></dd>    \n";
                $linha .= "                                    </dl>    \n";
                break;
            case "data":
                $linha .= "                                    <dl>     \n";
                $linha .= "                                         <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>     \n";
                $linha .= "                                         <dd><input name=\"{$nomeCampo['Field']}P\" type='text'  id=\"{$nomeCampo['Field']}P\" value=''/><input name='button' class='botaocalendario'  type='button' onclick=\"displayCalendar(document.forms[0].{$nomeCampo['Field']}P,'dd/mm/yyyy',this) \"  value='Calendário'/></dd>     \n";
                $linha .= "                                    </dl>     \n";
                break;
            case "texto":
                $linha .= "                                    <dl>      \n";
                $linha .= "                                    <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>      \n";
                $linha .= "                                    <dd><textarea name=\"{$nomeCampo['Field']}P\" id=\"{$nomeCampo['Field']}P\" rows=\"6\" cols=\"41\"></textarea></dd>      \n";
                $linha .= "                                    </dl>      \n";
                break;
            default:
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>   \n";
                $linha .= "                                        <dd><input type=\"text\" name=\"{$nomeCampo['Field']}P\" size=\"40\" />   \n";
                $linha .= "                                        </dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
        }
    }
    $linha .= "                                <dl class=\"submit\">    \n";
    $linha .= "                                <dt><label></label></dt>    \n";
    $linha .= "                                <dd>    \n";
    $linha .= "                                <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Pesquisar\" />    \n";
    $linha .= "                                </dd>    \n";
    $linha .= "                                </dl>    \n";
    $linha .= "                                </fieldset>   \n";
    $linha .= "                            </form>   \n";
    $linha .= "                        </div>   \n";
    $linha .= "                    </div><!-- end of right content-->   \n";
    $linha .= "                </div>   <!--end of center content -->   \n";
    $linha .= "                <div class=\"clear\"></div>   \n";
    $linha .= "            </div> <!--end of main content-->   \n";
    $linha .= "            <div class=\"footer\">  \n";
    $linha .= "                <div class=\"left_footer\">RODAPE<a href=\"http://indeziner.com\"></a></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "        </div>  \n";
    $linha .= "    </body>  \n";
    $linha .= "</html>  \n";



    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);


    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/view/backend/update" . ucfirst($nomeTabela[0]) . ".view.php";
    $linha = "<?php \n";
    $linha .= "/*  \n";
    $linha .= " * Inicia session  \n";
    $linha .= " * Descrição do arquivo  \n";
    $linha .= " * @author Marcelo Jaques  \n";
    $linha .= " * @version 1.0  \n";
    $linha .= " * @package views  \n";
    $linha .= " * @name update" . ucfirst($nomeTabela[0]) . " \n";
    $linha .= " */  \n";
    $linha .= "session_start();  \n";
    $linha .= "if(!\$_SESSION['login'])  \n";
    $linha .= "{  \n";
    $linha .= "  header(\"Location: ../../view/backend/erro.php\");  \n";
    $linha .= "  break;  \n";
    $linha .= "}  \n";

    $linha .= "/*  \n";
    $linha .= "* Função autoload, carrega as classes automáticamente  \n";
    $linha .= "*/  \n";
    $linha .= "function __autoload(\$classe)  \n";
    $linha .= "{  \n";
    $linha .= "    include_once \"../../model/{\$classe}.class.php\";  \n";
    $linha .= "}  \n";
    $linha .= "?>  \n";

    $linha .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">  \n";
    $linha .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">  \n";
    $linha .= "    <head>  \n";
    $linha .= "        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />  \n";
    $linha .= "        <title>IN ADMIN PANEL | Powered by INDEZINER</title>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/dhtmlgoodies_calendar.js\"></script>  \n";
    $linha .= "        <link rel=\"stylesheet\" type=\"text/css\" href=\"../../lib/css/style.css\" />  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockp.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/clockh.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jquery.min.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/ddaccordion.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            ddaccordion.init({  \n";
    $linha .= "                headerclass: \"submenuheader\", //Shared CSS class name of headers group  \n";
    $linha .= "                contentclass: \"submenu\", //Shared CSS class name of contents group  \n";
    $linha .= "                revealtype: \"click\", //Reveal content when user clicks or onmouseover the header? Valid value: \"click\", \"clickgo\", or \"mouseover\"  \n";
    $linha .= "                mouseoverdelay: 200, //if revealtype=\"mouseover\", set delay in milliseconds before header expands onMouseover  \n";
    $linha .= "                collapseprev: true, //Collapse previous content (so only one open at any time)? true/false  \n";
    $linha .= "                defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content  \n";
    $linha .= "                onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)  \n";
    $linha .= "                animatedefault: false, //Should contents open by default be animated into view?  \n";
    $linha .= "                persiststate: true, //persist state of opened contents within browser session?  \n";
    $linha .= "                toggleclass: [\"\", \"\"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively [\"class1\", \"class2\"]  \n";
    $linha .= "                togglehtml: [\"suffix\", \"<img src='../../lib/images/plus.gif' class='statusicon' />\", \"<img src='../../lib/images/minus.gif' class='statusicon' />\"], //Additional HTML added to the header when it's collapsed and expanded, respectively  [\"position\", \"html1\", \"html2\"] (see docs)  \n";
    $linha .= "                animatespeed: \"fast\", //speed of animation: integer in milliseconds (ie: 200), or keywords \"fast\", \"normal\", or \"slow\"  \n";
    $linha .= "                oninit:function(headers, expandedindices){ //custom code to run when headers have initalized  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                },  \n";
    $linha .= "                onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed  \n";
    $linha .= "                    //do nothing  \n";
    $linha .= "                }  \n";
    $linha .= "            })  \n";
    $linha .= "        </script>  \n";
    $linha .= "        <script type=\"text/javascript\" src=\"../../lib/js/jconfirmaction.jquery.js\"></script>  \n";
    $linha .= "        <script type=\"text/javascript\">  \n";
    $linha .= "            $(document).ready(function() {  \n";
    $linha .= "                $('.ask').jConfirmAction();  \n";
    $linha .= "            });  \n";
    $linha .= "        </script>  \n";
    $linha .= "       <script language=\"javascript\" type=\"text/javascript\" src=\"../../lib/js/niceforms.js\"></script>  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"../../lib/css/niceforms-default.css\" />  \n";
    $linha .= "       <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"../../lib/css/dhtmlgoodies_calendar.css\"></link> \n";
    $linha .= "    </head>  \n";
    $linha .= "    <body>  \n";
    $linha .= "        <div id=\"main_container\">  \n";
    $linha .= "            <div class=\"header\">  \n";
    $linha .= "                <div class=\"logo\"><a href=\"#\"><img src=\"../../lib/images/logo.gif\" alt=\"\" title=\"\" border=\"0\" /></a></div>  \n";
    $linha .= "                <div class=\"right_header\">Bem Vindo, <?= \$_SESSION['login']->nome ?> | <a href=\"../../controller/LoginController.php?opcao=logout\" class=\"logout\">Logout</a></div>  \n";
    $linha .= "               <div id=\"clock_a\"></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "            <div class=\"main_content\">   \n";
    $linha .= "                <div class=\"menu\">   \n";
    $linha .= "                    <ul>   \n";
    $linha .= "                        <li>   \n";
    $linha .= "                            <h2>Alterar  " . ucfirst($nomeTabela[0]) . "</h2>   \n";
    $linha .= "                        </li>   \n";
    $linha .= "                    </ul>   \n";
    $linha .= "                </div>   \n";
    $linha .= "                <div class=\"center_content\">   \n";
    $linha .= "                    <div class=\"left_content\">   \n";
    $linha .= "                    <?php \$Menu = new Menu(); ?>    \n";
    $linha .= "                    </div>   \n";
    $linha .= "                    <div class=\"right_content\">   \n";
    $linha .= "                        <div class=\"form\">   \n";
    $linha .= "                            <form action=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php\" method=\"post\" class=\"niceform\" enctype=\"multipart/form-data\">   \n";
    $linha .= "                                <fieldset>   \n";
    $linha .= "                                    <input type=\"hidden\" name=\"opcao\" value=\"update\" />   \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $ex = explode("_", $nomeCampo['Field']);
        switch ($ex[0]) {
            case "id":
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt></dt>   \n";
                $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\" /></dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
            case "fk":

                if ($nomeCampo[0] == "fk_id_usuario") {
                    $linha .= "                                    <dl>   \n";
                    $linha .= "                                        <dt></dt>   \n";
                    $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" value=\"<?= \$_SESSION['login']->id_usuario ?>\"/></dd>   \n";
                    $linha .= "                                    </dl>   \n";
                } else {
                    $linha .= "                                    <dl>   \n";
                    $linha .= "                                        <dt></dt>   \n";
                    $linha .= "                                        <dd><input type=\"hidden\" name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\"/></dd>   \n";
                    $linha .= "                                    </dl>   \n";
                }

                break;
            case "arquivo":               
                $linha .= "                                    <dl>    \n";

                $linha .= "                                         <?php    \n";
                $linha .= "                                                              if(\$_SESSION['listPk']->{$nomeCampo['Field']});    \n";
                $linha .= "                                                              {   \n";
                $linha .= "                                                                   \$filetype = pathinfo(\"../../upload/\".\$_SESSION['listPk']->{$nomeCampo['Field']});   \n";
                $linha .= "                                                                   if(strtoupper(\$filetype['extension']) == \"JPG\" || strtoupper(\$filetype['extension']) == \"JPEG\" || strtoupper(\$filetype['extension']) == \"GIF\" || strtoupper(\$filetype['extension']) == \"PNG\" || strtoupper(\$filetype['extension']) == \"BMP\")   \n";
                $linha .= "                                                                   {    \n";
                $linha .= "                                                              ?>    \n";
                $linha .= "                                                                   <dl>    \n";
                $linha .= "                                                                       <dt><label for=\"{$nomeCampo['Field']}\">Arquivo:</label></dt>    \n";
                $linha .= "                                                                       <dd> <img width=\"310\" src=\"../../upload/<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\"></dd>   \n";
                $linha .= "                                                                   </dl>    \n";
                $linha .= "                                                                   <dl>    \n";
                 $linha .= "                                                                        <dt><input type=\"hidden\" name=\"{$nomeCampo['Field']}Old\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\" /></dt>   \n";
                $linha .= "                                                                       <dd><a href=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?id_{$nomeTabela[0]}=<?= \$_SESSION['listPk']->id_{$nomeTabela[0]} ?>&opcao=deleteArquivo\" class=\"ask\"><img src=\"../../lib/images/trash.png\" alt=\"\" title=\"\" border=\"0\" /></a> Excluir Arquivo</dd>   \n";
                $linha .= "                                                                   </dl>    \n";
                $linha .= "                                                              <?php    \n";
                $linha .= "                                                                   }    \n";
                $linha .= "                                                                   else    \n";
                $linha .= "                                                                   {    \n";
                $linha .= "                                                              ?>    \n";
                $linha .= "                                                                   <dl>    \n";
                $linha .= "                                                                       <dt><label for=\"arquivo_arquivo\">Arquivo:</label></dt>    \n";
                $linha .= "                                                                       <dd> <?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?></dd>   \n";
                $linha .= "                                                                   </dl>    \n";
                $linha .= "                                                                   <dl>    \n";
                $linha .= "                                                                        <dt><input type=\"hidden\" name=\"{$nomeCampo['Field']}Old\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\" /></dt>   \n";
                $linha .= "                                                                       <dd><a href=\"../../controller/" . ucfirst($nomeTabela[0]) . ".controller.php?id_{$nomeTabela[0]}=<?= \$_SESSION['listPk']->id_{$nomeTabela[0]} ?>&opcao=deleteArquivo\" class=\"ask\"><img src=\"../../lib/images/trash.png\" alt=\"\" title=\"\" border=\"0\" /></a> Excluir Arquivo</dd>   \n";
                $linha .= "                                                                   </dl>    \n";
                $linha .= "                                                              <?php    \n";
                $linha .= "                                                                   }    \n";
                $linha .= "                                                              }   \n";
                $linha .= "                                                              ?>    \n";
                 $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>   \n";
                $linha .= "                                        <dd><input type=\"file\" name=\"{$nomeCampo['Field']}\" size=\"40\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\"/>   \n";
                $linha .= "                                        </dd>   \n";
                $linha .= "                                    </dl>   \n";

                $linha .= "                                    </dl>    \n";
                break;
            case "data":
                $linha .= "                                    <dl>     \n";
                $linha .= "                                         <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>     \n";
                $linha .= "                                         <dd><input name=\"{$nomeCampo['Field']}\" type='text'  id=\"{$nomeCampo['Field']}\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\"/><input name='button' class='botaocalendario'  type='button' onclick=\"displayCalendar(document.forms[0].{$nomeCampo['Field']},'dd/mm/yyyy',this) \"  value='Calendário'/></dd>     \n";
                $linha .= "                                    </dl>     \n";
                break;
            case "texto":
                $linha .= "                                    <dl>      \n";
                $linha .= "                                    <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>      \n";
                $linha .= "                                    <dd><textarea name=\"{$nomeCampo['Field']}\" id=\"{$nomeCampo['Field']}\" rows=\"6\" cols=\"41\"><?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?></textarea></dd>      \n";
                $linha .= "                                    </dl>      \n";
                break;
            default:
                $linha .= "                                    <dl>   \n";
                $linha .= "                                        <dt><label for=\"{$nomeCampo['Field']}\">{$nomeCampo['Field']}:</label></dt>   \n";
                $linha .= "                                        <dd><input type=\"text\" name=\"{$nomeCampo['Field']}\" size=\"40\" value=\"<?= \$_SESSION['listPk']->{$nomeCampo['Field']} ?>\"/>   \n";
                $linha .= "                                        </dd>   \n";
                $linha .= "                                    </dl>   \n";
                break;
        }
    }
    $linha .= "                                <dl class=\"submit\">    \n";
    $linha .= "                                <dt><label></label></dt>    \n";
    $linha .= "                                <dd>    \n";
    $linha .= "                                <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Salvar\" />    \n";
    $linha .= "                                </dd>    \n";
    $linha .= "                                </dl>    \n";
    $linha .= "                                </fieldset>   \n";
    $linha .= "                            </form>   \n";
    $linha .= "                        </div>   \n";
    $linha .= "                    </div><!-- end of right content-->   \n";
    $linha .= "                </div>   <!--end of center content -->   \n";
    $linha .= "                <div class=\"clear\"></div>   \n";
    $linha .= "            </div> <!--end of main content-->   \n";
    $linha .= "            <div class=\"footer\">  \n";
    $linha .= "                <div class=\"left_footer\">RODAPE<a href=\"http://indeziner.com\"></a></div>  \n";
    $linha .= "            </div>  \n";
    $linha .= "        </div>  \n";
    $linha .= "    </body>  \n";
    $linha .= "</html>  \n";

    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);


    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/view/backend/details" . ucfirst($nomeTabela[0]) . ".view.php";

    $linha = "<?php   \n";
    $linha .= "/*   \n";
    $linha .= " * Inicia session   \n";
    $linha .= " * Descrição do arquivo   \n";
    $linha .= " * @author Marcelo Jaques   \n";
    $linha .= " * @version 1.0   \n";
    $linha .= " * @package views   \n";
    $linha .= " * @name viewEvento  \n";
    $linha .= " */   \n";
    $linha .= "session_start();   \n";
    $linha .= "if(!\$_SESSION['login'])   \n";
    $linha .= "{   \n";
    $linha .= "  header(\"Location: ../../view/backend/erro.html\");   \n";
    $linha .= "  break;   \n";
    $linha .= "}   \n";

    $linha .= "/*   \n";
    $linha .= "* Função autoload, carrega as classes automáticamente   \n";
    $linha .= "*/   \n";
    $linha .= "function __autoload(\$classe)   \n";
    $linha .= "{   \n";
    $linha .= "    include_once \"../../model/{\$classe}.class.php\";   \n";
    $linha .= "}   \n";
    $linha .= "?>   \n";

    $linha .= "<!DOCTYPE html PUBLIC " - //W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">   \n";
    $linha .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">  \n";
    $linha .= "<head>  \n";
    $linha .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />  \n";
    $linha .= "<title>IN ADMIN PANEL | Powered by INDEZINER</title>  \n";
    $linha .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"../../lib/css/style.css\" />  \n";
    $linha .= "<script type=\"text/javascript\" src=\"../../lib/js/jquery.min.js\"></script>  \n";
    $linha .= "<script type=\"text/javascript\" src=\"../../lib/js/ddaccordion.js\"></script>  \n";
    $linha .= "<script type=\"text/javascript\" src=\"../../lib/js/jconfirmaction.jquery.js\"></script>  \n";
    $linha .= "<script language=\"javascript\" type=\"text/javascript\" src=\"../../lib/js/niceforms.js\"></script>  \n";
    $linha .= "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"../../lib/css/niceforms-default.css\" />  \n";
    $linha .= "</head>  \n";
    $linha .= "<body>  \n";
    $linha .= "<p class=\"detail\">   \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "   {$nomeCampo[0]}: <?= \$_SESSION['listPk']->{$nomeCampo[0]} ?><br />   \n";
    }
    $linha .= "</p>   \n";
    $linha .= "</body>  \n";
    $linha .= "</html>  \n";


    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);
}

