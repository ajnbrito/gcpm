<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name banner 
 */ 
class Banner
{
    /** 
     * @access private 
     * @var int(11) id_banner 
     */ 
    private $id_banner; 
    /** 
     * @access private 
     * @var int(11) fk_id_usuario 
     */ 
    private $fk_id_usuario; 
    /** 
     * @access private 
     * @var varchar(255) titulo 
     */ 
    private $titulo; 
    /** 
     * @access private 
     * @var text texto_texto 
     */ 
    private $texto_texto; 
    /** 
     * @access private 
     * @var varchar(255) link 
     */ 
    private $link; 
    /** 
     * @access private 
     * @var varchar(255) arquivo_arquivo 
     */ 
    private $arquivo_arquivo; 
    function __construct( $id_banner  ,  $fk_id_usuario  ,  $titulo  ,  $texto_texto  ,  $link  ,  $arquivo_arquivo ) { 
        $this->id_banner = $id_banner; 
        $this->fk_id_usuario = $fk_id_usuario; 
        $this->titulo = $titulo; 
        $this->texto_texto = $texto_texto; 
        $this->link = $link; 
        $this->arquivo_arquivo = $arquivo_arquivo; 
    } 

    /** 
     * @method getId_banner 
     * @return int(11) id_banner 
     */ 
    function getId_banner() { 
        return $this->id_banner; 
    }  

    /** 
     * @method setId_banner} 
     * @param int(11) id_banner 
     */ 
    function setId_banner($id_banner) { 
        $this->id_banner = $id_banner; 
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
     * @method getTitulo 
     * @return varchar(255) titulo 
     */ 
    function getTitulo() { 
        return $this->titulo; 
    }  

    /** 
     * @method setTitulo} 
     * @param varchar(255) titulo 
     */ 
    function setTitulo($titulo) { 
        $this->titulo = $titulo; 
    }  

    /** 
     * @method getTexto_texto 
     * @return text texto_texto 
     */ 
    function getTexto_texto() { 
        return $this->texto_texto; 
    }  

    /** 
     * @method setTexto_texto} 
     * @param text texto_texto 
     */ 
    function setTexto_texto($texto_texto) { 
        $this->texto_texto = $texto_texto; 
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
     * @method getArquivo_arquivo 
     * @return varchar(255) arquivo_arquivo 
     */ 
    function getArquivo_arquivo() { 
        return $this->arquivo_arquivo; 
    }  

    /** 
     * @method setArquivo_arquivo} 
     * @param varchar(255) arquivo_arquivo 
     */ 
    function setArquivo_arquivo($arquivo_arquivo) { 
        $this->arquivo_arquivo = $arquivo_arquivo; 
    }  

    /** 
     * Novas funções devem ser declaradas abaixo 
     */ 
} 
