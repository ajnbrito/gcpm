<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name parceiro 
 */ 
class Parceiro
{
    /** 
     * @access private 
     * @var int(11) id_parceiro 
     */ 
    private $id_parceiro; 
    /** 
     * @access private 
     * @var int(11) fk_id_usuario 
     */ 
    private $fk_id_usuario; 
    /** 
     * @access private 
     * @var varchar(255) nome 
     */ 
    private $nome; 
    /** 
     * @access private 
     * @var text texto_descricao 
     */ 
    private $texto_descricao; 
    /** 
     * @access private 
     * @var varchar(255) link 
     */ 
    private $link; 
    /** 
     * @access private 
     * @var varchar(255) arquivo_logo 
     */ 
    private $arquivo_logo; 
    function __construct( $id_parceiro  ,  $fk_id_usuario  ,  $nome  ,  $texto_descricao  ,  $link  ,  $arquivo_logo ) { 
        $this->id_parceiro = $id_parceiro; 
        $this->fk_id_usuario = $fk_id_usuario; 
        $this->nome = $nome; 
        $this->texto_descricao = $texto_descricao; 
        $this->link = $link; 
        $this->arquivo_logo = $arquivo_logo; 
    } 

    /** 
     * @method getId_parceiro 
     * @return int(11) id_parceiro 
     */ 
    function getId_parceiro() { 
        return $this->id_parceiro; 
    }  

    /** 
     * @method setId_parceiro} 
     * @param int(11) id_parceiro 
     */ 
    function setId_parceiro($id_parceiro) { 
        $this->id_parceiro = $id_parceiro; 
    }  

    /** 
     * @method getFk_id_usuario 
     * @return int(11) fk_id_usuario 
     */ 
    function getFk_id_usuario() { 
        return $this->fk_id_usuario; 
    }  

    /** 
     * @method setFk_id_usuario} 
     * @param int(11) fk_id_usuario 
     */ 
    function setFk_id_usuario($fk_id_usuario) { 
        $this->fk_id_usuario = $fk_id_usuario; 
    }  

    /** 
     * @method getNome 
     * @return varchar(255) nome 
     */ 
    function getNome() { 
        return $this->nome; 
    }  

    /** 
     * @method setNome} 
     * @param varchar(255) nome 
     */ 
    function setNome($nome) { 
        $this->nome = $nome; 
    }  

    /** 
     * @method getTexto_descricao 
     * @return text texto_descricao 
     */ 
    function getTexto_descricao() { 
        return $this->texto_descricao; 
    }  

    /** 
     * @method setTexto_descricao} 
     * @param text texto_descricao 
     */ 
    function setTexto_descricao($texto_descricao) { 
        $this->texto_descricao = $texto_descricao; 
    }  

    /** 
     * @method getLink 
     * @return varchar(255) link 
     */ 
    function getLink() { 
        return $this->link; 
    }  

    /** 
     * @method setLink} 
     * @param varchar(255) link 
     */ 
    function setLink($link) { 
        $this->link = $link; 
    }  

    /** 
     * @method getArquivo_logo 
     * @return varchar(255) arquivo_logo 
     */ 
    function getArquivo_logo() { 
        return $this->arquivo_logo; 
    }  

    /** 
     * @method setArquivo_logo} 
     * @param varchar(255) arquivo_logo 
     */ 
    function setArquivo_logo($arquivo_logo) { 
        $this->arquivo_logo = $arquivo_logo; 
    }  

    /** 
     * Novas funções devem ser declaradas abaixo 
     */ 
} 
