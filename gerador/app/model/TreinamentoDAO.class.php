<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name treinamento 
 */ 

include_once "Conexao.class.php"; 
include_once "Treinamento.class.php"; 

class TreinamentoDAO extends Treinamento 
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
    $stmt = $this->Conexao->pdo->prepare("INSERT INTO treinamento ( id_treinamento  ,  fk_id_usuario  ,  nome  ,  texto_sobre  ,  texto_publico_alvo  ,  texto_conteudo  ,  texto_instrutor  ,  numero_vagas  ,  texto_locais  ,  texto_proximas_turmas  ,  texto_incompany  ,  texto_informacoes ) VALUES (:id_treinamento  , :fk_id_usuario  , :nome  , :texto_sobre  , :texto_publico_alvo  , :texto_conteudo  , :texto_instrutor  , :numero_vagas  , :texto_locais  , :texto_proximas_turmas  , :texto_incompany  , :texto_informacoes )"); 
        $stmt->BindParam(':id_treinamento', $this->getId_treinamento(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':nome', $this->getNome(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_sobre', $this->getTexto_sobre(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_publico_alvo', $this->getTexto_publico_alvo(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_conteudo', $this->getTexto_conteudo(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_instrutor', $this->getTexto_instrutor(),PDO::PARAM_STR); 
        $stmt->BindParam(':numero_vagas', $this->getNumero_vagas(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':texto_locais', $this->getTexto_locais(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_proximas_turmas', $this->getTexto_proximas_turmas(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_incompany', $this->getTexto_incompany(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_informacoes', $this->getTexto_informacoes(),PDO::PARAM_STR); 
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
    $stmt = $this->Conexao->pdo->prepare("DELETE FROM treinamento WHERE id_treinamento = :id_treinamento"); 
    $stmt->BindParam(':id_treinamento', $this->getId_treinamento(), PDO::PARAM_INT); 
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
    $stmt = $this->Conexao->pdo->prepare("UPDATE treinamento SET  id_treinamento = :id_treinamento  ,  fk_id_usuario = :fk_id_usuario  ,  nome = :nome  ,  texto_sobre = :texto_sobre  ,  texto_publico_alvo = :texto_publico_alvo  ,  texto_conteudo = :texto_conteudo  ,  texto_instrutor = :texto_instrutor  ,  numero_vagas = :numero_vagas  ,  texto_locais = :texto_locais  ,  texto_proximas_turmas = :texto_proximas_turmas  ,  texto_incompany = :texto_incompany  ,  texto_informacoes = :texto_informacoes  WHERE id_treinamento = :id_treinamento "); 
        $stmt->BindParam(':id_treinamento', $this->getId_treinamento(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':fk_id_usuario', $this->getFk_id_usuario(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':nome', $this->getNome(),PDO::PARAM_STR, 255); 
        $stmt->BindParam(':texto_sobre', $this->getTexto_sobre(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_publico_alvo', $this->getTexto_publico_alvo(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_conteudo', $this->getTexto_conteudo(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_instrutor', $this->getTexto_instrutor(),PDO::PARAM_STR); 
        $stmt->BindParam(':numero_vagas', $this->getNumero_vagas(),PDO::PARAM_INT, 11); 
        $stmt->BindParam(':texto_locais', $this->getTexto_locais(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_proximas_turmas', $this->getTexto_proximas_turmas(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_incompany', $this->getTexto_incompany(),PDO::PARAM_STR); 
        $stmt->BindParam(':texto_informacoes', $this->getTexto_informacoes(),PDO::PARAM_STR); 
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
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_treinamento  ,  fk_id_usuario  ,  nome  ,  texto_sobre  ,  texto_publico_alvo  ,  texto_conteudo  ,  texto_instrutor  ,  numero_vagas  ,  texto_locais  ,  texto_proximas_turmas  ,  texto_incompany  ,  texto_informacoes  FROM treinamento LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listAllFull 
 * @return PDO_Object listAllFull 
 */ 
function listAllFull() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_treinamento  ,  fk_id_usuario  ,  nome  ,  texto_sobre  ,  texto_publico_alvo  ,  texto_conteudo  ,  texto_instrutor  ,  numero_vagas  ,  texto_locais  ,  texto_proximas_turmas  ,  texto_incompany  ,  texto_informacoes  FROM treinamento"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method countAll 
 * @return PDO_Object countAll 
 */ 
function countAll() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT COUNT(id_treinamento) as total FROM treinamento"); 
    $stmt->execute(); 
    $obj = $stmt->fetchAll(); 
    return $obj; 
} 
/** 
 * @method listar por PK 
 * @return PDO_Object listPk 
 */ 
function listPk() { 
    $stmt = $this->Conexao->pdo->prepare("SELECT  id_treinamento  ,  fk_id_usuario  ,  nome  ,  texto_sobre  ,  texto_publico_alvo  ,  texto_conteudo  ,  texto_instrutor  ,  numero_vagas  ,  texto_locais  ,  texto_proximas_turmas  ,  texto_incompany  ,  texto_informacoes  FROM treinamento WHERE id_treinamento = :id_treinamento"); 
    $stmt->BindParam(':id_treinamento', $this->getId_treinamento(), PDO::PARAM_INT); 
    $stmt->execute(); 
    $obj = $stmt->fetchObject(); 
    return $obj; 
} 
/** 
 * @method lista com filtro 
 * @return PDO_Object listFilter 
 */ 
function listFilter() { 
    $id_treinamento = '%' . $this->getId_treinamento() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $nome = '%' . $this->getNome() . '%'; 
     $texto_sobre = '%' . $this->getTexto_sobre() . '%'; 
     $texto_publico_alvo = '%' . $this->getTexto_publico_alvo() . '%'; 
     $texto_conteudo = '%' . $this->getTexto_conteudo() . '%'; 
     $texto_instrutor = '%' . $this->getTexto_instrutor() . '%'; 
     $numero_vagas = '%' . $this->getNumero_vagas() . '%'; 
     $texto_locais = '%' . $this->getTexto_locais() . '%'; 
     $texto_proximas_turmas = '%' . $this->getTexto_proximas_turmas() . '%'; 
     $texto_incompany = '%' . $this->getTexto_incompany() . '%'; 
     $texto_informacoes = '%' . $this->getTexto_informacoes() . '%'; 
     $sql = "SELECT   id_treinamento  ,  fk_id_usuario  ,  nome  ,  texto_sobre  ,  texto_publico_alvo  ,  texto_conteudo  ,  texto_instrutor  ,  numero_vagas  ,  texto_locais  ,  texto_proximas_turmas  ,  texto_incompany  ,  texto_informacoes "; 
    $sql .= " FROM treinamento WHERE 1=1 "; 
    if ($this->getId_treinamento()) { 
        $sql .= " AND id_treinamento LIKE :id_treinamento "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getNome()) { 
        $sql .= " AND nome LIKE :nome "; 
    } 
    if ($this->getTexto_sobre()) { 
        $sql .= " AND texto_sobre LIKE :texto_sobre "; 
    } 
    if ($this->getTexto_publico_alvo()) { 
        $sql .= " AND texto_publico_alvo LIKE :texto_publico_alvo "; 
    } 
    if ($this->getTexto_conteudo()) { 
        $sql .= " AND texto_conteudo LIKE :texto_conteudo "; 
    } 
    if ($this->getTexto_instrutor()) { 
        $sql .= " AND texto_instrutor LIKE :texto_instrutor "; 
    } 
    if ($this->getNumero_vagas()) { 
        $sql .= " AND numero_vagas LIKE :numero_vagas "; 
    } 
    if ($this->getTexto_locais()) { 
        $sql .= " AND texto_locais LIKE :texto_locais "; 
    } 
    if ($this->getTexto_proximas_turmas()) { 
        $sql .= " AND texto_proximas_turmas LIKE :texto_proximas_turmas "; 
    } 
    if ($this->getTexto_incompany()) { 
        $sql .= " AND texto_incompany LIKE :texto_incompany "; 
    } 
    if ($this->getTexto_informacoes()) { 
        $sql .= " AND texto_informacoes LIKE :texto_informacoes "; 
    } 
    $sql .= " LIMIT " . $_SESSION['inicio'] . "," . $_SESSION['totalPorPg']; 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_treinamento()) { 
        $stmt->BindParam(':id_treinamento', $id_treinamento,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getNome()) { 
        $stmt->BindParam(':nome', $nome,PDO::PARAM_STR, 255); 
    } 
    if ($this->getTexto_sobre()) { 
        $stmt->BindParam(':texto_sobre', $texto_sobre,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_publico_alvo()) { 
        $stmt->BindParam(':texto_publico_alvo', $texto_publico_alvo,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_conteudo()) { 
        $stmt->BindParam(':texto_conteudo', $texto_conteudo,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_instrutor()) { 
        $stmt->BindParam(':texto_instrutor', $texto_instrutor,PDO::PARAM_STR); 
    } 
    if ($this->getNumero_vagas()) { 
        $stmt->BindParam(':numero_vagas', $numero_vagas,PDO::PARAM_INT, 11); 
    } 
    if ($this->getTexto_locais()) { 
        $stmt->BindParam(':texto_locais', $texto_locais,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_proximas_turmas()) { 
        $stmt->BindParam(':texto_proximas_turmas', $texto_proximas_turmas,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_incompany()) { 
        $stmt->BindParam(':texto_incompany', $texto_incompany,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_informacoes()) { 
        $stmt->BindParam(':texto_informacoes', $texto_informacoes,PDO::PARAM_STR); 
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
    $id_treinamento = '%' . $this->getId_treinamento() . '%'; 
     $fk_id_usuario = '%' . $this->getFk_id_usuario() . '%'; 
     $nome = '%' . $this->getNome() . '%'; 
     $texto_sobre = '%' . $this->getTexto_sobre() . '%'; 
     $texto_publico_alvo = '%' . $this->getTexto_publico_alvo() . '%'; 
     $texto_conteudo = '%' . $this->getTexto_conteudo() . '%'; 
     $texto_instrutor = '%' . $this->getTexto_instrutor() . '%'; 
     $numero_vagas = '%' . $this->getNumero_vagas() . '%'; 
     $texto_locais = '%' . $this->getTexto_locais() . '%'; 
     $texto_proximas_turmas = '%' . $this->getTexto_proximas_turmas() . '%'; 
     $texto_incompany = '%' . $this->getTexto_incompany() . '%'; 
     $texto_informacoes = '%' . $this->getTexto_informacoes() . '%'; 
     $sql = "SELECT  COUNT(1) as total"; 
     $sql .= " FROM treinamento WHERE 1=1 "; 
    if ($this->getId_treinamento()) { 
        $sql .= " AND id_treinamento LIKE :id_treinamento "; 
    } 
    if ($this->getFk_id_usuario()) { 
        $sql .= " AND fk_id_usuario LIKE :fk_id_usuario "; 
    } 
    if ($this->getNome()) { 
        $sql .= " AND nome LIKE :nome "; 
    } 
    if ($this->getTexto_sobre()) { 
        $sql .= " AND texto_sobre LIKE :texto_sobre "; 
    } 
    if ($this->getTexto_publico_alvo()) { 
        $sql .= " AND texto_publico_alvo LIKE :texto_publico_alvo "; 
    } 
    if ($this->getTexto_conteudo()) { 
        $sql .= " AND texto_conteudo LIKE :texto_conteudo "; 
    } 
    if ($this->getTexto_instrutor()) { 
        $sql .= " AND texto_instrutor LIKE :texto_instrutor "; 
    } 
    if ($this->getNumero_vagas()) { 
        $sql .= " AND numero_vagas LIKE :numero_vagas "; 
    } 
    if ($this->getTexto_locais()) { 
        $sql .= " AND texto_locais LIKE :texto_locais "; 
    } 
    if ($this->getTexto_proximas_turmas()) { 
        $sql .= " AND texto_proximas_turmas LIKE :texto_proximas_turmas "; 
    } 
    if ($this->getTexto_incompany()) { 
        $sql .= " AND texto_incompany LIKE :texto_incompany "; 
    } 
    if ($this->getTexto_informacoes()) { 
        $sql .= " AND texto_informacoes LIKE :texto_informacoes "; 
    } 
    $stmt = $this->Conexao->pdo->prepare($sql); 
    if ($this->getId_treinamento()) { 
        $stmt->BindParam(':id_treinamento', $id_treinamento,PDO::PARAM_INT, 11); 
    } 
    if ($this->getFk_id_usuario()) { 
        $stmt->BindParam(':fk_id_usuario', $fk_id_usuario,PDO::PARAM_INT, 11); 
    } 
    if ($this->getNome()) { 
        $stmt->BindParam(':nome', $nome,PDO::PARAM_STR, 255); 
    } 
    if ($this->getTexto_sobre()) { 
        $stmt->BindParam(':texto_sobre', $texto_sobre,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_publico_alvo()) { 
        $stmt->BindParam(':texto_publico_alvo', $texto_publico_alvo,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_conteudo()) { 
        $stmt->BindParam(':texto_conteudo', $texto_conteudo,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_instrutor()) { 
        $stmt->BindParam(':texto_instrutor', $texto_instrutor,PDO::PARAM_STR); 
    } 
    if ($this->getNumero_vagas()) { 
        $stmt->BindParam(':numero_vagas', $numero_vagas,PDO::PARAM_INT, 11); 
    } 
    if ($this->getTexto_locais()) { 
        $stmt->BindParam(':texto_locais', $texto_locais,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_proximas_turmas()) { 
        $stmt->BindParam(':texto_proximas_turmas', $texto_proximas_turmas,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_incompany()) { 
        $stmt->BindParam(':texto_incompany', $texto_incompany,PDO::PARAM_STR); 
    } 
    if ($this->getTexto_informacoes()) { 
        $stmt->BindParam(':texto_informacoes', $texto_informacoes,PDO::PARAM_STR); 
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
    echo "<select name='fk_treinamento' size='1' id='fk_treinamento'>"; 
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
    echo "<select name='fk_treinamentoP' size='1' id='fk_treinamentoP'>"; 
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
$DAO = new TreinamentoDAO(); 

