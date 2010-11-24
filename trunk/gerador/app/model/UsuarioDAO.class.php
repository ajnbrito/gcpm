<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name usuario 
 */ 

include_once "Conexao.class.php"; 
include_once "Usuario.class.php"; 

class UsuarioDAO extends Usuario 
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
    * @method login  
    */ 
    function login() { 
        $stmt = $this->Conexao->pdo->prepare("SELECT  * FROM usuario  WHERE usuario = :usuario AND senha = :senha"); 
        $stmt->BindParam(':usuario', $this->getUsuario(), PDO::PARAM_INT); 
        $stmt->BindParam(':senha', $this->getSenha(), PDO::PARAM_INT); 
        $stmt->execute(); 
        $obj = $stmt->fetchObject(); 
         return $obj; 
    } 
/** 
 * @method insert 
 * @return bool true or false 
 */ 
function insert() { 
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO usuario ( id_usuario  ,  nome  ,  usuario  ,  senha ) VALUES (:id_usuario  , :nome  , :usuario  , :senha )"); 
        $stmt->BindParam(':id_usuario', $this->getId_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':nome', $this->getNome(),PDO::PARAM_STR, 45); 
        $stmt->BindParam(':usuario', $this->getUsuario(),PDO::PARAM_STR, 45); 
        $stmt->BindParam(':senha', $this->getSenha(),PDO::PARAM_STR, 45); 
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
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario"); 
    $stmt->BindParam(':id_usuario', $this->getId_usuario(), PDO::PARAM_INT); 
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
    $stmt = $this->Conexao->pdo->prepare("UPDATE usuario SET  id_usuario = :id_usuario  ,  nome = :nome  ,  usuario = :usuario  ,  senha = :senha  WHERE id_usuario = :id_usuario "); 
        $stmt->BindParam(':id_usuario', $this->getId_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':nome', $this->getNome(),PDO::PARAM_STR, 45); 
        $stmt->BindParam(':usuario', $this->getUsuario(),PDO::PARAM_STR, 45); 
        $stmt->BindParam(':senha', $this->getSenha(),PDO::PARAM_STR, 45); 
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
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_usuario  ,  nome  ,  usuario  ,  senha  FROM usuario LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_usuario  ,  nome  ,  usuario  ,  senha  FROM usuario"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_usuario) as total FROM usuario"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_usuario  ,  nome  ,  usuario  ,  senha  FROM usuario WHERE id_usuario = :id_usuario"); 
    $stmt->BindParam(':id_usuario', $this->getId_usuario(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_usuario = '%' . $this->getId_usuario() . '%'; 
     $nome = '%' . $this->getNome() . '%'; 
     $usuario = '%' . $this->getUsuario() . '%'; 
     $senha = '%' . $this->getSenha() . '%'; 
     $sql = "SELECT   id_usuario  ,  nome  ,  usuario  ,  senha "; 
    $sql .= " FROM usuario WHERE 1=1 "; 
    if ($this->getId_usuario()) { 
        $sql .= " AND id_usuario LIKE :id_usuario "; 
    } 
    if ($this->getNome()) { 
        $sql .= " AND nome LIKE :nome "; 
    } 
    if ($this->getUsuario()) { 
        $sql .= " AND usuario LIKE :usuario "; 
    } 
    if ($this->getSenha()) { 
        $sql .= " AND senha LIKE :senha "; 
    } 
    $sql .= " LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']; 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_usuario()) { 
        $stmt->BindParam(':id_usuario', $id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getNome()) { 
        $stmt->BindParam(':nome', $nome,PDO::PARAM_STR, 45); 
    } 
    if ($this->getUsuario()) { 
        $stmt->BindParam(':usuario', $usuario,PDO::PARAM_STR, 45); 
    } 
    if ($this->getSenha()) { 
        $stmt->BindParam(':senha', $senha,PDO::PARAM_STR, 45); 
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
    $id_usuario = '%' . $this->getId_usuario() . '%'; 
     $nome = '%' . $this->getNome() . '%'; 
     $usuario = '%' . $this->getUsuario() . '%'; 
     $senha = '%' . $this->getSenha() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM usuario WHERE 1=1 "; 
    if ($this->getId_usuario()) { 
        $sql .= " AND id_usuario LIKE :id_usuario "; 
    } 
    if ($this->getNome()) { 
        $sql .= " AND nome LIKE :nome "; 
    } 
    if ($this->getUsuario()) { 
        $sql .= " AND usuario LIKE :usuario "; 
    } 
    if ($this->getSenha()) { 
        $sql .= " AND senha LIKE :senha "; 
    } 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_usuario()) { 
        $stmt->BindParam(':id_usuario', $id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getNome()) { 
        $stmt->BindParam(':nome', $nome,PDO::PARAM_STR, 45); 
    } 
    if ($this->getUsuario()) { 
        $stmt->BindParam(':usuario', $usuario,PDO::PARAM_STR, 45); 
    } 
    if ($this->getSenha()) { 
        $stmt->BindParam(':senha', $senha,PDO::PARAM_STR, 45); 
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
    echo "<select name='fk_usuario' size='1' id='fk_usuario'>"; 
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
    echo "<select name='fk_usuarioP' size='1' id='fk_usuarioP'>"; 
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
$DAO = new UsuarioDAO(); 

