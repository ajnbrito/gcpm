<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package controller 
 * @name {$nomeTabela[0]} 
 */ 

include_once "../model/UsuarioDAO.class.php"; 

class UsuarioController 
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
           $model = new UsuarioDAO(); 
          /** 
           * Setar valores do objeto com valores vindo do form insert 
           */ 
           $model->setId_usuario($_POST['id_usuario']); 
           $model->setNome($_POST['nome']); 
           $model->setUsuario($_POST['usuario']); 
           $model->setSenha($_POST['senha']); 
         /** 
          * Tenta incluir 
          */ 
          if($model->insert()) 
          { 
             /** 
             * Incluído com sucesso 
             */ 
            /** 
            * Seta valores com parametros da pesquisa, se houver 
            */ 
           $model->setId_usuario($_SESSION['Pid_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setUsuario($_SESSION['Pusuario']); 
           $model->setSenha($_SESSION['Psenha']); 
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
            header("Location: ../view/backend/listUsuario.view.php"); 
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
      $model = new UsuarioDAO(); 
     /** 
     * Define o id do registro para deletar 
     */ 
     $model->setId_usuario($_GET['id_usuario']); 
    /** 
     * Seleciona arquivos para excluir 
      */ 
      $obj = $model->listPk(); 
     /** 
      * Tenta deletar 
     */ 
     if($model->delete()) 
      { 
         /** 
          * Registro deletado 
          * Seta valores com parametros da pesquisa, se houver 
          */ 
           $model->setId_usuario($_SESSION['Pid_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setUsuario($_SESSION['Pusuario']); 
           $model->setSenha($_SESSION['Psenha']); 
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
      header("Location: ../view/backend/listUsuario.view.php"); 
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
       $model = new UsuarioDAO(); 
      /** 
       * Define o id do registro para deletar o arquivo 
      */ 
      $model->setId_usuario($_GET['id_usuario']); 
     /** 
      * Seleciona arquivos para excluir 
      */ 
       $obj = $model->listPk(); 
           $model->setId_usuario($obj->id_usuario); 
           $model->setNome($obj->nome); 
           $model->setUsuario($obj->usuario); 
           $model->setSenha($obj->senha); 
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
            header("Location: ../view/backend/updateUsuario.view.php"); 
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
      $model = new UsuarioDAO(); 
     /** 
      * percorre array para deletar 
      */ 
      foreach ($_POST['id_usuario'] as $id_Usuario) 
       { 
           /** 
           * seta o valor do ID a ser deletado 
            */ 
           $model->setId_usuario($id_Usuario); 
           /** 
            * Seleciona arquivos para excluir 
           */ 
           $obj = $model->listPk(); 
          /** 
            * deleta o registro 
            */ 
           $model->delete(); 
       } 
       /** 
        * Seta valores com parametros da pesquisa, se houver 
        */ 
           $model->setId_usuario($_SESSION['Pid_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setUsuario($_SESSION['Pusuario']); 
           $model->setSenha($_SESSION['Psenha']); 
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
       header("Location: ../view/backend/listUsuario.view.php"); 
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
      $model = new UsuarioDAO(); 
      /** 
       * seta valores vindos do formulário 
       */ 
       $model->setId_usuario($_POST['id_usuario']); 
      /** 
       * seleciona objeto que será atualizado 
       */ 
       $obj = $model->listPK(); 
           $model->setId_usuario($_POST['id_usuario']); 
           $model->setNome($_POST['nome']); 
           $model->setUsuario($_POST['usuario']); 
           $model->setSenha($_POST['senha']); 
      /** 
       * tenta atualizar 
       */ 
       if($model->update()) 
       { 
           /** 
            * atualizado com sucesso 
            * Seta valores com parametros da pesquisa, se houver 
            */ 
           $model->setId_usuario($_SESSION['Pid_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setUsuario($_SESSION['Pusuario']); 
           $model->setSenha($_SESSION['Psenha']); 
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
            header("Location: ../view/backend/listUsuario.view.php"); 
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
       $model = new UsuarioDAO(); 
     /** 
      * zera valores de pesquisa 
      */ 
        $_SESSION['Pid_usuario'] = ""; 
        $model->setid_usuario(""); 
        $_SESSION['Pnome'] = ""; 
        $model->setnome(""); 
        $_SESSION['Pusuario'] = ""; 
        $model->setusuario(""); 
        $_SESSION['Psenha'] = ""; 
        $model->setsenha(""); 
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
        header("Location: ../view/backend/listUsuario.view.php"); 
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
        $model = new UsuarioDAO(); 
       /** 
       * zera valores de pesquisa 
       */ 
        $_SESSION['Pid_usuario'] = ""; 
        $model->setId_usuario(""); 
        $_SESSION['Pnome'] = ""; 
        $model->setNome(""); 
        $_SESSION['Pusuario'] = ""; 
        $model->setUsuario(""); 
        $_SESSION['Psenha'] = ""; 
        $model->setSenha(""); 
       /** 
         * Define valores 
         */ 
       if(!$_SESSION['Pid_usuario'])$_SESSION['Pid_usuario'] = $_POST['id_usuarioP']; 
        $model->setId_usuario($_SESSION['Pid_usuario']); 
       if(!$_SESSION['Pnome'])$_SESSION['Pnome'] = $_POST['nomeP']; 
        $model->setNome($_SESSION['Pnome']); 
       if(!$_SESSION['Pusuario'])$_SESSION['Pusuario'] = $_POST['usuarioP']; 
        $model->setUsuario($_SESSION['Pusuario']); 
       if(!$_SESSION['Psenha'])$_SESSION['Psenha'] = $_POST['senhaP']; 
        $model->setSenha($_SESSION['Psenha']); 
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
            header("Location: ../view/backend/listUsuario.view.php"); 
        } 
        else 
       { 
            /** 
            * Redireciona para view correspondente 
             */ 
            header("Location: ../view/backend/listUsuario.view.php"); 
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
       $model = new UsuarioDAO(); 
      /** 
       * define valor do id 
       */ 
     $model->setId_usuario($_GET['id_usuario']); 
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
           header("Location: ../view/backend/detailsUsuario.view.php"); 
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
     $model = new UsuarioDAO(); 
     /** 
     * define valor do id 
     */ 
    $model->setId_Usuario($_GET['id_usuario']); 
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
          header("Location: ../view/backend/updateUsuario.view.php"); 
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
$Controller = new UsuarioController(); 

