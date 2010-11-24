<?php

class Conexao extends PDO {

    private $dsn = 'mysql:host=localhost;dbname=alix';
    private $user = 'root';
    private $password = ';09012004';
    public $pdo = "";

    function __construct() {
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
            //echo 'Conectou!' vcvxcv;
            return true;
        } catch (PDOException $e) {
            echo 'Conexão falhou; ' . $e->getMessage();
            return false;
        }
    }

    function __destruct() {
        $this->handle = NULL;
    }

    function dbname() {
        $explode = explode("=", $this->dsn);
        return $explode[2];
    }

    function nomeTabela() {
        $stmt = $this->pdo->prepare("SHOW TABLES");
        $stmt->execute();
        $obj = $stmt->fetchAll();
        return $obj;
    }

    function nomeCampos($tabela) {
        $stmt = $this->pdo->prepare("SHOW FIELDS IN {$tabela}");
        $stmt->execute();
        $obj = $stmt->fetchAll();
        return $obj;
    }

}