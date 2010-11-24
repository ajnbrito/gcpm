<?php

function __autoload($classe)
{
    include_once "../../model/{$classe}.class.php";
}

define("SLOGAN", "gestão em seguração da informação");
define("RODAPE", "<strong>Alix</strong> - 2010");

class FeController
{

    function __construct()
    {
        /**
         * inicia session
         */
        session_start();

        /**
         * recebe option vinda dos formulários
         */
        $option = $_POST['opcao'];
        if (!isset($option)
            )$option = $_GET['opcao'];
        switch ($option)
        {
            case "":
                $this->index();
                break;
            case "index":
                //$this->index();
                header("Location: ../view/frontend/index.php");
                break;
            case "empresa":
                //$this->index();
                header("Location: ../view/frontend/empresa.php");
                break;
            case "servico":
                //$this->index();
                header("Location: ../view/frontend/servico.php");
                break;
            case "treinamento":
                //$this->index();
                header("Location: ../view/frontend/treinamento.php");
                break;
            case "treinamentoDetalhe":
                //$this->treinamentoDetalhe();
                header("Location: ../view/frontend/treinamentoDetalhe.php?id_treinamento={$_GET['id_treinamento']}");
                break;
            case "parceiro":
                //$this->treinamentoDetalhe();
                header("Location: ../view/frontend/parceiro.php");
                break;
            case "evento":
                //$this->index();
                header("Location: ../view/frontend/evento.php");
                break;
        }
    }

    function index()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $_SESSION['list_treinamento'] = $TreinamentoDAO->listAllFull();

        /*
         * carregar home
         */
        $HomeDAO = new HomeDAO();
        $_SESSION['list_home'] = $HomeDAO->listAllFull();
    }

    function servico()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $_SESSION['list_treinamento'] = $TreinamentoDAO->listAllFull();
    }

    function parceiro()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $_SESSION['list_treinamento'] = $TreinamentoDAO->listAllFull();
    }

    function empresa()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $_SESSION['list_treinamento'] = $TreinamentoDAO->listAllFull();

        /*
         * carregar sobre
         */
        $EmpresaDAO = new EmpresaDAO();
        $_SESSION['list_empresa'] = $EmpresaDAO->listAllFull();
    }

    function treinamento()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $_SESSION['list_treinamento'] = $TreinamentoDAO->listAllFull();
    }

    function noticia()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $NoticiaDAO = new NoticiaDAO();
        $_SESSION['list_noticia'] = $NoticiaDAO->listAllFull();
    }

    function cases()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $CaseDAO = new CasesDAO();
        $_SESSION['list_case'] = $CaseDAO->listAllFull();
    }

    function treinamentoDetalhe()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $TreinamentoDAO->setId_treinamento($_GET['id_treinamento']);
        $_SESSION['list_treinamentoDetalhe'] = $TreinamentoDAO->listPk();
    }

    function evento()
    {
        /*
         * carregar menu de serviços
         */
        $ServicoDAO = new ServicoDAO();
        $_SESSION['list_servico'] = $ServicoDAO->listAllFull();

        /*
         * carregar menu de parceiros
         */
        $ParceiroDAO = new ParceiroDAO();
        $_SESSION['list_parceiro'] = $ParceiroDAO->listAllFull();

        /*
         * carregar menu de eventos
         */
        $EventoDAO = new EventoDAO();
        $_SESSION['list_evento'] = $EventoDAO->listAllFull();

        /*
         * carregar menu de treinamento
         */
        $TreinamentoDAO = new TreinamentoDAO();
        $_SESSION['list_treinamento'] = $TreinamentoDAO->listAllFull();
    }

}

$Fe = new FeController();
