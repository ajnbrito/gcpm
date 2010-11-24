<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package controller 
 * @name {$nomeTabela[0]} 
 */ 

include_once "../model/ParceiroDAO.class.php"; 

class ParceiroController 
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
           $model = new ParceiroDAO(); 
          /** 
           * Setar valores do objeto com valores vindo do form insert 
           */ 
           $model->setId_parceiro($_POST['id_parceiro']); 
           $model->setFk_id_usuario($_POST['fk_id_usuario']); 
           $model->setNome($_POST['nome']); 
           $model->setTexto_descricao($_POST['texto_descricao']); 
           $model->setLink($_POST['link']); 
           $model->setArquivo_logo($_FILES['arquivo_logo']['name']); 
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
           $model->setId_parceiro($_SESSION['Pid_parceiro']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_descricao($_SESSION['Ptexto_descricao']); 
           $model->setLink($_SESSION['Plink']); 
           $model->setArquivo_logo($_SESSION['Parquivo_logo']); 
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
            header("Location: ../view/backend/listParceiro.view.php"); 
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
      $model = new ParceiroDAO(); 
     /** 
     * Define o id do registro para deletar 
     */ 
     $model->setId_parceiro($_GET['id_parceiro']); 
    /** 
     * Seleciona arquivos para excluir 
      */ 
      $obj = $model->listPk(); 
     /** 
      * Tenta deletar 
     */ 
     if($model->delete()) 
      { 
            unlink("../upload/".$obj->arquivo_logo); 
         /** 
          * Registro deletado 
          * Seta valores com parametros da pesquisa, se houver 
          */ 
           $model->setId_parceiro($_SESSION['Pid_parceiro']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_descricao($_SESSION['Ptexto_descricao']); 
           $model->setLink($_SESSION['Plink']); 
           $model->setArquivo_logo($_SESSION['Parquivo_logo']); 
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
      header("Location: ../view/backend/listParceiro.view.php"); 
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
       $model = new ParceiroDAO(); 
      /** 
       * Define o id do registro para deletar o arquivo 
      */ 
      $model->setId_parceiro($_GET['id_parceiro']); 
     /** 
      * Seleciona arquivos para excluir 
      */ 
       $obj = $model->listPk(); 
           $model->setId_parceiro($obj->id_parceiro); 
           $model->setFk_id_usuario($obj->fk_id_usuario); 
           $model->setNome($obj->nome); 
           $model->setTexto_descricao($obj->texto_descricao); 
           $model->setLink($obj->link); 
           $model->setArquivo_logo(''); 
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
            header("Location: ../view/backend/updateParceiro.view.php"); 
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
      $model = new ParceiroDAO(); 
     /** 
      * percorre array para deletar 
      */ 
      foreach ($_POST['id_parceiro'] as $id_Parceiro) 
       { 
           /** 
           * seta o valor do ID a ser deletado 
            */ 
           $model->setId_parceiro($id_Parceiro); 
           /** 
            * Seleciona arquivos para excluir 
           */ 
           $obj = $model->listPk(); 
          /** 
            * deleta o registro 
            */ 
           $model->delete(); 
            unlink("../upload/".$obj->arquivo_logo); 
       } 
       /** 
        * Seta valores com parametros da pesquisa, se houver 
        */ 
           $model->setId_parceiro($_SESSION['Pid_parceiro']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_descricao($_SESSION['Ptexto_descricao']); 
           $model->setLink($_SESSION['Plink']); 
           $model->setArquivo_logo($_SESSION['Parquivo_logo']); 
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
       header("Location: ../view/backend/listParceiro.view.php"); 
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
      $model = new ParceiroDAO(); 
      /** 
       * seta valores vindos do formulário 
       */ 
       $model->setId_parceiro($_POST['id_parceiro']); 
      /** 
       * seleciona objeto que será atualizado 
       */ 
       $obj = $model->listPK(); 
           $model->setId_parceiro($_POST['id_parceiro']); 
           $model->setFk_id_usuario($_POST['fk_id_usuario']); 
           $model->setNome($_POST['nome']); 
           $model->setTexto_descricao($_POST['texto_descricao']); 
           $model->setLink($_POST['link']); 
           $model->setArquivo_logo($_POST['arquivo_logo']); 
      /** 
       * tenta atualizar 
       */ 
       if($model->update()) 
       { 
           /** 
            * atualizado com sucesso 
            * Seta valores com parametros da pesquisa, se houver 
            */ 
           $model->setId_parceiro($_SESSION['Pid_parceiro']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_descricao($_SESSION['Ptexto_descricao']); 
           $model->setLink($_SESSION['Plink']); 
           $model->setArquivo_logo($_SESSION['Parquivo_logo']); 
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
            header("Location: ../view/backend/listParceiro.view.php"); 
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
       $model = new ParceiroDAO(); 
     /** 
      * zera valores de pesquisa 
      */ 
        $_SESSION['Pid_parceiro'] = ""; 
        $model->setid_parceiro(""); 
        $_SESSION['Pfk_id_usuario'] = ""; 
        $model->setfk_id_usuario(""); 
        $_SESSION['Pnome'] = ""; 
        $model->setnome(""); 
        $_SESSION['Ptexto_descricao'] = ""; 
        $model->settexto_descricao(""); 
        $_SESSION['Plink'] = ""; 
        $model->setlink(""); 
        $_SESSION['Parquivo_logo'] = ""; 
        $model->setarquivo_logo(""); 
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
        header("Location: ../view/backend/listParceiro.view.php"); 
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
        $model = new ParceiroDAO(); 
       /** 
       * zera valores de pesquisa 
       */ 
        $_SESSION['Pid_parceiro'] = ""; 
        $model->setId_parceiro(""); 
        $_SESSION['Pfk_id_usuario'] = ""; 
        $model->setFk_id_usuario(""); 
        $_SESSION['Pnome'] = ""; 
        $model->setNome(""); 
        $_SESSION['Ptexto_descricao'] = ""; 
        $model->setTexto_descricao(""); 
        $_SESSION['Plink'] = ""; 
        $model->setLink(""); 
        $_SESSION['Parquivo_logo'] = ""; 
        $model->setArquivo_logo(""); 
       /** 
         * Define valores 
         */ 
       if(!$_SESSION['Pid_parceiro'])$_SESSION['Pid_parceiro'] = $_POST['id_parceiroP']; 
        $model->setId_parceiro($_SESSION['Pid_parceiro']); 
       if(!$_SESSION['Pfk_id_usuario'])$_SESSION['Pfk_id_usuario'] = $_POST['fk_id_usuarioP']; 
        $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
       if(!$_SESSION['Pnome'])$_SESSION['Pnome'] = $_POST['nomeP']; 
        $model->setNome($_SESSION['Pnome']); 
       if(!$_SESSION['Ptexto_descricao'])$_SESSION['Ptexto_descricao'] = $_POST['texto_descricaoP']; 
        $model->setTexto_descricao($_SESSION['Ptexto_descricao']); 
       if(!$_SESSION['Plink'])$_SESSION['Plink'] = $_POST['linkP']; 
        $model->setLink($_SESSION['Plink']); 
       if(!$_SESSION['Parquivo_logo'])$_SESSION['Parquivo_logo'] = $_POST['arquivo_logoP']; 
        $model->setArquivo_logo($_SESSION['Parquivo_logo']); 
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
            header("Location: ../view/backend/listParceiro.view.php"); 
        } 
        else 
       { 
            /** 
            * Redireciona para view correspondente 
             */ 
            header("Location: ../view/backend/listParceiro.view.php"); 
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
       $model = new ParceiroDAO(); 
      /** 
       * define valor do id 
       */ 
     $model->setId_parceiro($_GET['id_parceiro']); 
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
           header("Location: ../view/backend/detailsParceiro.view.php"); 
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
     $model = new ParceiroDAO(); 
     /** 
     * define valor do id 
     */ 
    $model->setId_Parceiro($_GET['id_parceiro']); 
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
          header("Location: ../view/backend/updateParceiro.view.php"); 
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
$Controller = new ParceiroController(); 

