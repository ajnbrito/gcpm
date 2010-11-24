<?php

/*
 * Inicia seção
 */
session_start();

/*
 * função auto loader, garrega classes automaticamente
 */

function __autoload($classe) {
    require_once ucfirst($classe) . '.class.php';
}

/*
 * Dia e hora da criação do arquivo
 */
$hoje = date("d/m/Y");
$hora = date("H:i:s");

/*
 * Listar tabelas do banco de dados
 */
$Conexao = new Conexao();
foreach ($Conexao->nomeTabela() as $nomeTabela) {
    /*
     * definir nome do arquivo
     */
    $nomeArquivo = "app/model/" . ucfirst($nomeTabela[0]) . ".class.php";

    $linha = "<?php \n";
    $linha .= "/** \n";
    $linha .= " * Descrição da classe \n";
    $linha .= " * @author Marcelo Jaques \n";
    $linha .= " * @version 1.0 \n";
    $linha .= " * @package models \n";
    $linha .= " * @name {$nomeTabela[0]} \n";
    $linha .= " */ \n";
    $linha .= "class " . ucfirst($nomeTabela[0]) . "\n{\n";

    /*
     * listar campos da tabela,
     * declaração de atributos
     */
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    /** \n";
        $linha .= "     * @access private \n";
        $linha .= "     * @var {$nomeCampo['Type']} {$nomeCampo['Field']} \n";
        $linha .= "     */ \n";
        $linha .= "    private \${$nomeCampo['Field']}; \n";
    }

    /*
     * método construtor
     */
    $linha .= "    function __construct(";
    $j = 0;
    $total = sizeof($Conexao->nomeCampos($nomeTabela[0]));
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= " \${$nomeCampo['Field']} ";
        if ($j != $total - 1) {
            $linha .= " , ";
        }
        $j++;
    }
    $linha .= ") { \n";
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "        \$this->{$nomeCampo['Field']} = \${$nomeCampo['Field']}; \n";
    }
    $linha .= "    } \n\n";

    /*
     * gets e sets
     */
    foreach ($Conexao->nomeCampos($nomeTabela[0]) as $nomeCampo) {
        $linha .= "    /** \n";
        $linha .= "     * @method get" . ucfirst($nomeCampo['Field']) . " \n";
        $linha .= "     * @return {$nomeCampo['Type']} {$nomeCampo['Field']} \n";
        $linha .= "     */ \n";
        $linha .= "    function get" . ucfirst($nomeCampo['Field']) . "() { \n";
        $linha .= "        return \$this->{$nomeCampo['Field']}; \n";
        $linha .= "    }  \n\n";

        $linha .= "    /** \n";
        $linha .= "     * @method set" . ucfirst($nomeCampo['Field']) . "} \n";
        $linha .= "     * @param {$nomeCampo['Type']} {$nomeCampo['Field']} \n";
        $linha .= "     */ \n";
        $linha .= "    function set" . ucfirst($nomeCampo['Field']) . "(\${$nomeCampo['Field']}) { \n";
        $linha .= "        \$this->{$nomeCampo['Field']} = \${$nomeCampo['Field']}; \n";
        $linha .= "    }  \n\n";
    }

    $linha .= "    /** \n";
    $linha .= "     * Novas funções devem ser declaradas abaixo \n";
    $linha .= "     */ \n";
    $linha .= "} \n";
    /*
     * Cria e salva arquivo
     */
    $fd = fopen($nomeArquivo, "w");
    fwrite($fd, $linha);
    fclose($fd);
    chmod($nomeArquivo, 0777);
}

/*
 * definir nome do arquivo
 */
$nomeArquivo = "app/model/Menu.class.php";

$linha = "    <?php  \n";
$linha .= "      /** \n";
$linha .= "       * @author Marcelo Jaques  \n";
$linha .= "       * @version 1.0  \n";
$linha .= "       * @package models  \n";
$linha .= "       * @name  \n";
$linha .= "       */ \n";
$linha .= "    class Menu  \n";
$linha .= "    { \n";
$linha .= "      /** \n";
$linha .= "       * @method __construct  \n";
$linha .= "       */ \n";
$linha .= "       function __construct() \n";
$linha .= "       { \n";
$linha .= "          echo \"<div class=\\\"sidebarmenu\\\">\";  \n";
$linha .= "          echo \"    <a class=\\\"menuitem submenuheader\\\" href=\\\"\\\"><b>Menu Principal</b></a>\";  \n";
$linha .= "          echo \"    <div class=\\\"submenu\\\">\";  \n";
foreach ($Conexao->nomeTabela() as $nomeTabela) {
$linha .= "          echo \"        <ul>\";  \n";
$linha .= "          echo \"           <li><a href=\\\"../../controller/".ucfirst($nomeTabela[0]).".controller.php?opcao=listAll\\\">".ucfirst($nomeTabela[0])."</a></li>\";  \n";
$linha .= "          echo \"        </ul>\";  \n";
}
$linha .= "          echo \"    </div>\";  \n";
$linha .= "          echo \"</div>\";  \n";
$linha .= "       } \n";
$linha .= "    } \n";

/*
 * Cria e salva arquivo
 */
$fd = fopen($nomeArquivo, "w");
fwrite($fd, $linha);
fclose($fd);
chmod($nomeArquivo, 0777);