<?php   
/*   
 * Inicia session   
 * Descrição do arquivo   
 * @author Marcelo Jaques   
 * @version 1.0   
 * @package views   
 * @name viewEvento  
 */   
session_start();   
if(!$_SESSION['login'])   
{   
  header("Location: ../../view/backend/erro.html");   
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
<html xmlns="http://www.w3.org/1999/xhtml">  
0<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>IN ADMIN PANEL | Powered by INDEZINER</title>  
<link rel="stylesheet" type="text/css" href="../../lib/css/style.css" />  
<script type="text/javascript" src="../../lib/js/jquery.min.js"></script>  
<script type="text/javascript" src="../../lib/js/ddaccordion.js"></script>  
<script type="text/javascript" src="../../lib/js/jconfirmaction.jquery.js"></script>  
<script language="javascript" type="text/javascript" src="../../lib/js/niceforms.js"></script>  
<link rel="stylesheet" type="text/css" media="all" href="../../lib/css/niceforms-default.css" />  
</head>  
<body>  
<p class="detail">   
   id_parceiro: <?= $_SESSION['listPk']->id_parceiro ?><br />   
   fk_id_usuario: <?= $_SESSION['listPk']->fk_id_usuario ?><br />   
   nome: <?= $_SESSION['listPk']->nome ?><br />   
   texto_descricao: <?= $_SESSION['listPk']->texto_descricao ?><br />   
   link: <?= $_SESSION['listPk']->link ?><br />   
   arquivo_logo: <?= $_SESSION['listPk']->arquivo_logo ?><br />   
</p>   
</body>  
</html>  
