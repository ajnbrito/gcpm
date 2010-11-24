<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package controller 
 * @name {$nomeTabela[0]} 
 */ 

include_once "../model/EmpresaDAO.class.php"; 

class EmpresaController 
{
/** 
* @method __construct 
*/ 
function __construct() 
{ 
  /** 
   * inicia session 
   */ 
   session_start(); 
  /** 
   * recebe option vinda dos formulários 
   */ 
   $option = $_POST['opcao']; 
   if(!isset($option)) $option = $_GET['opcao']; 
  /** 
   * definição das options 
   */ 
   switch($option) 
   { 
      /** 
       * caso insert 
      */ 
      case 'insert': 
       { 
         /** 
          * Instancia objeto DAO 
           */ 
           $model = new EmpresaDAO(); 
          /** 
           * Setar valores do objeto com valores vindo do form insert 
           */ 
           $model->setId_empresa($_POST['id_empresa']); 
           $model->setFk_id_usuario($_POST['fk_id_usuario']); 
           $model->setTitulo($_POST['titulo']); 
           $model->setTexto_texto($_POST['texto_texto']); 
           $model->setArquivo_arquivo($_FILES['arquivo_arquivo']['name']); 
         /** 
          * Tenta incluir 
          */ 
          if($model->insert()) 
          { 
             /** 
             * Incluído com sucesso 
             */ 
                /** 
                 * Faz upload do arquivo  
                 */ 
                 move_uploaded_file($_FILES['arquivo_arquivo']['tmp_name'], "../upload/" . $model->getArquivo_arquivo());   
            /** 
            * Seta valores com parametros da pesquisa, se houver 
            */ 
           $model->setId_empresa($_SESSION['Pid_empresa']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setTitulo($_SESSION['Ptitulo']); 
           $model->setTexto_texto($_SESSION['Ptexto_texto']); 
           $model->setArquivo_arquivo($_SESSION['Parquivo_arquivo']); 
           /** 
            * Define o total de resultados por página 
           */ 
            $_SESSION['totalPorPg'] = 10; 
           /** 
            * Define ou atualiza a página de início 
           */ 
           if($_GET['inicio']) $_SESSION['inicio'] = $_GET['inicio'] * $_SESSION['totalPorPg']; 
         /** 
           * Zerar countAll 
           */ 
           $_SESSION['countAll'] = ""; 
          /** 
           * Total de resultados relativos a pesquisa 
           */ 
           $_SESSION['countFilter'] = $model->countFilter(); 
          /** 
           * Busca resultados da página atual 
            */ 
            $_SESSION['listFilter'] = $model->listFilter(); 
           /** 
            * Redireciona para view correspondente 
           */ 
            header("Location: ../view/backend/listEmpresa.view.php"); 
        } 
        else 
        { 
            /** 
            * Erro, não foi possível incluir o registro 
            */ 
            header("Location: ../view/backend/erro.php"); 
       } 
       break; 
   } 
  /** 
    * caso delete 
    */ 
   case 'delete': 
   { 
      /** 
       * Instancia objeto DAO 
       */ 
      $model = new EmpresaDAO(); 
     /** 
     * Define o id do registro para deletar 
     */ 
     $model->setId_empresa($_GET['id_empresa']); 
    /** 
     * Seleciona arquivos para excluir 
      */ 
      $obj = $model->listPk(); 
     /** 
      * Tenta deletar 
     */ 
     if($model->delete()) 
      { 
            unlink("../upload/".$obj->arquivo_arquivo); 
         /** 
          * Registro deletado 
          * Seta valores com parametros da pesquisa, se houver 
          */ 
           $model->setId_empresa($_SESSION['Pid_empresa']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setTitulo($_SESSION['Ptitulo']); 
           $model->setTexto_texto($_SESSION['Ptexto_texto']); 
           $model->setArquivo_arquivo($_SESSION['Parquivo_arquivo']); 
        /** 
         * Define total de registros por página 
         */ 
       $_SESSION['totalPorPg'] = 10; 
        /** 
         * Define ou atualiza a página de inicio 
         */ 
        if($_GET['inicio']) $_SESSION['inicio'] = $_GET['inicio'] * $_SESSION['totalPorPg']; 
        /** 
         * Zera countAll 
         */ 
        $_SESSION['countAll'] = ""; 
        /** 
         * Total de resultados relativos a pesquisa 
        */ 
      $_SESSION['countFilter'] = $model->countFilter(); 
      /** 
       * Busca resultados da página atual 
       */ 
      $_SESSION['listFilter'] = $model->listFilter(); 
      /** 
       * Redireciona para view correspondente 
       */ 
      header("Location: ../view/backend/listEmpresa.view.php"); 
 } 
  else 
  { 
      /** 
       * Erro ao deletar o registro 
       */ 
       header("Location: ../view/backend/erro.php"); 
  } 
   break; 
  } 
 /** 
  * caso deleteArquivo 
  */ 
   case 'deleteArquivo': 
   { 
      /** 
       * Instancia objeto DAO 
       */ 
       $model = new EmpresaDAO(); 
      /** 
       * Define o id do registro para deletar o arquivo 
      */ 
      $model->setId_empresa($_GET['id_empresa']); 
     /** 
      * Seleciona arquivos para excluir 
      */ 
       $obj = $model->listPk(); 
           $model->setId_empresa($obj->id_empresa); 
           $model->setFk_id_usuario($obj->fk_id_usuario); 
           $model->setTitulo($obj->titulo); 
           $model->setTexto_texto($obj->texto_texto); 
           $model->setArquivo_arquivo(''); 
        /** 
        * Tenta atualizar 
         */ 
         if($model->update()) 
         { 
             /** 
             * Registro deletado 
             * Seta valores com parametros da pesquisa, se houver 
             */ 
             unlink("../upload/".$obj->arquivo_arquivo);  
            /** 
             * Zera $_SESSION['']->arquivo_ 
             */ 
            /** 
             * Redireciona para view correspondente 
             */ 
            header("Location: ../view/backend/updateEmpresa.view.php"); 
        } 
         else 
        { 
            /** 
             * Erro ao deletar o registro 
             */ 
             header("Location: ../view/backend/erro.html"); 
        } 
        break; 
    } 
   /** 
    * caso delete Todos 
    */ 
    case 'deleteAll': 
    { 
      /** 
       * Instancia objeto DAO 
      */ 
      $model = new EmpresaDAO(); 
     /** 
      * percorre array para deletar 
      */ 
      foreach ($_POST['id_empresa'] as $id_Empresa) 
       { 
           /** 
           * seta o valor do ID a ser deletado 
            */ 
           $model->setId_empresa($id_Empresa); 
           /** 
            * Seleciona arquivos para excluir 
           */ 
           $obj = $model->listPk(); 
          /** 
            * deleta o registro 
            */ 
           $model->delete(); 
            unlink("../upload/".$obj->arquivo_arquivo); 
       } 
       /** 
        * Seta valores com parametros da pesquisa, se houver 
        */ 
           $model->setId_empresa($_SESSION['Pid_empresa']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setTitulo($_SESSION['Ptitulo']); 
           $model->setTexto_texto($_SESSION['Ptexto_texto']); 
           $model->setArquivo_arquivo($_SESSION['Parquivo_arquivo']); 
        /** 
         * define total de registros por página 
         */ 
        $_SESSION['totalPorPg'] = 10; 
        /** 
         * Define ou atualiza a página de inicio 
         */ 
        if($_GET['inicio']) $_SESSION['inicio'] = $_GET['inicio'] * $_SESSION['totalPorPg']; 
        /** 
         * Zera countAll 
         */ 
       $_SESSION['countAll'] = ""; 
        /** 
         * Total de resultados relativos a pesquisa 
         */ 
        $_SESSION['countFilter'] = $model->countFilter(); 
        /** 
         * Busca resultados da página atual 
         */ 
        $_SESSION['listFilter'] = $model->listFilter(); 
       /** 
        * Redireciona para view correspondente 
        */ 
       header("Location: ../view/backend/listEmpresa.view.php"); 
       break; 
   } 
  /** 
   * caso update 
   */ 
   case 'update': 
   { 
      /** 
       * Instancia objeto DAO 
       */ 
      $model = new EmpresaDAO(); 
      /** 
       * seta valores vindos do formulário 
       */ 
       $model->setId_empresa($_POST['id_empresa']); 
      /** 
       * seleciona objeto que será atualizado 
       */ 
       $obj = $model->listPK(); 
           $model->setId_empresa($_POST['id_empresa']); 
           $model->setFk_id_usuario($_POST['fk_id_usuario']); 
           $model->setTitulo($_POST['titulo']); 
           $model->setTexto_texto($_POST['texto_texto']); 
           if($_FILES['arquivo_arquivo']['name']) 
           { 
             $model->setArquivo_arquivo($_FILES['arquivo_arquivo']['name']); 
              move_uploaded_file($_FILES['arquivo_arquivo']['tmp_name'], "../upload/" . $model->getArquivo_arquivo());   
              unlink("../upload/".$obj->arquivo_arquivo); 
           }else{ 
             $model->setArquivo_arquivo($_POST['arquivo_arquivoOld']); 
           } 
      /** 
       * tenta atualizar 
       */ 
       if($model->update()) 
       { 
           /** 
            * atualizado com sucesso 
            * Seta valores com parametros da pesquisa, se houver 
            */ 
           $model->setId_empresa($_SESSION['Pid_empresa']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setTitulo($_SESSION['Ptitulo']); 
           $model->setTexto_texto($_SESSION['Ptexto_texto']); 
           $model->setArquivo_arquivo($_SESSION['Parquivo_arquivo']); 
          /** 
           * define total de registros por página 
           */ 
         $_SESSION['totalPorPg'] = 10; 
         /** 
            * Define ou atualiza a página de inicio 
             */ 
            if($_GET['inicio']) $_SESSION['inicio'] = $_GET['inicio'] * $_SESSION['totalPorPg']; 
            /** 
             * Zera countAll 
             */ 
            $_SESSION['countAll'] = ""; 
            /** 
             * Total de resultados relativos a pesquisa 
            */ 
            $_SESSION['countFilter'] = $model->countFilter(); 
            /** 
             * Busca resultados da página atual 
             */ 
            $_SESSION['listFilter'] = $model->listFilter(); 
             /** 
             * Redireciona para view correspondente 
              */ 
            header("Location: ../view/backend/listEmpresa.view.php"); 
        } 
        else 
        { 
            /** 
            * erro no update 
            */ 
            header("Location: ../view/backend/erro.html"); 
       } 
       break; 
   } 
   /** 
    * caso listAll 
    */ 
    case 'listAll': 
    { 
       /** 
        * Instancia objeto DAO 
       */ 
       $model = new EmpresaDAO(); 
     /** 
      * zera valores de pesquisa 
      */ 
        $_SESSION['Pid_empresa'] = ""; 
        $model->setid_empresa(""); 
        $_SESSION['Pfk_id_usuario'] = ""; 
        $model->setfk_id_usuario(""); 
        $_SESSION['Ptitulo'] = ""; 
        $model->settitulo(""); 
        $_SESSION['Ptexto_texto'] = ""; 
        $model->settexto_texto(""); 
        $_SESSION['Parquivo_arquivo'] = ""; 
        $model->setarquivo_arquivo(""); 
       /** 
        * define total de registros por página 
        */ 
       $_SESSION['totalPorPg'] = 10; 
       /** 
        * Define inicio como 0 
        */ 
       $_SESSION['inicio'] = 0; 
       /** 
        * Define ou atualiza a página de inicio 
        */ 
        if($_GET['inicio']) $_SESSION['inicio'] = $_GET['inicio'] * $_SESSION['totalPorPg']; 
      /** 
       * zera count filter 
        */ 
       $_SESSION['countFilter'] = ""; 
       /** 
        * define cont all 
        */ 
      $_SESSION['countAll'] = $model->countAll(); 
       /** 
       * lista todos os registros 
        */ 
       $_SESSION['listFilter'] = $model->listAll(); 
       /** 
        * Redireciona para view correspondente 
        */ 
        header("Location: ../view/backend/listEmpresa.view.php"); 
        break; 
    } 
   /** 
    * caso listFilter 
    */ 
    case 'listFilter': 
    { 
       /** 
        * Instancia objeto DAO 
        */ 
        $model = new EmpresaDAO(); 
       /** 
       * zera valores de pesquisa 
       */ 
        $_SESSION['Pid_empresa'] = ""; 
        $model->setId_empresa(""); 
        $_SESSION['Pfk_id_usuario'] = ""; 
        $model->setFk_id_usuario(""); 
        $_SESSION['Ptitulo'] = ""; 
        $model->setTitulo(""); 
        $_SESSION['Ptexto_texto'] = ""; 
        $model->setTexto_texto(""); 
        $_SESSION['Parquivo_arquivo'] = ""; 
        $model->setArquivo_arquivo(""); 
       /** 
         * Define valores 
         */ 
       if(!$_SESSION['Pid_empresa'])$_SESSION['Pid_empresa'] = $_POST['id_empresaP']; 
        $model->setId_empresa($_SESSION['Pid_empresa']); 
       if(!$_SESSION['Pfk_id_usuario'])$_SESSION['Pfk_id_usuario'] = $_POST['fk_id_usuarioP']; 
        $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
       if(!$_SESSION['Ptitulo'])$_SESSION['Ptitulo'] = $_POST['tituloP']; 
        $model->setTitulo($_SESSION['Ptitulo']); 
       if(!$_SESSION['Ptexto_texto'])$_SESSION['Ptexto_texto'] = $_POST['texto_textoP']; 
        $model->setTexto_texto($_SESSION['Ptexto_texto']); 
       if(!$_SESSION['Parquivo_arquivo'])$_SESSION['Parquivo_arquivo'] = $_POST['arquivo_arquivoP']; 
        $model->setArquivo_arquivo($_SESSION['Parquivo_arquivo']); 
        /** 
         * define total de registros por página 
         */ 
       $_SESSION['totalPorPg'] = 10; 
       /** 
         * define inicio como 0 
         */ 
        $_SESSION['inicio'] = 0; 
        /** 
         * Define ou atualiza a página de inicio 
         */ 
        if($_GET['inicio']) $_SESSION['inicio'] = $_GET['inicio'] * $_SESSION['totalPorPg']; 
        /** 
         * zera count all 
         */ 
        $_SESSION['countAll'] = ""; 
        /** 
         * define cont filter 
         */ 
       $_SESSION['countFilter'] = $model->countFilter(); 
       /** 
         * lista os registro do filtro 
        */ 
        $_SESSION['listFilter'] = $model->listFilter(); 
        /** 
         * verifica se listou algum registro 
         */ 
        if($_SESSION['listFilter']) 
        { 
            /** 
             * Redireciona para view correspondente 
             */ 
            header("Location: ../view/backend/listEmpresa.view.php"); 
        } 
        else 
       { 
            /** 
            * Redireciona para view correspondente 
             */ 
            header("Location: ../view/backend/listEmpresa.view.php"); 
       } 
        break; 
   } 
   /** 
    * caso detalhes 
   */ 
   case 'details': 
   { 
      /** 
       * Instancia objeto DAO 
       */ 
       $model = new EmpresaDAO(); 
      /** 
       * define valor do id 
       */ 
     $model->setId_empresa($_GET['id_empresa']); 
     /** 
      * lista o registro 
      */ 
     $_SESSION['listPk'] = $model->listPk(); 
      /** 
        * testa se foi listado algum registro 
       */ 
       if($_SESSION['listPk']) 
       { 
          /** 
           * sucesso, redirecinapara view detalhe 
           */ 
           header("Location: ../view/backend/detailsEmpresa.view.php"); 
       } 
       else 
       { 
          /** 
           * erro 
           */ 
           header("Location: ../view/backend/erro.html"); 
       } 
       break; 
  } 
  /** 
   * caso listPk 
   */ 
   case 'listPk': 
  { 
     /** 
      * Instancia objeto DAO 
     */ 
     $model = new EmpresaDAO(); 
     /** 
     * define valor do id 
     */ 
    $model->setId_Empresa($_GET['id_empresa']); 
   /** 
     * lista o registro 
      */ 
      $_SESSION['listPk'] = $model->listPk(); 
     /** 
      * teste se foi listado algum resgitro 
      */ 
     if($_SESSION['listPk']) 
     { 
         /** 
          * sucesso, redireciona para view correspondente 
          */ 
          header("Location: ../view/backend/updateEmpresa.view.php"); 
      } 
      else 
      { 
         /** 
          * erro 
          */ 
          header("Location: ../view/backend/erro.html"); 
      } 
      break; 
  } 
} 
 } 
} 
$Controller = new EmpresaController(); 

