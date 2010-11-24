<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name usuario 
 */ 
class Usuario
{
    /** 
     * @access private 
     * @var int(11) id_usuario 
     */ 
    private $id_usuario; 
    /** 
     * @access private 
     * @var varchar(45) nome 
     */ 
    private $nome; 
    /** 
     * @access private 
     * @var varchar(45) usuario 
     */ 
    private $usuario; 
    /** 
     * @access private 
     * @var varchar(45) senha 
     */ 
    private $senha; 
    function __construct( $id_usuario  ,  $nome  ,  $usuario  ,  $senha ) { 
        $this->id_usuario = $id_usuario; 
        $this->nome = $nome; 
        $this->usuario = $usuario; 
        $this->senha = $senha; 
    } 

    /** 
     * @method getId_usuario 
     * @return int(11) id_usuario 
     */ 
    function getId_usuario() { 
        return $this->id_usuario; 
    }  

    /** 
     * @method setId_usuario} 
     * @param int(11) id_usuario 
     */ 
    function setId_usuario($id_usuario) { 
        $this->id_usuario = $id_usuario; 
    }  

    /** 
     * @method getNome 
     * @return varchar(45) nome 
     */ 
    function getNome() { 
        return $this->nome; 
    }  

    /** 
     * @method setNome} 
     * @param varchar(45) nome 
     */ 
    function setNome($nome) { 
        $this->nome = $nome; 
    }  

    /** 
     * @method getUsuario 
     * @return varchar(45) usuario 
     */ 
    function getUsuario() { 
        return $this->usuario; 
    }  

    /** 
     * @method setUsuario} 
     * @param varchar(45) usuario 
     */ 
    function setUsuario($usuario) { 
        $this->usuario = $usuario; 
    }  

    /** 
     * @method getSenha 
     * @return varchar(45) senha 
     */ 
    function getSenha() { 
        return $this->senha; 
    }  

    /** 
     * @method setSenha} 
     * @param varchar(45) senha 
     */ 
    function setSenha($senha) { 
        $this->senha = $senha; 
    }  

    /** 
     * Novas funções devem ser declaradas abaixo 
     */ 
} 
