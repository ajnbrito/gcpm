<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name evento 
 */ 
class Evento
{
    /** 
     * @access private 
     * @var int(11) id_evento 
     */ 
    private $id_evento; 
    /** 
     * @access private 
     * @var int(11) fk_id_usuario 
     */ 
    private $fk_id_usuario; 
    /** 
     * @access private 
     * @var varchar(45) data_data 
     */ 
    private $data_data; 
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
     * @var varchar(255) arquivo_arquivo 
     */ 
    private $arquivo_arquivo; 
    function __construct( $id_evento  ,  $fk_id_usuario  ,  $data_data  ,  $titulo  ,  $texto_texto  ,  $arquivo_arquivo ) { 
        $this->id_evento = $id_evento; 
        $this->fk_id_usuario = $fk_id_usuario; 
        $this->data_data = $data_data; 
        $this->titulo = $titulo; 
        $this->texto_texto = $texto_texto; 
        $this->arquivo_arquivo = $arquivo_arquivo; 
    } 

    /** 
     * @method getId_evento 
     * @return int(11) id_evento 
     */ 
    function getId_evento() { 
        return $this->id_evento; 
    }  

    /** 
     * @method setId_evento} 
     * @param int(11) id_evento 
     */ 
    function setId_evento($id_evento) { 
        $this->id_evento = $id_evento; 
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
     * @method getData_data 
     * @return varchar(45) data_data 
     */ 
    function getData_data() { 
        return $this->data_data; 
    }  

    /** 
     * @method setData_data} 
     * @param varchar(45) data_data 
     */ 
    function setData_data($data_data) { 
        $this->data_data = $data_data; 
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
