<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name noticia 
 */ 

include_once "Conexao.class.php"; 
include_once "Noticia.class.php"; 

class NoticiaDAO extends Noticia 
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
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO noticia ( id_noticia  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo ) VALUES (:id_noticia  , :fk_id_usuario  , :titulo  , :texto_texto  , :arquivo_arquivo )"); 
        $stmt->BindParam(':id_noticia', $this->getId_noticia(),PDO::PARAM_INT, 11); 
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
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM noticia WHERE id_noticia = :id_noticia"); 
    $stmt->BindParam(':id_noticia', $this->getId_noticia(), PDO::PARAM_INT); 
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
    $stmt = $this->Conexao->pdo->prepare("UPDATE noticia SET  id_noticia = :id_noticia  ,  fk_id_usuario = :fk_id_usuario  ,  titulo = :titulo  ,  texto_texto = :texto_texto  ,  arquivo_arquivo = :arquivo_arquivo  WHERE id_noticia = :id_noticia "); 
        $stmt->BindParam(':id_noticia', $this->getId_noticia(),PDO::PARAM_INT, 11); 
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
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_noticia  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM noticia LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_noticia  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM noticia"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_noticia) as total FROM noticia"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_noticia  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM noticia WHERE id_noticia = :id_noticia"); 
    $stmt->BindParam(':id_noticia', $this->getId_noticia(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_noticia = '%' . $this->getId_noticia() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT   id_noticia  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  arquivo_arquivo "; 
    $sql .= " FROM noticia WHERE 1=1 "; 
    if ($this->getId_noticia()) { 
        $sql .= " AND id_noticia LIKE :id_noticia "; 
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
    if ($this->getId_noticia()) { 
        $stmt->BindParam(':id_noticia', $id_noticia,PDO::PARAM_INT, 11); 
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
    $id_noticia = '%' . $this->getId_noticia() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM noticia WHERE 1=1 "; 
    if ($this->getId_noticia()) { 
        $sql .= " AND id_noticia LIKE :id_noticia "; 
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
    if ($this->getId_noticia()) { 
        $stmt->BindParam(':id_noticia', $id_noticia,PDO::PARAM_INT, 11); 
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
    echo "<select name='fk_noticia' size='1' id='fk_noticia'>"; 
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
    echo "<select name='fk_noticiaP' size='1' id='fk_noticiaP'>"; 
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
$DAO = new NoticiaDAO(); 

