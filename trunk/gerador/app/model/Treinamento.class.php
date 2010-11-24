<?php 
/** 
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package models 
 * @name treinamento 
 */ 
class Treinamento
{
    /** 
     * @access private 
     * @var int(11) id_treinamento 
     */ 
    private $id_treinamento; 
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
     * @var text texto_sobre 
     */ 
    private $texto_sobre; 
    /** 
     * @access private 
     * @var text texto_publico_alvo 
     */ 
    private $texto_publico_alvo; 
    /** 
     * @access private 
     * @var text texto_conteudo 
     */ 
    private $texto_conteudo; 
    /** 
     * @access private 
     * @var text texto_instrutor 
     */ 
    private $texto_instrutor; 
    /** 
     * @access private 
     * @var int(11) numero_vagas 
     */ 
    private $numero_vagas; 
    /** 
     * @access private 
     * @var text texto_locais 
     */ 
    private $texto_locais; 
    /** 
     * @access private 
     * @var text texto_proximas_turmas 
     */ 
    private $texto_proximas_turmas; 
    /** 
     * @access private 
     * @var text texto_incompany 
     */ 
    private $texto_incompany; 
    /** 
     * @access private 
     * @var text texto_informacoes 
     */ 
    private $texto_informacoes; 
    function __construct( $id_treinamento  ,  $fk_id_usuario  ,  $nome  ,  $texto_sobre  ,  $texto_publico_alvo  ,  $texto_conteudo  ,  $texto_instrutor  ,  $numero_vagas  ,  $texto_locais  ,  $texto_proximas_turmas  ,  $texto_incompany  ,  $texto_informacoes ) { 
        $this->id_treinamento = $id_treinamento; 
        $this->fk_id_usuario = $fk_id_usuario; 
        $this->nome = $nome; 
        $this->texto_sobre = $texto_sobre; 
        $this->texto_publico_alvo = $texto_publico_alvo; 
        $this->texto_conteudo = $texto_conteudo; 
        $this->texto_instrutor = $texto_instrutor; 
        $this->numero_vagas = $numero_vagas; 
        $this->texto_locais = $texto_locais; 
        $this->texto_proximas_turmas = $texto_proximas_turmas; 
        $this->texto_incompany = $texto_incompany; 
        $this->texto_informacoes = $texto_informacoes; 
    } 

    /** 
     * @method getId_treinamento 
     * @return int(11) id_treinamento 
     */ 
    function getId_treinamento() { 
        return $this->id_treinamento; 
    }  

    /** 
     * @method setId_treinamento} 
     * @param int(11) id_treinamento 
     */ 
    function setId_treinamento($id_treinamento) { 
        $this->id_treinamento = $id_treinamento; 
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
     * @method getTexto_sobre 
     * @return text texto_sobre 
     */ 
    function getTexto_sobre() { 
        return $this->texto_sobre; 
    }  

    /** 
     * @method setTexto_sobre} 
     * @param text texto_sobre 
     */ 
    function setTexto_sobre($texto_sobre) { 
        $this->texto_sobre = $texto_sobre; 
    }  

    /** 
     * @method getTexto_publico_alvo 
     * @return text texto_publico_alvo 
     */ 
    function getTexto_publico_alvo() { 
        return $this->texto_publico_alvo; 
    }  

    /** 
     * @method setTexto_publico_alvo} 
     * @param text texto_publico_alvo 
     */ 
    function setTexto_publico_alvo($texto_publico_alvo) { 
        $this->texto_publico_alvo = $texto_publico_alvo; 
    }  

    /** 
     * @method getTexto_conteudo 
     * @return text texto_conteudo 
     */ 
    function getTexto_conteudo() { 
        return $this->texto_conteudo; 
    }  

    /** 
     * @method setTexto_conteudo} 
     * @param text texto_conteudo 
     */ 
    function setTexto_conteudo($texto_conteudo) { 
        $this->texto_conteudo = $texto_conteudo; 
    }  

    /** 
     * @method getTexto_instrutor 
     * @return text texto_instrutor 
     */ 
    function getTexto_instrutor() { 
        return $this->texto_instrutor; 
    }  

    /** 
     * @method setTexto_instrutor} 
     * @param text texto_instrutor 
     */ 
    function setTexto_instrutor($texto_instrutor) { 
        $this->texto_instrutor = $texto_instrutor; 
    }  

    /** 
     * @method getNumero_vagas 
     * @return int(11) numero_vagas 
     */ 
    function getNumero_vagas() { 
        return $this->numero_vagas; 
    }  

    /** 
     * @method setNumero_vagas} 
     * @param int(11) numero_vagas 
     */ 
    function setNumero_vagas($numero_vagas) { 
        $this->numero_vagas = $numero_vagas; 
    }  

    /** 
     * @method getTexto_locais 
     * @return text texto_locais 
     */ 
    function getTexto_locais() { 
        return $this->texto_locais; 
    }  

    /** 
     * @method setTexto_locais} 
     * @param text texto_locais 
     */ 
    function setTexto_locais($texto_locais) { 
        $this->texto_locais = $texto_locais; 
    }  

    /** 
     * @method getTexto_proximas_turmas 
     * @return text texto_proximas_turmas 
     */ 
    function getTexto_proximas_turmas() { 
        return $this->texto_proximas_turmas; 
    }  

    /** 
     * @method setTexto_proximas_turmas} 
     * @param text texto_proximas_turmas 
     */ 
    function setTexto_proximas_turmas($texto_proximas_turmas) { 
        $this->texto_proximas_turmas = $texto_proximas_turmas; 
    }  

    /** 
     * @method getTexto_incompany 
     * @return text texto_incompany 
     */ 
    function getTexto_incompany() { 
        return $this->texto_incompany; 
    }  

    /** 
     * @method setTexto_incompany} 
     * @param text texto_incompany 
     */ 
    function setTexto_incompany($texto_incompany) { 
        $this->texto_incompany = $texto_incompany; 
    }  

    /** 
     * @method getTexto_informacoes 
     * @return text texto_informacoes 
     */ 
    function getTexto_informacoes() { 
        return $this->texto_informacoes; 
    }  

    /** 
     * @method setTexto_informacoes} 
     * @param text texto_informacoes 
     */ 
    function setTexto_informacoes($texto_informacoes) { 
        $this->texto_informacoes = $texto_informacoes; 
    }  

    /** 
     * Novas funções devem ser declaradas abaixo 
     */ 
} 
