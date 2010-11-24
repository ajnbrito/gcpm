<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name evento 
 */ 

include_once "Conexao.class.php"; 
include_once "Evento.class.php"; 

class EventoDAO extends Evento 
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
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO evento ( id_evento  ,  fk_id_usuario  ,  data_data  ,  titulo  ,  texto_texto  ,  arquivo_arquivo ) VALUES (:id_evento  , :fk_id_usuario  ,  STR_TO_DATE(:data_data,'%d/%m/%Y') , :titulo  , :texto_texto  , :arquivo_arquivo )"); 
        $stmt->BindParam(':id_evento', $this->getId_evento(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':data_data', $this->getData_data(),PDO::PARAM_STR, 45); 
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
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM evento WHERE id_evento = :id_evento"); 
    $stmt->BindParam(':id_evento', $this->getId_evento(), PDO::PARAM_INT); 
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
    $stmt = $this->Conexao->pdo->prepare("UPDATE evento SET  id_evento = :id_evento  ,  fk_id_usuario = :fk_id_usuario  ,  data_data = STR_TO_DATE(:data_data,'%d/%m/%Y') ,  titulo = :titulo  ,  texto_texto = :texto_texto  ,  arquivo_arquivo = :arquivo_arquivo  WHERE id_evento = :id_evento "); 
        $stmt->BindParam(':id_evento', $this->getId_evento(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':data_data', $this->getData_data(),PDO::PARAM_STR, 45); 
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
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_evento  ,  fk_id_usuario  ,  DATE_FORMAT(data_data,'%d/%m/%Y') as data_data  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM evento LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_evento  ,  fk_id_usuario  ,  DATE_FORMAT(data_data,'%d/%m/%Y') as data_data  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM evento"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_evento) as total FROM evento"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_evento  ,  fk_id_usuario  ,  DATE_FORMAT(data_data,'%d/%m/%Y') as data_data  ,  titulo  ,  texto_texto  ,  arquivo_arquivo  FROM evento WHERE id_evento = :id_evento"); 
    $stmt->BindParam(':id_evento', $this->getId_evento(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_evento = '%' . $this->getId_evento() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $data_data = '%' . $this->getData_data() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT   id_evento  ,  fk_id_usuario  ,  data_data  ,  titulo  ,  texto_texto  ,  arquivo_arquivo "; 
    $sql .= " FROM evento WHERE 1=1 "; 
    if ($this->getId_evento()) { 
        $sql .= " AND id_evento LIKE :id_evento "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getData_data()) { 
        $sql .= " AND data_data LIKE STR_TO_DATE(:data_data,'%d/%m/%Y') "; 
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
    if ($this->getId_evento()) { 
        $stmt->BindParam(':id_evento', $id_evento,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getData_data()) { 
        $stmt->BindParam(':data_data', $data_data,PDO::PARAM_STR, 45); 
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
    $id_evento = '%' . $this->getId_evento() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $data_data = '%' . $this->getData_data() . '%'; 
     $titulo = '%' . $this->getTitulo() . '%'; 
     $texto_texto = '%' . $this->getTexto_texto() . '%'; 
     $arquivo_arquivo = '%' . $this->getArquivo_arquivo() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM evento WHERE 1=1 "; 
    if ($this->getId_evento()) { 
        $sql .= " AND id_evento LIKE :id_evento "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getData_data()) { 
        $sql .= " AND data_data LIKE :data_data "; 
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
    if ($this->getId_evento()) { 
        $stmt->BindParam(':id_evento', $id_evento,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getData_data()) { 
        $stmt->BindParam(':data_data', $data_data,PDO::PARAM_STR, 45); 
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
    echo "<select name='fk_evento' size='1' id='fk_evento'>"; 
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
    echo "<select name='fk_eventoP' size='1' id='fk_eventoP'>"; 
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
$DAO = new EventoDAO(); 

