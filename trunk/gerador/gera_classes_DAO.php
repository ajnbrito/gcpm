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
    $nomeArquivo = "app/model/" . ucfirst($nomeTabela[0]) . "DAO.class.php";

    $linha = "<?php \n";
    $linha .= "/** \n";
    $linha .= " * Descrição da classe \n";
    $linha .= " * @author Marcelo Jaques \n";
    $linha .= " * @version 1.0 \n";
    $linha .= " * @package models \n";
    $linha .= " * @name {$nomeTabela[0]} \n";
    $linha .= " */ \n\n";

    $linha .= "include_once \"Conexao.class.php\"; \n";
    $linha .= "include_once \"" . ucfirst($nomeTabela[0]) . ".class.php\"; \n\n";
    $linha .= "class " . ucfirst($nomeTabela[0]) . "DAO extends " . ucfirst($nomeTabela[0]) . " \n{\n";

    /*
     * Atributo conexao
     */
    $linha .= "    /** \n";
    $linha .= "     * @access public \n";
    $linha .= "     * @var Conexão \n";
    $linha .= "     */ \n";
    $linha .= "    public \$Conexao; \n";

    /*
     * método construtor
     */
    $linha .= "    function __construct() { \n";
    $linha .= "        \$this->Conexao = new Conexao(); \n";
    $linha .= "    } \n\n";

    if ($nomeTabela[0] == "usuario") {

        $linha .= "   /** \n";
        $linha .= "    * @method login  \n";
        $linha .= "    */ \n";
        $linha .= "    function login() { \n";
        $linha .= "        \$stmt = \$this->Conexao->pdo->prepare(\"SELECT  * FROM usuario  WHERE usuario = :usuario AND senha = :senha\"); \n";
        $linha .= "        \$stmt->BindParam(':usuario', \$this->getUsuario(), PDO::PARAM_INT); \n";
        $linha .= "        \$stmt->BindParam(':senha', \$this->getSenha(), PDO::PARAM_INT); \n";
        $linha .= "        \$stmt->execute(); \n";
        $linha .= "        \$obj = \$stmt->fetchObject(); \n";
        $linha .= "         return \$obj; \n";
        $linha .= "    } \n";
    }

    /*
     * insert
     */

    $linha .= "/** \n";
    $linha .= " * @method insert \n";
    $linha .= " * @return bool true or false \n";
    $linha .= " */ \n";
    $linha .= "function insert() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"INSERT INTO {$nomeTabela[0]} (";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= " {$nomeCampo['Field']} ";
        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }
    $linha .= ") VALUES (";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        if (substr($nomeCampo['Field'], 0, 4) == "data") {
            
            $linha .= " STR_TO_DATE(:{$nomeCampo['Field']},'%d/%m/%Y')";
        } else {
            $linha .= ":{$nomeCampo['Field']} ";
        }
        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }
    
    $linha .= ")\"); \n";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $excampo = explode("(", $nomeCampo['Type']);
        $tipo = $excampo[0];
        $extamanho = explode(")", $excampo[1]);
        $tamanho = $extamanho[0];
        switch ($tipo) {
            case 'int':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \$this->get".ucfirst($nomeCampo['Field'])."(),PDO::PARAM_INT, {$tamanho}); \n";
                break;
            case 'varchar':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \$this->get".ucfirst($nomeCampo['Field'])."(),PDO::PARAM_STR, {$tamanho}); \n";
                break;
            default :
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \$this->get".ucfirst($nomeCampo['Field'])."(),PDO::PARAM_STR); \n";
                break;
        }
    }
    $linha .= "    if (\$stmt->execute()) { \n";
    $linha .= "        return true; \n";
    $linha .= "    } else { \n";
    $linha .= "        return false; \n";
    $linha .= "    } \n";
    $linha .= "} \n";

    $linha .= "/** \n";
    $linha .= " * @method delete \n";
    $linha .= " * @return bool true or false \n";
    $linha .= " */ \n";
    $linha .= "function delete() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"DELETE FROM {$nomeTabela[0]} WHERE id_{$nomeTabela[0]} = :id_{$nomeTabela[0]}\"); \n";
    $linha .= "    \$stmt->BindParam(':id_{$nomeTabela[0]}', \$this->getId_{$nomeTabela[0]}(), PDO::PARAM_INT); \n";
    $linha .= "    if (\$stmt->execute()) { \n";
    $linha .= "        return true; \n";
    $linha .= "    } else { \n";
    $linha .= "        return false; \n";
    $linha .= "    } \n";
    $linha .= "} \n";



    $linha .= "/** \n";
    $linha .= " * @method update \n";
    $linha .= " * @return bool true or false \n";
    $linha .= " */ \n";
    $linha .= "function update() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"UPDATE {$nomeTabela[0]} SET ";


    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        if (substr($nomeCampo['Field'], 0, 4) == "data") {
            
            $linha .= " {$nomeCampo['Field']} = STR_TO_DATE(:{$nomeCampo['Field']},'%d/%m/%Y')";
        } else {
            $linha .= " {$nomeCampo['Field']} = :{$nomeCampo['Field']} ";
        }
        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }

    $linha .= " WHERE id_{$nomeTabela[0]} = :id_{$nomeTabela[0]} ";
    $linha .= "\"); \n";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $excampo = explode("(", $nomeCampo['Type']);
        $tipo = $excampo[0];
        $extamanho = explode(")", $excampo[1]);
        $tamanho = $extamanho[0];
        switch ($tipo) {
            case 'int':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \$this->get".ucfirst($nomeCampo['Field'])."(),PDO::PARAM_INT, {$tamanho}); \n";
                break;
            case 'varchar':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \$this->get".ucfirst($nomeCampo['Field'])."(),PDO::PARAM_STR, {$tamanho}); \n";
                break;
            default :
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \$this->get".ucfirst($nomeCampo['Field'])."(),PDO::PARAM_STR); \n";
                break;
        }
    }
    $linha .= "    if (\$stmt->execute()) { \n";
    $linha .= "        return true; \n";
    $linha .= "   } else { \n";
    $linha .= "        return false; \n";
    $linha .= "    } \n";
    $linha .= "} \n";


    $linha .= "/** \n";
    $linha .= " * @method listAll \n";
    $linha .= " * @return PDO_Object listAll \n";
    $linha .= " */ \n";
    $linha .= "function listAll() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"SELECT ";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        if (substr($nomeCampo['Field'], 0, 4) == "data") {
            $linha .= " DATE_FORMAT({$nomeCampo['Field']},'%d/%m/%Y') as {$nomeCampo['Field']} ";
        } else {
            $linha .= " {$nomeCampo['Field']} ";
        }


        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }

    $linha .= " FROM {$nomeTabela[0]} LIMIT \" . \$_SESSION['inicio'] . \",\" . \$_SESSION['totalPorPg']); \n";
    $linha .= "    \$stmt->execute(); \n";
    $linha .= "    \$obj = \$stmt->fetchAll(); \n";
    $linha .= "    return \$obj; \n";
    $linha .= "} \n";


    $linha .= "/** \n";
    $linha .= " * @method listAllFull \n";
    $linha .= " * @return PDO_Object listAllFull \n";
    $linha .= " */ \n";
    $linha .= "function listAllFull() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"SELECT ";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        if (substr($nomeCampo['Field'], 0, 4) == "data") {
            $linha .= " DATE_FORMAT({$nomeCampo['Field']},'%d/%m/%Y') as {$nomeCampo['Field']} ";
        } else {
            $linha .= " {$nomeCampo['Field']} ";
        }


        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }
    $linha .= " FROM {$nomeTabela[0]}\"); \n";
    $linha .= "    \$stmt->execute(); \n";
    $linha .= "    \$obj = \$stmt->fetchAll(); \n";
    $linha .= "    return \$obj; \n";
    $linha .= "} \n";

    $linha .= "/** \n";
    $linha .= " * @method countAll \n";
    $linha .= " * @return PDO_Object countAll \n";
    $linha .= " */ \n";
    $linha .= "function countAll() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"SELECT COUNT(id_{$nomeTabela[0]}) as total FROM {$nomeTabela[0]}\"); \n";
    $linha .= "    \$stmt->execute(); \n";
    $linha .= "    \$obj = \$stmt->fetchAll(); \n";
    $linha .= "    return \$obj; \n";
    $linha .= "} \n";

    $linha .= "/** \n";
    $linha .= " * @method listar por PK \n";
    $linha .= " * @return PDO_Object listPk \n";
    $linha .= " */ \n";
    $linha .= "function listPk() { \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\"SELECT ";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        if (substr($nomeCampo['Field'], 0, 4) == "data") {
            $linha .= " DATE_FORMAT({$nomeCampo['Field']},'%d/%m/%Y') as {$nomeCampo['Field']} ";
        } else {
            $linha .= " {$nomeCampo['Field']} ";
        }


        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }
    $linha .= " FROM {$nomeTabela[0]} WHERE id_{$nomeTabela[0]} = :id_{$nomeTabela[0]}\"); \n";
    $linha .= "    \$stmt->BindParam(':id_{$nomeTabela[0]}', \$this->getId_{$nomeTabela[0]}(), PDO::PARAM_INT); \n";
    $linha .= "    \$stmt->execute(); \n";
    $linha .= "    \$obj = \$stmt->fetchObject(); \n";
    $linha .= "    return \$obj; \n";
    $linha .= "} \n";


    $linha .= "/** \n";
    $linha .= " * @method lista com filtro \n";
    $linha .= " * @return PDO_Object listFilter \n";
    $linha .= " */ \n";
    $linha .= "function listFilter() { \n";

    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    \${$nomeCampo['Field']} = '%' . \$this->get" . ucfirst($nomeCampo['Field']) . "() . '%'; \n ";
    }

    $linha .= "    \$sql = \"SELECT  ";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
       
       $linha .= " {$nomeCampo['Field']} ";
       if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }
    $linha .= "\"; \n";

    $linha .= "    \$sql .= \" FROM {$nomeTabela[0]} WHERE 1=1 \"; \n";

    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {

         if (substr($nomeCampo['Field'], 0, 4) == "data") {
            
            $linha .= "    if (\$this->get" . ucfirst($nomeCampo['Field']) . "()) { \n";
        $linha .= "        \$sql .= \" AND {$nomeCampo['Field']} LIKE STR_TO_DATE(:{$nomeCampo['Field']},'%d/%m/%Y') \"; \n";
        $linha .= "    } \n";
        } else {
            $linha .= "    if (\$this->get" . ucfirst($nomeCampo['Field']) . "()) { \n";
        $linha .= "        \$sql .= \" AND {$nomeCampo['Field']} LIKE :{$nomeCampo['Field']} \"; \n";
        $linha .= "    } \n";
        }

        
    }
    $linha .= "    \$sql .= \" LIMIT \" . \$_SESSION['inicio'] . \",\" . \$_SESSION['totalPorPg']; \n";
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\$sql); \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    if (\$this->get" . ucfirst($nomeCampo['Field']) . "()) { \n";
        $ex = explode("(", $nomeCampo['Type']);
        $ex2 = explode(")", $ex[1]);
        switch ($ex[0]) {
            case 'int':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \${$nomeCampo['Field']},PDO::PARAM_INT, {$ex2[0]}); \n";
                break;
            case 'varchar':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \${$nomeCampo['Field']},PDO::PARAM_STR, {$ex2[0]}); \n";
                break;
            default :
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \${$nomeCampo['Field']},PDO::PARAM_STR); \n";
                break;
        }

        $linha .= "    } \n";
    }

    $linha .= "    \$stmt->execute(); \n";
    $linha .= "   \$obj = \$stmt->fetchAll(); \n";
    $linha .= "   return \$obj; \n";
    $linha .= "} \n";


    $linha .= "/** \n";
    $linha .= " * @method conta com filtro \n";
    $linha .= " * @return PDO_Object countFilter \n";
    $linha .= " */ \n";
    $linha .= "function countFilter() { \n";

    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    \${$nomeCampo['Field']} = '%' . \$this->get" . ucfirst($nomeCampo['Field']) . "() . '%'; \n ";
    }

    $linha .= "    \$sql = \"SELECT  COUNT(1) as total\"; \n ";
    $linha .= "    \$sql .= \" FROM {$nomeTabela[0]} WHERE 1=1 \"; \n";

    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    if (\$this->get" . ucfirst($nomeCampo['Field']) . "()) { \n";
        $linha .= "        \$sql .= \" AND {$nomeCampo['Field']} LIKE :{$nomeCampo['Field']} \"; \n";
        $linha .= "    } \n";
    }
    $linha .= "    \$stmt = \$this->Conexao->pdo->prepare(\$sql); \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    if (\$this->get" . ucfirst($nomeCampo['Field']) . "()) { \n";
        $ex = explode("(", $nomeCampo['Type']);
        $ex2 = explode(")", $ex[1]);
        switch ($ex[0]) {
            case 'int':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \${$nomeCampo['Field']},PDO::PARAM_INT, {$ex2[0]}); \n";
                break;
            case 'varchar':
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \${$nomeCampo['Field']},PDO::PARAM_STR, {$ex2[0]}); \n";
                break;
            default :
                $linha .= "        \$stmt->BindParam(':{$nomeCampo['Field']}', \${$nomeCampo['Field']},PDO::PARAM_STR); \n";
                break;
        }

        $linha .= "    } \n";
    }

    $linha .= "    \$stmt->execute(); \n";
    $linha .= "   \$obj = \$stmt->fetchAll(); \n";
    $linha .= "   return \$obj; \n";
    $linha .= "} \n";


    $linha .= "/** \n";
    $linha .= " * @method combobox \n";
    $linha .= "* @param int id do registro selecionado \n";
    $linha .= " */ \n";
    $linha .= "function combobox(\$selected) { \n";
    $linha .= "    \$obj = \$this->listAll(); \n";
    $linha .= "    echo \"<select name='fk_{$nomeTabela[0]}' size='1' id='fk_{$nomeTabela[0]}'>\"; \n";
    $linha .= "    echo \"     <option value=''>Selecione...</option>\"; \n";
    $linha .= "    foreach (\$obj as \$campo) { \n";
    $linha .= "        if (\$campo[0] == \$selected) { \n";
    $linha .= "            echo \"     <option value='\" . \$campo[0] . \"' selected>\" . \$campo[1] . \"</option>\"; \n";
    $linha .= "        } else { \n";
    $linha .= "            echo \"     <option value='\" . \$campo[0] . \"' >\" . \$campo[1] . \"</option>\"; \n";
    $linha .= "        } \n";
    $linha .= "    } \n";
    $linha .= "    echo \"</select>\"; \n";
    $linha .= "} \n";


    $linha .= "/** \n";
    $linha .= " * @method combobox \n";
    $linha .= "* @param int id do registro selecionado \n";
    $linha .= " */ \n";
    $linha .= "function comboboxP(\$selected) { \n";
    $linha .= "    \$obj = \$this->listAll(); \n";
    $linha .= "    echo \"<select name='fk_{$nomeTabela[0]}P' size='1' id='fk_{$nomeTabela[0]}P'>\"; \n";
    $linha .= "    echo \"     <option value=''>Selecione...</option>\"; \n";
    $linha .= "    foreach (\$obj as \$campo) { \n";
    $linha .= "        if (\$campo[0] == \$selected) { \n";
    $linha .= "            echo \"     <option value='\" . \$campo[0] . \"' selected>\" . \$campo[1] . \"</option>\"; \n";
    $linha .= "        } else { \n";
    $linha .= "            echo \"     <option value='\" . \$campo[0] . \"' >\" . \$campo[1] . \"</option>\"; \n";
    $linha .= "        } \n";
    $linha .= "    } \n";
    $linha .= "    echo \"</select>\"; \n";
    $linha .= "} \n";

    $linha .= "    /** \n";
    $linha .= "     * Novas funções devem ser declaradas abaixo \n";
    $linha .= "     */ \n";
    $linha .= "} \n";

    $linha .= "\$DAO = new " . ucfirst($nomeTabela[0]) . "DAO(); \n\n";

    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);
}

