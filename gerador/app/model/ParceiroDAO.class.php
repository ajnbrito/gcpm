<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name parceiro 
 */ 

include_once "Conexao.class.php"; 
include_once "Parceiro.class.php"; 

class ParceiroDAO extends Parceiro 
{
    /** 
     * @access public 
     * @var Conexão 
     */ 
    public $Conexao; 
    function __construct() { 
        $this->Conexao = new Conexao(); 
    } 

/** 
 * @method insert 
 * @return bool true or false 
 */ 
function insert() { 
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO parceiro ( id_parceiro  ,  fk_id_usuario  ,  nome  ,  texto_descricao  ,  link  ,  arquivo_logo ) VALUES (:id_parceiro  , :fk_id_usuario  , :nome  , :texto_descricao  , :link  , :arquivo_logo )"); 
        $stmt->BindParam(':id_parceiro', $this->getId_parceiro(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':nome', $this->getNome(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_descricao', $this->getTexto_descricao(),PDO::PARAM_STR); 
        $stmt->BindParam(':link', $this->getLink(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':arquivo_logo', $this->getArquivo_logo(),PDO::PARAM_STR, 255); 
    if ($stmt->execute()) { 
        return true; 
    } else { 
        return false; 
    } 
} 
/** 
 * @method delete 
 * @return bool true or false 
 */ 
function delete() { 
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM parceiro WHERE id_parceiro = :id_parceiro"); 
    $stmt->BindParam(':id_parceiro', $this->getId_parceiro(), PDO::PARAM_INT); 
    if ($stmt->execute()) { 
        return true; 
    } else { 
        return false; 
    } 
} 
/** 
 * @method update 
 * @return bool true or false 
 */ 
function update() { 
    $stmt = $this->Conexao->pdo->prepare("UPDATE parceiro SET  id_parceiro = :id_parceiro  ,  fk_id_usuario = :fk_id_usuario  ,  nome = :nome  ,  texto_descricao = :texto_descricao  ,  link = :link  ,  arquivo_logo = :arquivo_logo  WHERE id_parceiro = :id_parceiro "); 
        $stmt->BindParam(':id_parceiro', $this->getId_parceiro(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':nome', $this->getNome(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_descricao', $this->getTexto_descricao(),PDO::PARAM_STR); 
        $stmt->BindParam(':link', $this->getLink(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':arquivo_logo', $this->getArquivo_logo(),PDO::PARAM_STR, 255); 
    if ($stmt->execute()) { 
        return true; 
   } else { 
        return false; 
    } 
} 
/** 
 * @method listAll 
 * @return PDO_Object listAll 
 */ 
function listAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_parceiro  ,  fk_id_usuario  ,  nome  ,  texto_descricao  ,  link  ,  arquivo_logo  FROM parceiro LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_parceiro  ,  fk_id_usuario  ,  nome  ,  texto_descricao  ,  link  ,  arquivo_logo  FROM parceiro"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_parceiro) as total FROM parceiro"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_parceiro  ,  fk_id_usuario  ,  nome  ,  texto_descricao  ,  link  ,  arquivo_logo  FROM parceiro WHERE id_parceiro = :id_parceiro"); 
    $stmt->BindParam(':id_parceiro', $this->getId_parceiro(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_parceiro = '%' . $this->getId_parceiro() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $nome = '%' . $this->getNome() . '%'; 
     $texto_descricao = '%' . $this->getTexto_descricao() . '%'; 
     $link = '%' . $this->getLink() . '%'; 
     $arquivo_logo = '%' . $this->getArquivo_logo() . '%'; 
     $sql = "SELECT   id_parceiro  ,  fk_id_usuario  ,  nome  ,  texto_descricao  ,  link  ,  arquivo_logo "; 
    $sql .= " FROM parceiro WHERE 1=1 "; 
    if ($this->getId_parceiro()) { 
        $sql .= " AND id_parceiro LIKE :id_parceiro "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getNome()) { 
        $sql .= " AND nome LIKE :nome "; 
    } 
    if ($this->getTexto_descricao()) { 
        $sql .= " AND texto_descricao LIKE :texto_descricao "; 
    } 
    if ($this->getLink()) { 
        $sql .= " AND link LIKE :link "; 
    } 
    if ($this->getArquivo_logo()) { 
        $sql .= " AND arquivo_logo LIKE :arquivo_logo "; 
    } 
    $sql .= " LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']; 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_parceiro()) { 
        $stmt->BindParam(':id_parceiro', $id_parceiro,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getNome()) { 
        $stmt->BindParam(':nome', $nome,PDO::PARAM_STR, 255); 
    } 
    if ($this->getTexto_descricao()) { 
        $stmt->BindParam(':texto_descricao', $texto_descricao,PDO::PARAM_STR); 
    } 
    if ($this->getLink()) { 
        $stmt->BindParam(':link', $link,PDO::PARAM_STR, 255); 
    } 
    if ($this->getArquivo_logo()) { 
        $stmt->BindParam(':arquivo_logo', $arquivo_logo,PDO::PARAM_STR, 255); 
    } 
    $stmt->execute(); 
   $obj = $stmt->fetchAll(); 
   return $obj; 
} 
/** 
 * @method conta com filtro 
 * @return PDO_Object countFilter 
 */ 
function countFilter() { 
    $id_parceiro = '%' . $this->getId_parceiro() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $nome = '%' . $this->getNome() . '%'; 
     $texto_descricao = '%' . $this->getTexto_descricao() . '%'; 
     $link = '%' . $this->getLink() . '%'; 
     $arquivo_logo = '%' . $this->getArquivo_logo() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM parceiro WHERE 1=1 "; 
    if ($this->getId_parceiro()) { 
        $sql .= " AND id_parceiro LIKE :id_parceiro "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getNome()) { 
        $sql .= " AND nome LIKE :nome "; 
    } 
    if ($this->getTexto_descricao()) { 
        $sql .= " AND texto_descricao LIKE :texto_descricao "; 
    } 
    if ($this->getLink()) { 
        $sql .= " AND link LIKE :link "; 
    } 
    if ($this->getArquivo_logo()) { 
        $sql .= " AND arquivo_logo LIKE :arquivo_logo "; 
    } 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_parceiro()) { 
        $stmt->BindParam(':id_parceiro', $id_parceiro,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getNome()) { 
        $stmt->BindParam(':nome', $nome,PDO::PARAM_STR, 255); 
    } 
    if ($this->getTexto_descricao()) { 
        $stmt->BindParam(':texto_descricao', $texto_descricao,PDO::PARAM_STR); 
    } 
    if ($this->getLink()) { 
        $stmt->BindParam(':link', $link,PDO::PARAM_STR, 255); 
    } 
    if ($this->getArquivo_logo()) { 
        $stmt->BindParam(':arquivo_logo', $arquivo_logo,PDO::PARAM_STR, 255); 
    } 
    $stmt->execute(); 
   $obj = $stmt->fetchAll(); 
   return $obj; 
} 
/** 
 * @method combobox 
* @param int id do registro selecionado 
 */ 
function combobox($selected) { 
    $obj = $this->listAll(); 
    echo "<select name='fk_parceiro' size='1' id='fk_parceiro'>"; 
    echo "     <option value=''>Selecione...</option>"; 
    foreach ($obj as $campo) { 
        if ($campo[0] == $selected) { 
            echo "     <option value='" . $campo[0] . "' selected>" . $campo[1] . "</option>"; 
        } else { 
            echo "     <option value='" . $campo[0] . "' >" . $campo[1] . "</option>"; 
        } 
    } 
    echo "</select>"; 
} 
/** 
 * @method combobox 
* @param int id do registro selecionado 
 */ 
function comboboxP($selected) { 
    $obj = $this->listAll(); 
    echo "<select name='fk_parceiroP' size='1' id='fk_parceiroP'>"; 
    echo "     <option value=''>Selecione...</option>"; 
    foreach ($obj as $campo) { 
        if ($campo[0] == $selected) { 
            echo "     <option value='" . $campo[0] . "' selected>" . $campo[1] . "</option>"; 
        } else { 
            echo "     <option value='" . $campo[0] . "' >" . $campo[1] . "</option>"; 
        } 
    } 
    echo "</select>"; 
} 
    /** 
     * Novas funções devem ser declaradas abaixo 
     */ 
} 
$DAO = new ParceiroDAO(); 

