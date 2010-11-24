<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package controller 
 * @name {$nomeTabela[0]} 
 */ 

include_once "../model/TreinamentoDAO.class.php"; 

class TreinamentoController 
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
           $model = new TreinamentoDAO(); 
          /** 
           * Setar valores do objeto com valores vindo do form insert 
           */ 
           $model->setId_treinamento($_POST['id_treinamento']); 
           $model->setFk_id_usuario($_POST['fk_id_usuario']); 
           $model->setNome($_POST['nome']); 
           $model->setTexto_sobre($_POST['texto_sobre']); 
           $model->setTexto_publico_alvo($_POST['texto_publico_alvo']); 
           $model->setTexto_conteudo($_POST['texto_conteudo']); 
           $model->setTexto_instrutor($_POST['texto_instrutor']); 
           $model->setNumero_vagas($_POST['numero_vagas']); 
           $model->setTexto_locais($_POST['texto_locais']); 
           $model->setTexto_proximas_turmas($_POST['texto_proximas_turmas']); 
           $model->setTexto_incompany($_POST['texto_incompany']); 
           $model->setTexto_informacoes($_POST['texto_informacoes']); 
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
           $model->setId_treinamento($_SESSION['Pid_treinamento']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_sobre($_SESSION['Ptexto_sobre']); 
           $model->setTexto_publico_alvo($_SESSION['Ptexto_publico_alvo']); 
           $model->setTexto_conteudo($_SESSION['Ptexto_conteudo']); 
           $model->setTexto_instrutor($_SESSION['Ptexto_instrutor']); 
           $model->setNumero_vagas($_SESSION['Pnumero_vagas']); 
           $model->setTexto_locais($_SESSION['Ptexto_locais']); 
           $model->setTexto_proximas_turmas($_SESSION['Ptexto_proximas_turmas']); 
           $model->setTexto_incompany($_SESSION['Ptexto_incompany']); 
           $model->setTexto_informacoes($_SESSION['Ptexto_informacoes']); 
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
            header("Location: ../view/backend/listTreinamento.view.php"); 
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
      $model = new TreinamentoDAO(); 
     /** 
     * Define o id do registro para deletar 
     */ 
     $model->setId_treinamento($_GET['id_treinamento']); 
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
           $model->setId_treinamento($_SESSION['Pid_treinamento']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_sobre($_SESSION['Ptexto_sobre']); 
           $model->setTexto_publico_alvo($_SESSION['Ptexto_publico_alvo']); 
           $model->setTexto_conteudo($_SESSION['Ptexto_conteudo']); 
           $model->setTexto_instrutor($_SESSION['Ptexto_instrutor']); 
           $model->setNumero_vagas($_SESSION['Pnumero_vagas']); 
           $model->setTexto_locais($_SESSION['Ptexto_locais']); 
           $model->setTexto_proximas_turmas($_SESSION['Ptexto_proximas_turmas']); 
           $model->setTexto_incompany($_SESSION['Ptexto_incompany']); 
           $model->setTexto_informacoes($_SESSION['Ptexto_informacoes']); 
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
      header("Location: ../view/backend/listTreinamento.view.php"); 
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
       $model = new TreinamentoDAO(); 
      /** 
       * Define o id do registro para deletar o arquivo 
      */ 
      $model->setId_treinamento($_GET['id_treinamento']); 
     /** 
      * Seleciona arquivos para excluir 
      */ 
       $obj = $model->listPk(); 
           $model->setId_treinamento($obj->id_treinamento); 
           $model->setFk_id_usuario($obj->fk_id_usuario); 
           $model->setNome($obj->nome); 
           $model->setTexto_sobre($obj->texto_sobre); 
           $model->setTexto_publico_alvo($obj->texto_publico_alvo); 
           $model->setTexto_conteudo($obj->texto_conteudo); 
           $model->setTexto_instrutor($obj->texto_instrutor); 
           $model->setNumero_vagas($obj->numero_vagas); 
           $model->setTexto_locais($obj->texto_locais); 
           $model->setTexto_proximas_turmas($obj->texto_proximas_turmas); 
           $model->setTexto_incompany($obj->texto_incompany); 
           $model->setTexto_informacoes($obj->texto_informacoes); 
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
            header("Location: ../view/backend/updateTreinamento.view.php"); 
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
      $model = new TreinamentoDAO(); 
     /** 
      * percorre array para deletar 
      */ 
      foreach ($_POST['id_treinamento'] as $id_Treinamento) 
       { 
           /** 
           * seta o valor do ID a ser deletado 
            */ 
           $model->setId_treinamento($id_Treinamento); 
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
           $model->setId_treinamento($_SESSION['Pid_treinamento']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_sobre($_SESSION['Ptexto_sobre']); 
           $model->setTexto_publico_alvo($_SESSION['Ptexto_publico_alvo']); 
           $model->setTexto_conteudo($_SESSION['Ptexto_conteudo']); 
           $model->setTexto_instrutor($_SESSION['Ptexto_instrutor']); 
           $model->setNumero_vagas($_SESSION['Pnumero_vagas']); 
           $model->setTexto_locais($_SESSION['Ptexto_locais']); 
           $model->setTexto_proximas_turmas($_SESSION['Ptexto_proximas_turmas']); 
           $model->setTexto_incompany($_SESSION['Ptexto_incompany']); 
           $model->setTexto_informacoes($_SESSION['Ptexto_informacoes']); 
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
       header("Location: ../view/backend/listTreinamento.view.php"); 
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
      $model = new TreinamentoDAO(); 
      /** 
       * seta valores vindos do formulário 
       */ 
       $model->setId_treinamento($_POST['id_treinamento']); 
      /** 
       * seleciona objeto que será atualizado 
       */ 
       $obj = $model->listPK(); 
           $model->setId_treinamento($_POST['id_treinamento']); 
           $model->setFk_id_usuario($_POST['fk_id_usuario']); 
           $model->setNome($_POST['nome']); 
           $model->setTexto_sobre($_POST['texto_sobre']); 
           $model->setTexto_publico_alvo($_POST['texto_publico_alvo']); 
           $model->setTexto_conteudo($_POST['texto_conteudo']); 
           $model->setTexto_instrutor($_POST['texto_instrutor']); 
           $model->setNumero_vagas($_POST['numero_vagas']); 
           $model->setTexto_locais($_POST['texto_locais']); 
           $model->setTexto_proximas_turmas($_POST['texto_proximas_turmas']); 
           $model->setTexto_incompany($_POST['texto_incompany']); 
           $model->setTexto_informacoes($_POST['texto_informacoes']); 
      /** 
       * tenta atualizar 
       */ 
       if($model->update()) 
       { 
           /** 
            * atualizado com sucesso 
            * Seta valores com parametros da pesquisa, se houver 
            */ 
           $model->setId_treinamento($_SESSION['Pid_treinamento']); 
           $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
           $model->setNome($_SESSION['Pnome']); 
           $model->setTexto_sobre($_SESSION['Ptexto_sobre']); 
           $model->setTexto_publico_alvo($_SESSION['Ptexto_publico_alvo']); 
           $model->setTexto_conteudo($_SESSION['Ptexto_conteudo']); 
           $model->setTexto_instrutor($_SESSION['Ptexto_instrutor']); 
           $model->setNumero_vagas($_SESSION['Pnumero_vagas']); 
           $model->setTexto_locais($_SESSION['Ptexto_locais']); 
           $model->setTexto_proximas_turmas($_SESSION['Ptexto_proximas_turmas']); 
           $model->setTexto_incompany($_SESSION['Ptexto_incompany']); 
           $model->setTexto_informacoes($_SESSION['Ptexto_informacoes']); 
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
            header("Location: ../view/backend/listTreinamento.view.php"); 
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
       $model = new TreinamentoDAO(); 
     /** 
      * zera valores de pesquisa 
      */ 
        $_SESSION['Pid_treinamento'] = ""; 
        $model->setid_treinamento(""); 
        $_SESSION['Pfk_id_usuario'] = ""; 
        $model->setfk_id_usuario(""); 
        $_SESSION['Pnome'] = ""; 
        $model->setnome(""); 
        $_SESSION['Ptexto_sobre'] = ""; 
        $model->settexto_sobre(""); 
        $_SESSION['Ptexto_publico_alvo'] = ""; 
        $model->settexto_publico_alvo(""); 
        $_SESSION['Ptexto_conteudo'] = ""; 
        $model->settexto_conteudo(""); 
        $_SESSION['Ptexto_instrutor'] = ""; 
        $model->settexto_instrutor(""); 
        $_SESSION['Pnumero_vagas'] = ""; 
        $model->setnumero_vagas(""); 
        $_SESSION['Ptexto_locais'] = ""; 
        $model->settexto_locais(""); 
        $_SESSION['Ptexto_proximas_turmas'] = ""; 
        $model->settexto_proximas_turmas(""); 
        $_SESSION['Ptexto_incompany'] = ""; 
        $model->settexto_incompany(""); 
        $_SESSION['Ptexto_informacoes'] = ""; 
        $model->settexto_informacoes(""); 
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
        header("Location: ../view/backend/listTreinamento.view.php"); 
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
        $model = new TreinamentoDAO(); 
       /** 
       * zera valores de pesquisa 
       */ 
        $_SESSION['Pid_treinamento'] = ""; 
        $model->setId_treinamento(""); 
        $_SESSION['Pfk_id_usuario'] = ""; 
        $model->setFk_id_usuario(""); 
        $_SESSION['Pnome'] = ""; 
        $model->setNome(""); 
        $_SESSION['Ptexto_sobre'] = ""; 
        $model->setTexto_sobre(""); 
        $_SESSION['Ptexto_publico_alvo'] = ""; 
        $model->setTexto_publico_alvo(""); 
        $_SESSION['Ptexto_conteudo'] = ""; 
        $model->setTexto_conteudo(""); 
        $_SESSION['Ptexto_instrutor'] = ""; 
        $model->setTexto_instrutor(""); 
        $_SESSION['Pnumero_vagas'] = ""; 
        $model->setNumero_vagas(""); 
        $_SESSION['Ptexto_locais'] = ""; 
        $model->setTexto_locais(""); 
        $_SESSION['Ptexto_proximas_turmas'] = ""; 
        $model->setTexto_proximas_turmas(""); 
        $_SESSION['Ptexto_incompany'] = ""; 
        $model->setTexto_incompany(""); 
        $_SESSION['Ptexto_informacoes'] = ""; 
        $model->setTexto_informacoes(""); 
       /** 
         * Define valores 
         */ 
       if(!$_SESSION['Pid_treinamento'])$_SESSION['Pid_treinamento'] = $_POST['id_treinamentoP']; 
        $model->setId_treinamento($_SESSION['Pid_treinamento']); 
       if(!$_SESSION['Pfk_id_usuario'])$_SESSION['Pfk_id_usuario'] = $_POST['fk_id_usuarioP']; 
        $model->setFk_id_usuario($_SESSION['Pfk_id_usuario']); 
       if(!$_SESSION['Pnome'])$_SESSION['Pnome'] = $_POST['nomeP']; 
        $model->setNome($_SESSION['Pnome']); 
       if(!$_SESSION['Ptexto_sobre'])$_SESSION['Ptexto_sobre'] = $_POST['texto_sobreP']; 
        $model->setTexto_sobre($_SESSION['Ptexto_sobre']); 
       if(!$_SESSION['Ptexto_publico_alvo'])$_SESSION['Ptexto_publico_alvo'] = $_POST['texto_publico_alvoP']; 
        $model->setTexto_publico_alvo($_SESSION['Ptexto_publico_alvo']); 
       if(!$_SESSION['Ptexto_conteudo'])$_SESSION['Ptexto_conteudo'] = $_POST['texto_conteudoP']; 
        $model->setTexto_conteudo($_SESSION['Ptexto_conteudo']); 
       if(!$_SESSION['Ptexto_instrutor'])$_SESSION['Ptexto_instrutor'] = $_POST['texto_instrutorP']; 
        $model->setTexto_instrutor($_SESSION['Ptexto_instrutor']); 
       if(!$_SESSION['Pnumero_vagas'])$_SESSION['Pnumero_vagas'] = $_POST['numero_vagasP']; 
        $model->setNumero_vagas($_SESSION['Pnumero_vagas']); 
       if(!$_SESSION['Ptexto_locais'])$_SESSION['Ptexto_locais'] = $_POST['texto_locaisP']; 
        $model->setTexto_locais($_SESSION['Ptexto_locais']); 
       if(!$_SESSION['Ptexto_proximas_turmas'])$_SESSION['Ptexto_proximas_turmas'] = $_POST['texto_proximas_turmasP']; 
        $model->setTexto_proximas_turmas($_SESSION['Ptexto_proximas_turmas']); 
       if(!$_SESSION['Ptexto_incompany'])$_SESSION['Ptexto_incompany'] = $_POST['texto_incompanyP']; 
        $model->setTexto_incompany($_SESSION['Ptexto_incompany']); 
       if(!$_SESSION['Ptexto_informacoes'])$_SESSION['Ptexto_informacoes'] = $_POST['texto_informacoesP']; 
        $model->setTexto_informacoes($_SESSION['Ptexto_informacoes']); 
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
            header("Location: ../view/backend/listTreinamento.view.php"); 
        } 
        else 
       { 
            /** 
            * Redireciona para view correspondente 
             */ 
            header("Location: ../view/backend/listTreinamento.view.php"); 
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
       $model = new TreinamentoDAO(); 
      /** 
       * define valor do id 
       */ 
     $model->setId_treinamento($_GET['id_treinamento']); 
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
           header("Location: ../view/backend/detailsTreinamento.view.php"); 
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
     $model = new TreinamentoDAO(); 
     /** 
     * define valor do id 
     */ 
    $model->setId_Treinamento($_GET['id_treinamento']); 
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
          header("Location: ../view/backend/updateTreinamento.view.php"); 
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
$Controller = new TreinamentoController(); 

