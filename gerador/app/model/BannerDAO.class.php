<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name banner 
 */ 

include_once "Conexao.class.php"; 
include_once "Banner.class.php"; 

class BannerDAO extends Banner 
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
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO banner ( id_banner  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  link  ,  arquivo_arquivo ) VALUES (:id_banner  , :fk_id_usuario  , :titulo  , :texto_texto  , :link  , :arquivo_arquivo )"); 
        $stmt->BindParam(':id_banner', $this->getId_banner(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':titulo', $this->getTitulo(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_texto', $this->getTexto_texto(),PDO::PARAM_STR); 
        $stmt->BindParam(':link', $this->getLink(),PDO::PARAM_STR, 255); 
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
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM banner WHERE id_banner = :id_banner"); 
    $stmt->BindParam(':id_banner', $this->getId_banner(), PDO::PARAM_INT); 
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
    $stmt = $this->Conexao->pdo->prepare("UPDATE banner SET  id_banner = :id_banner  ,  fk_id_usuario = :fk_id_usuario  ,  titulo = :titulo  ,  texto_texto = :texto_texto  ,  link = :link  ,  arquivo_arquivo = :arquivo_arquivo  WHERE id_banner = :id_banner "); 
        $stmt->BindParam(':id_banner', $this->getId_banner(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':titulo', $this->getTitulo(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_texto', $this->getTexto_texto(),PDO::PARAM_STR); 
        $stmt->BindParam(':link', $this->getLink(),PDO::PARAM_STR, 255); 
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
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_banner  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  link  ,  arquivo_arquivo  FROM banner LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_banner  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  link  ,  arquivo_arquivo  FROM banner"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_banner) as total FROM banner"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_banner  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  link  ,  arquivo_arquivo  FROM banner WHERE id_banner = :id_banner"); 
    $stmt->BindParam(':id_banner', $this->getId_banner(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_banner = '%' . $this->getId_banner() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $link = '%' . $this->getLink() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT   id_banner  ,  fk_id_usuario  ,  titulo  ,  texto_texto  ,  link  ,  arquivo_arquivo "; 
    $sql .= " FROM banner WHERE 1=1 "; 
    if ($this->getId_banner()) { 
        $sql .= " AND id_banner LIKE :id_banner "; 
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
    if ($this->getLink()) { 
        $sql .= " AND link LIKE :link "; 
    } 
    if ($this->getArquivo_arquivo()) { 
        $sql .= " AND arquivo_arquivo LIKE :arquivo_arquivo "; 
    } 
    $sql .= " LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']; 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_banner()) { 
        $stmt->BindParam(':id_banner', $id_banner,PDO::PARAM_INT, 11); 
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
    if ($this->getLink()) { 
        $stmt->BindParam(':link', $link,PDO::PARAM_STR, 255); 
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
    $id_banner = '%' . $this->getId_banner() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $link = '%' . $this->getLink() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM banner WHERE 1=1 "; 
    if ($this->getId_banner()) { 
        $sql .= " AND id_banner LIKE :id_banner "; 
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
    if ($this->getLink()) { 
        $sql .= " AND link LIKE :link "; 
    } 
    if ($this->getArquivo_arquivo()) { 
        $sql .= " AND arquivo_arquivo LIKE :arquivo_arquivo "; 
    } 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_banner()) { 
        $stmt->BindParam(':id_banner', $id_banner,PDO::PARAM_INT, 11); 
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
    if ($this->getLink()) { 
        $stmt->BindParam(':link', $link,PDO::PARAM_STR, 255); 
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
    echo "<select name='fk_banner' size='1' id='fk_banner'>"; 
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
    echo "<select name='fk_bannerP' size='1' id='fk_bannerP'>"; 
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
$DAO = new BannerDAO(); 

