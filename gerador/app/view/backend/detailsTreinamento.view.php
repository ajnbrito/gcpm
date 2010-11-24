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
   id_treinamento: <?= $_SESSION['listPk']->id_treinamento ?><br />   
   fk_id_usuario: <?= $_SESSION['listPk']->fk_id_usuario ?><br />   
   nome: <?= $_SESSION['listPk']->nome ?><br />   
   texto_sobre: <?= $_SESSION['listPk']->texto_sobre ?><br />   
   texto_publico_alvo: <?= $_SESSION['listPk']->texto_publico_alvo ?><br />   
   texto_conteudo: <?= $_SESSION['listPk']->texto_conteudo ?><br />   
   texto_instrutor: <?= $_SESSION['listPk']->texto_instrutor ?><br />   
   numero_vagas: <?= $_SESSION['listPk']->numero_vagas ?><br />   
   texto_locais: <?= $_SESSION['listPk']->texto_locais ?><br />   
   texto_proximas_turmas: <?= $_SESSION['listPk']->texto_proximas_turmas ?><br />   
   texto_incompany: <?= $_SESSION['listPk']->texto_incompany ?><br />   
   texto_informacoes: <?= $_SESSION['listPk']->texto_informacoes ?><br />   
</p>   
</body>  
</html>  
