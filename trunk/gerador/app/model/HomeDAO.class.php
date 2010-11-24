<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name home 
 */ 

include_once "Conexao.class.php"; 
include_once "Home.class.php"; 

class HomeDAO extends Home 
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
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO home ( id_home  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo ) VALUES (:id_home  , :fk_id_usuario  , :titulo  , :texto_texto  , :arquivo_arquivo )"); 
        $stmt->BindParam(':id_home', $this->getId_home(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':titulo', $this->getTitulo(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_texto', $this->getTexto_texto(),PDO::PARAM_STR); 
        $stmt->BindParam(':arquivo_arquivo', $this->getArquivo_arquivo(),PDO::PARAM_STR, 255); 
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
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM home WHERE id_home = :id_home"); 
    $stmt->BindParam(':id_home', $this->getId_home(), PDO::PARAM_INT); 
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
    $stmt = $this->Conexao->pdo->prepare("UPDATE home SET  id_home = :id_home  ,  fk_id_usuario = :fk_id_usuario  ,  titulo = :titulo  ,  texto_texto = :texto_texto  ,  arquivo_arquivo = :arquivo_arquivo  WHERE id_home = :id_home "); 
        $stmt->BindParam(':id_home', $this->getId_home(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':titulo', $this->getTitulo(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_texto', $this->getTexto_texto(),PDO::PARAM_STR); 
        $stmt->BindParam(':arquivo_arquivo', $this->getArquivo_arquivo(),PDO::PARAM_STR, 255); 
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
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_home  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM home LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_home  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM home"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_home) as total FROM home"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_home  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM home WHERE id_home = :id_home"); 
    $stmt->BindParam(':id_home', $this->getId_home(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_home = '%' . $this->getId_home() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT   id_home  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo "; 
    $sql .= " FROM home WHERE 1=1 "; 
    if ($this->getId_home()) { 
        $sql .= " AND id_home LIKE :id_home "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getTitulo()) { 
        $sql .= " AND titulo LIKE :titulo "; 
    } 
    if ($this->getTexto_texto()) { 
        $sql .= " AND texto_texto LIKE :texto_texto "; 
    } 
    if ($this->getArquivo_arquivo()) { 
        $sql .= " AND arquivo_arquivo LIKE :arquivo_arquivo "; 
    } 
    $sql .= " LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']; 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_home()) { 
        $stmt->BindParam(':id_home', $id_home,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getTitulo()) { 
        $stmt->BindParam(':titulo', $titulo,PDO::PARAM_STR, 255); 
    } 
    if ($this->getTexto_texto()) { 
        $stmt->BindParam(':texto_texto', $texto_texto,PDO::PARAM_STR); 
    } 
    if ($this->getArquivo_arquivo()) { 
        $stmt->BindParam(':arquivo_arquivo', $arquivo_arquivo,PDO::PARAM_STR, 255); 
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
    $id_home = '%' . $this->getId_home() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM home WHERE 1=1 "; 
    if ($this->getId_home()) { 
        $sql .= " AND id_home LIKE :id_home "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getTitulo()) { 
        $sql .= " AND titulo LIKE :titulo "; 
    } 
    if ($this->getTexto_texto()) { 
        $sql .= " AND texto_texto LIKE :texto_texto "; 
    } 
    if ($this->getArquivo_arquivo()) { 
        $sql .= " AND arquivo_arquivo LIKE :arquivo_arquivo "; 
    } 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_home()) { 
        $stmt->BindParam(':id_home', $id_home,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getTitulo()) { 
        $stmt->BindParam(':titulo', $titulo,PDO::PARAM_STR, 255); 
    } 
    if ($this->getTexto_texto()) { 
        $stmt->BindParam(':texto_texto', $texto_texto,PDO::PARAM_STR); 
    } 
    if ($this->getArquivo_arquivo()) { 
        $stmt->BindParam(':arquivo_arquivo', $arquivo_arquivo,PDO::PARAM_STR, 255); 
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
    echo "<select name='fk_home' size='1' id='fk_home'>"; 
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
    echo "<select name='fk_homeP' size='1' id='fk_homeP'>"; 
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
$DAO = new HomeDAO(); 

