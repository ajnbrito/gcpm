<?php

/*
 * Inicia seção
 */
session_start();

/*
 * função auto loader, garrega classes automaticamente
 */

function __autoload($classe)
{
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
foreach ($Conexao->nomeTabela() as $nomeTabela)
{
    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/controller/" . ucfirst($nomeTabela[0]) . ".controller.php";

    $linha = "<?php \n";
    $linha .= "/** \n";
    $linha .= " * Descrição da classe \n";
    $linha .= " * @author Marcelo Jaques \n";
    $linha .= " * @version 1.0 \n";
    $linha .= " * @package controller \n";
    $linha .= " * @name {\$nomeTabela[0]} \n";
    $linha .= " */ \n\n";

    $linha .= "include_once \"../model/" . ucfirst($nomeTabela[0]) . "DAO.class.php\"; \n\n";

    $linha .= "class " . ucfirst($nomeTabela[0]) . "Controller \n{\n";


    $linha .= "/** \n";
    $linha .= "* @method __construct \n";
    $linha .= "*/ \n";
    $linha .= "function __construct() \n";
    $linha .= "{ \n";
    $linha .= "  /** \n";
    $linha .= "   * inicia session \n";
    $linha .= "   */ \n";
    $linha .= "   session_start(); \n";

    $linha .= "  /** \n";
    $linha .= "   * recebe option vinda dos formulários \n";
    $linha .= "   */ \n";
    $linha .= "   \$option = \$_POST['opcao']; \n";
    $linha .= "   if(!isset(\$option)) \$option = \$_GET['opcao']; \n";

    $linha .= "  /** \n";
    $linha .= "   * definição das options \n";
    $linha .= "   */ \n";
    $linha .= "   switch(\$option) \n";
    $linha .= "   { \n";
    $linha .= "      /** \n";
    $linha .= "       * caso insert \n";
    $linha .= "      */ \n";
    $linha .= "      case 'insert': \n";
    $linha .= "       { \n";
    $linha .= "         /** \n";
    $linha .= "          * Instancia objeto DAO \n";
    $linha .= "           */ \n";
    $linha .= "           \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "          /** \n";
    $linha .= "           * Setar valores do objeto com valores vindo do form insert \n";
    $linha .= "           */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        if (substr($nomeCampo['Field'],0,7) == 'arquivo')
        {
            $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_FILES['{$nomeCampo['Field']}']['name']); \n";
        }
        else
        {
            $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_POST['{$nomeCampo['Field']}']); \n";
        }
    }

    $linha .= "         /** \n";
    $linha .= "          * Tenta incluir \n";
    $linha .= "          */ \n";
    $linha .= "          if(\$model->insert()) \n";
    $linha .= "          { \n";
    $linha .= "             /** \n";
    $linha .= "             * Incluído com sucesso \n";
    $linha .= "             */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        if ($nomeCampo['Field'] == 'arquivo_arquivo')
        {
            $linha .= "                /** \n";
            $linha .= "                 * Faz upload do arquivo  \n";
            $linha .= "                 */ \n";
            $linha .= "                 move_uploaded_file(\$_FILES['arquivo_arquivo']['tmp_name'], \"../upload/\" . \$model->getArquivo_arquivo());   \n";
        }
    }
    $linha .= "            /** \n";
    $linha .= "            * Seta valores com parametros da pesquisa, se houver \n";
    $linha .= "            */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_SESSION['P{$nomeCampo['Field']}']); \n";
    }

    $linha .= "           /** \n";
    $linha .= "            * Define o total de resultados por página \n";
    $linha .= "           */ \n";
    $linha .= "            \$_SESSION['totalPorPg'] = 10; \n";
    $linha .= "           /** \n";
    $linha .= "            * Define ou atualiza a página de início \n";
    $linha .= "           */ \n";
    $linha .= "           if(\$_GET['inicio']) \$_SESSION['inicio'] = \$_GET['inicio'] * \$_SESSION['totalPorPg']; \n";
    $linha .= "         /** \n";
    $linha .= "           * Zerar countAll \n";
    $linha .= "           */ \n";
    $linha .= "           \$_SESSION['countAll'] = \"\"; \n";
    $linha .= "          /** \n";
    $linha .= "           * Total de resultados relativos a pesquisa \n";
    $linha .= "           */ \n";
    $linha .= "           \$_SESSION['countFilter'] = \$model->countFilter(); \n";
    $linha .= "          /** \n";
    $linha .= "           * Busca resultados da página atual \n";
    $linha .= "            */ \n";
    $linha .= "            \$_SESSION['listFilter'] = \$model->listFilter(); \n";
    $linha .= "           /** \n";
    $linha .= "            * Redireciona para view correspondente \n";
    $linha .= "           */ \n";
    $linha .= "            header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "        } \n";
    $linha .= "        else \n";
    $linha .= "        { \n";
    $linha .= "            /** \n";
    $linha .= "            * Erro, não foi possível incluir o registro \n";
    $linha .= "            */ \n";
    $linha .= "            header(\"Location: ../view/backend/erro.php\"); \n";
    $linha .= "       } \n";
    $linha .= "       break; \n";
    $linha .= "   } \n";

    $linha .= "  /** \n";
    $linha .= "    * caso delete \n";
    $linha .= "    */ \n";
    $linha .= "   case 'delete': \n";
    $linha .= "   { \n";
    $linha .= "      /** \n";
    $linha .= "       * Instancia objeto DAO \n";
    $linha .= "       */ \n";
    $linha .= "      \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "     /** \n";
    $linha .= "     * Define o id do registro para deletar \n";
    $linha .= "     */ \n";
    $linha .= "     \$model->setId_{$nomeTabela[0]}(\$_GET['id_{$nomeTabela[0]}']); \n";
    $linha .= "    /** \n";
    $linha .= "     * Seleciona arquivos para excluir \n";
    $linha .= "      */ \n";
    $linha .= "      \$obj = \$model->listPk(); \n";
    $linha .= "     /** \n";
    $linha .= "      * Tenta deletar \n";
    $linha .= "     */ \n";
    $linha .= "     if(\$model->delete()) \n";
    $linha .= "      { \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
         if(substr($nomeCampo['Field'],0,7) == 'arquivo'){
            $linha .= "            unlink(\"../upload/\".\$obj->" . ($nomeCampo['Field']) . "); \n";
        }
    }
    $linha .= "         /** \n";
    $linha .= "          * Registro deletado \n";
    $linha .= "          * Seta valores com parametros da pesquisa, se houver \n";
    $linha .= "          */ \n";

    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_SESSION['P{$nomeCampo['Field']}']); \n";
    }


    $linha .= "        /** \n";
    $linha .= "         * Define total de registros por página \n";
    $linha .= "         */ \n";
    $linha .= "       \$_SESSION['totalPorPg'] = 10; \n";
    $linha .= "        /** \n";
    $linha .= "         * Define ou atualiza a página de inicio \n";
    $linha .= "         */ \n";
    $linha .= "        if(\$_GET['inicio']) \$_SESSION['inicio'] = \$_GET['inicio'] * \$_SESSION['totalPorPg']; \n";
    $linha .= "        /** \n";
    $linha .= "         * Zera countAll \n";
    $linha .= "         */ \n";
    $linha .= "        \$_SESSION['countAll'] = \"\"; \n";
    $linha .= "        /** \n";
    $linha .= "         * Total de resultados relativos a pesquisa \n";
    $linha .= "        */ \n";
    $linha .= "      \$_SESSION['countFilter'] = \$model->countFilter(); \n";
    $linha .= "      /** \n";
    $linha .= "       * Busca resultados da página atual \n";
    $linha .= "       */ \n";
    $linha .= "      \$_SESSION['listFilter'] = \$model->listFilter(); \n";
    $linha .= "      /** \n";
    $linha .= "       * Redireciona para view correspondente \n";
    $linha .= "       */ \n";
    $linha .= "      header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= " } \n";
    $linha .= "  else \n";
    $linha .= "  { \n";
    $linha .= "      /** \n";
    $linha .= "       * Erro ao deletar o registro \n";
    $linha .= "       */ \n";
    $linha .= "       header(\"Location: ../view/backend/erro.php\"); \n";
    $linha .= "  } \n";
    $linha .= "   break; \n";
    $linha .= "  } \n";

    $linha .= " /** \n";
    $linha .= "  * caso deleteArquivo \n";
    $linha .= "  */ \n";
    $linha .= "   case 'deleteArquivo': \n";
    $linha .= "   { \n";
    $linha .= "      /** \n";
    $linha .= "       * Instancia objeto DAO \n";
    $linha .= "       */ \n";
    $linha .= "       \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "      /** \n";
    $linha .= "       * Define o id do registro para deletar o arquivo \n";
    $linha .= "      */ \n";
    $linha .= "      \$model->setId_" . ($nomeTabela[0]) . "(\$_GET['id_" . ($nomeTabela[0]) . "']); \n";
    $linha .= "     /** \n";
    $linha .= "      * Seleciona arquivos para excluir \n";
    $linha .= "      */ \n";
    $linha .= "       \$obj = \$model->listPk(); \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {    
        if(substr($nomeCampo['Field'],0,7) == 'arquivo')
        {
             $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(''); \n";
        }else{
            $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$obj->{$nomeCampo['Field']}); \n";
        }
        
    }

    $linha .= "        /** \n";
    $linha .= "        * Tenta atualizar \n";
    $linha .= "         */ \n";
    $linha .= "         if(\$model->update()) \n";
    $linha .= "         { \n";
    $linha .= "             /** \n";
    $linha .= "             * Registro deletado \n";
    $linha .= "             * Seta valores com parametros da pesquisa, se houver \n";
    $linha .= "             */ \n";
    $linha .= "             unlink(\"../upload/\".\$obj->arquivo_arquivo);  \n";
    $linha .= "            /** \n";
    $linha .= "             * Zera \$_SESSION['']->arquivo_ \n";
    $linha .= "             */ \n";
    $linha .= "            /** \n";
    $linha .= "             * Redireciona para view correspondente \n";
    $linha .= "             */ \n";
    $linha .= "            header(\"Location: ../view/backend/update" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "        } \n";
    $linha .= "         else \n";
    $linha .= "        { \n";
    $linha .= "            /** \n";
    $linha .= "             * Erro ao deletar o registro \n";
    $linha .= "             */ \n";
    $linha .= "             header(\"Location: ../view/backend/erro.html\"); \n";
    $linha .= "        } \n";
    $linha .= "        break; \n";
    $linha .= "    } \n";

    $linha .= "   /** \n";
    $linha .= "    * caso delete Todos \n";
    $linha .= "    */ \n";
    $linha .= "    case 'deleteAll': \n";
    $linha .= "    { \n";
    $linha .= "      /** \n";
    $linha .= "       * Instancia objeto DAO \n";
    $linha .= "      */ \n";
    $linha .= "      \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "     /** \n";
    $linha .= "      * percorre array para deletar \n";
    $linha .= "      */ \n";
    $linha .= "      foreach (\$_POST['id_" . ($nomeTabela[0]) . "'] as \$id_" . ucfirst($nomeTabela[0]) . ") \n";
    $linha .= "       { \n";
    $linha .= "           /** \n";
    $linha .= "           * seta o valor do ID a ser deletado \n";
    $linha .= "            */ \n";
    $linha .= "           \$model->setId_" . ($nomeTabela[0]) . "(\$id_" . ucfirst($nomeTabela[0]) . "); \n";
    $linha .= "           /** \n";
    $linha .= "            * Seleciona arquivos para excluir \n";
    $linha .= "           */ \n";
    $linha .= "           \$obj = \$model->listPk(); \n";
    $linha .= "          /** \n";
    $linha .= "            * deleta o registro \n";
    $linha .= "            */ \n";
    $linha .= "           \$model->delete(); \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {         
         if(substr($nomeCampo['Field'],0,7) == 'arquivo'){         
            $linha .= "            unlink(\"../upload/\".\$obj->" . ($nomeCampo['Field']) . "); \n";
        }
    }

    $linha .= "       } \n";
    $linha .= "       /** \n";
    $linha .= "        * Seta valores com parametros da pesquisa, se houver \n";
    $linha .= "        */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_SESSION['P{$nomeCampo['Field']}']); \n";
    }

    $linha .= "        /** \n";
    $linha .= "         * define total de registros por página \n";
    $linha .= "         */ \n";
    $linha .= "        \$_SESSION['totalPorPg'] = 10; \n";
    $linha .= "        /** \n";
    $linha .= "         * Define ou atualiza a página de inicio \n";
    $linha .= "         */ \n";
    $linha .= "        if(\$_GET['inicio']) \$_SESSION['inicio'] = \$_GET['inicio'] * \$_SESSION['totalPorPg']; \n";
    $linha .= "        /** \n";
    $linha .= "         * Zera countAll \n";
    $linha .= "         */ \n";
    $linha .= "       \$_SESSION['countAll'] = \"\"; \n";
    $linha .= "        /** \n";
    $linha .= "         * Total de resultados relativos a pesquisa \n";
    $linha .= "         */ \n";
    $linha .= "        \$_SESSION['countFilter'] = \$model->countFilter(); \n";
    $linha .= "        /** \n";
    $linha .= "         * Busca resultados da página atual \n";
    $linha .= "         */ \n";
    $linha .= "        \$_SESSION['listFilter'] = \$model->listFilter(); \n";
    $linha .= "       /** \n";
    $linha .= "        * Redireciona para view correspondente \n";
    $linha .= "        */ \n";
    $linha .= "       header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "       break; \n";
    $linha .= "   } \n";

    $linha .= "  /** \n";
    $linha .= "   * caso update \n";
    $linha .= "   */ \n";
    $linha .= "   case 'update': \n";
    $linha .= "   { \n";
    $linha .= "      /** \n";
    $linha .= "       * Instancia objeto DAO \n";
    $linha .= "       */ \n";
    $linha .= "      \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "      /** \n";
    $linha .= "       * seta valores vindos do formulário \n";
    $linha .= "       */ \n";
    $linha .= "       \$model->setId_" . ($nomeTabela[0]) . "(\$_POST['id_" . ($nomeTabela[0]) . "']); \n";
    $linha .= "      /** \n";
    $linha .= "       * seleciona objeto que será atualizado \n";
    $linha .= "       */ \n";
    $linha .= "       \$obj = \$model->listPK(); \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        if ($nomeCampo['Field'] == 'arquivo_arquivo')
        {
            $linha .= "           if(\$_FILES['{$nomeCampo['Field']}']['name']) \n";
            $linha .= "           { \n";
            $linha .= "             \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_FILES['{$nomeCampo['Field']}']['name']); \n";
            $linha .= "              move_uploaded_file(\$_FILES['{$nomeCampo['Field']}']['tmp_name'], \"../upload/\" . \$model->get" . ucfirst($nomeCampo['Field']) . "());   \n";
            $linha .= "              unlink(\"../upload/\".\$obj->" . ($nomeCampo['Field']) . "); \n";
            $linha .= "           }else{ \n";
            $linha .= "             \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_POST['{$nomeCampo['Field']}Old']); \n";
            $linha .= "           } \n";
        }
        else
        {
            $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_POST['{$nomeCampo['Field']}']); \n";
        }
    }

    $linha .= "      /** \n";
    $linha .= "       * tenta atualizar \n";
    $linha .= "       */ \n";
    $linha .= "       if(\$model->update()) \n";
    $linha .= "       { \n";
    $linha .= "           /** \n";
    $linha .= "            * atualizado com sucesso \n";
    $linha .= "            * Seta valores com parametros da pesquisa, se houver \n";
    $linha .= "            */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "           \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_SESSION['P{$nomeCampo['Field']}']); \n";
    }

    $linha .= "          /** \n";
    $linha .= "           * define total de registros por página \n";
    $linha .= "           */ \n";
    $linha .= "         \$_SESSION['totalPorPg'] = 10; \n";
    $linha .= "         /** \n";
    $linha .= "            * Define ou atualiza a página de inicio \n";
    $linha .= "             */ \n";
    $linha .= "            if(\$_GET['inicio']) \$_SESSION['inicio'] = \$_GET['inicio'] * \$_SESSION['totalPorPg']; \n";
    $linha .= "            /** \n";
    $linha .= "             * Zera countAll \n";
    $linha .= "             */ \n";
    $linha .= "            \$_SESSION['countAll'] = \"\"; \n";
    $linha .= "            /** \n";
    $linha .= "             * Total de resultados relativos a pesquisa \n";
    $linha .= "            */ \n";
    $linha .= "            \$_SESSION['countFilter'] = \$model->countFilter(); \n";
    $linha .= "            /** \n";
    $linha .= "             * Busca resultados da página atual \n";
    $linha .= "             */ \n";
    $linha .= "            \$_SESSION['listFilter'] = \$model->listFilter(); \n";
    $linha .= "             /** \n";
    $linha .= "             * Redireciona para view correspondente \n";
    $linha .= "              */ \n";
    $linha .= "            header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "        } \n";
    $linha .= "        else \n";
    $linha .= "        { \n";
    $linha .= "            /** \n";
    $linha .= "            * erro no update \n";
    $linha .= "            */ \n";
    $linha .= "            header(\"Location: ../view/backend/erro.html\"); \n";
    $linha .= "       } \n";
    $linha .= "       break; \n";
    $linha .= "   } \n";

    $linha .= "   /** \n";
    $linha .= "    * caso listAll \n";
    $linha .= "    */ \n";
    $linha .= "    case 'listAll': \n";
    $linha .= "    { \n";
    $linha .= "       /** \n";
    $linha .= "        * Instancia objeto DAO \n";
    $linha .= "       */ \n";
    $linha .= "       \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "     /** \n";
    $linha .= "      * zera valores de pesquisa \n";
    $linha .= "      */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "        \$_SESSION['P{$nomeCampo['Field']}'] = \"\"; \n";
        $linha .= "        \$model->set{$nomeCampo['Field']}(\"\"); \n";
    }

    $linha .= "       /** \n";
    $linha .= "        * define total de registros por página \n";
    $linha .= "        */ \n";
    $linha .= "       \$_SESSION['totalPorPg'] = 10; \n";
    $linha .= "       /** \n";
    $linha .= "        * Define inicio como 0 \n";
    $linha .= "        */ \n";
    $linha .= "       \$_SESSION['inicio'] = 0; \n";
    $linha .= "       /** \n";
    $linha .= "        * Define ou atualiza a página de inicio \n";
    $linha .= "        */ \n";
    $linha .= "        if(\$_GET['inicio']) \$_SESSION['inicio'] = \$_GET['inicio'] * \$_SESSION['totalPorPg']; \n";
    $linha .= "      /** \n";
    $linha .= "       * zera count filter \n";
    $linha .= "        */ \n";
    $linha .= "       \$_SESSION['countFilter'] = \"\"; \n";
    $linha .= "       /** \n";
    $linha .= "        * define cont all \n";
    $linha .= "        */ \n";
    $linha .= "      \$_SESSION['countAll'] = \$model->countAll(); \n";
    $linha .= "       /** \n";
    $linha .= "       * lista todos os registros \n";
    $linha .= "        */ \n";
    $linha .= "       \$_SESSION['listFilter'] = \$model->listAll(); \n";
    $linha .= "       /** \n";
    $linha .= "        * Redireciona para view correspondente \n";
    $linha .= "        */ \n";
    $linha .= "        header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "        break; \n";
    $linha .= "    } \n";

    $linha .= "   /** \n";
    $linha .= "    * caso listFilter \n";
    $linha .= "    */ \n";
    $linha .= "    case 'listFilter': \n";
    $linha .= "    { \n";
    $linha .= "       /** \n";
    $linha .= "        * Instancia objeto DAO \n";
    $linha .= "        */ \n";
    $linha .= "        \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "       /** \n";
    $linha .= "       * zera valores de pesquisa \n";
    $linha .= "       */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "        \$_SESSION['P{$nomeCampo['Field']}'] = \"\"; \n";
        $linha .= "        \$model->set" . ucfirst($nomeCampo['Field']) . "(\"\"); \n";
    }

    $linha .= "       /** \n";
    $linha .= "         * Define valores \n";
    $linha .= "         */ \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo)
    {
        $linha .= "       if(!\$_SESSION['P{$nomeCampo['Field']}'])\$_SESSION['P{$nomeCampo['Field']}'] = \$_POST['{$nomeCampo['Field']}P']; \n";
        $linha .= "        \$model->set" . ucfirst($nomeCampo['Field']) . "(\$_SESSION['P{$nomeCampo['Field']}']); \n";
    }

    $linha .= "        /** \n";
    $linha .= "         * define total de registros por página \n";
    $linha .= "         */ \n";
    $linha .= "       \$_SESSION['totalPorPg'] = 10; \n";
    $linha .= "       /** \n";
    $linha .= "         * define inicio como 0 \n";
    $linha .= "         */ \n";
    $linha .= "        \$_SESSION['inicio'] = 0; \n";
    $linha .= "        /** \n";
    $linha .= "         * Define ou atualiza a página de inicio \n";
    $linha .= "         */ \n";
    $linha .= "        if(\$_GET['inicio']) \$_SESSION['inicio'] = \$_GET['inicio'] * \$_SESSION['totalPorPg']; \n";
    $linha .= "        /** \n";
    $linha .= "         * zera count all \n";
    $linha .= "         */ \n";
    $linha .= "        \$_SESSION['countAll'] = \"\"; \n";
    $linha .= "        /** \n";
    $linha .= "         * define cont filter \n";
    $linha .= "         */ \n";
    $linha .= "       \$_SESSION['countFilter'] = \$model->countFilter(); \n";
    $linha .= "       /** \n";
    $linha .= "         * lista os registro do filtro \n";
    $linha .= "        */ \n";
    $linha .= "        \$_SESSION['listFilter'] = \$model->listFilter(); \n";
    $linha .= "        /** \n";
    $linha .= "         * verifica se listou algum registro \n";
    $linha .= "         */ \n";
    $linha .= "        if(\$_SESSION['listFilter']) \n";
    $linha .= "        { \n";
    $linha .= "            /** \n";
    $linha .= "             * Redireciona para view correspondente \n";
    $linha .= "             */ \n";
    $linha .= "            header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "        } \n";
    $linha .= "        else \n";
    $linha .= "       { \n";
    $linha .= "            /** \n";
    $linha .= "            * Redireciona para view correspondente \n";
    $linha .= "             */ \n";
    $linha .= "            header(\"Location: ../view/backend/list" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "       } \n";
    $linha .= "        break; \n";
    $linha .= "   } \n";

    $linha .= "   /** \n";
    $linha .= "    * caso detalhes \n";
    $linha .= "   */ \n";
    $linha .= "   case 'details': \n";
    $linha .= "   { \n";
    $linha .= "      /** \n";
    $linha .= "       * Instancia objeto DAO \n";
    $linha .= "       */ \n";
    $linha .= "       \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "      /** \n";
    $linha .= "       * define valor do id \n";
    $linha .= "       */ \n";
    $linha .= "     \$model->setId_{$nomeTabela[0]}(\$_GET['id_{$nomeTabela[0]}']); \n";
    $linha .= "     /** \n";
    $linha .= "      * lista o registro \n";
    $linha .= "      */ \n";
    $linha .= "     \$_SESSION['listPk'] = \$model->listPk(); \n";
    $linha .= "      /** \n";
    $linha .= "        * testa se foi listado algum registro \n";
    $linha .= "       */ \n";
    $linha .= "       if(\$_SESSION['listPk']) \n";
    $linha .= "       { \n";
    $linha .= "          /** \n";
    $linha .= "           * sucesso, redirecinapara view detalhe \n";
    $linha .= "           */ \n";
    $linha .= "           header(\"Location: ../view/backend/details" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "       } \n";
    $linha .= "       else \n";
    $linha .= "       { \n";
    $linha .= "          /** \n";
    $linha .= "           * erro \n";
    $linha .= "           */ \n";
    $linha .= "           header(\"Location: ../view/backend/erro.html\"); \n";
    $linha .= "       } \n";
    $linha .= "       break; \n";
    $linha .= "  } \n";
    $linha .= "  /** \n";
    $linha .= "   * caso listPk \n";
    $linha .= "   */ \n";
    $linha .= "   case 'listPk': \n";
    $linha .= "  { \n";
    $linha .= "     /** \n";
    $linha .= "      * Instancia objeto DAO \n";
    $linha .= "     */ \n";
    $linha .= "     \$model = new " . ucfirst($nomeTabela[0]) . "DAO(); \n";
    $linha .= "     /** \n";
    $linha .= "     * define valor do id \n";
    $linha .= "     */ \n";
    $linha .= "    \$model->setId_" . ucfirst($nomeTabela[0]) . "(\$_GET['id_{$nomeTabela[0]}']); \n";
    $linha .= "   /** \n";
    $linha .= "     * lista o registro \n";
    $linha .= "      */ \n";
    $linha .= "      \$_SESSION['listPk'] = \$model->listPk(); \n";
    $linha .= "     /** \n";
    $linha .= "      * teste se foi listado algum resgitro \n";
    $linha .= "      */ \n";
    $linha .= "     if(\$_SESSION['listPk']) \n";
    $linha .= "     { \n";
    $linha .= "         /** \n";
    $linha .= "          * sucesso, redireciona para view correspondente \n";
    $linha .= "          */ \n";
    $linha .= "          header(\"Location: ../view/backend/update" . ucfirst($nomeTabela[0]) . ".view.php\"); \n";
    $linha .= "      } \n";
    $linha .= "      else \n";
    $linha .= "      { \n";
    $linha .= "         /** \n";
    $linha .= "          * erro \n";
    $linha .= "          */ \n";
    $linha .= "          header(\"Location: ../view/backend/erro.html\"); \n";
    $linha .= "      } \n";
    $linha .= "      break; \n";
    $linha .= "  } \n";
    $linha .= "} \n";
    $linha .= " } \n";

    $linha .= "} \n";


    $linha .= "\$Controller = new " . ucfirst($nomeTabela[0]) . "Controller(); \n\n";

    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);
}

