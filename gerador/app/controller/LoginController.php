<?php 
/**
 * Descrição da classe 
 * @author Marcelo Jaques 
 * @version 1.0 
 * @package controller 
 * @name LoginController 
 */ 
include_once "../model/UsuarioDAO.class.php"; 
class LoginController
{
  function __construct() 
  {
      session_start(); 
     /**
      * recebe option vinda dos formulários 
      */
      $option = $_POST['opcao'];
      if(!isset($option)) $option = $_GET['opcao'];

     /**
      * definição das options 
      */
      switch($option) 
      { 
         /**
          * caso insert 
          */
          case "login": 
              $UsuarioDao = new UsuarioDao(); 
              $UsuarioDao->setUsuario($_POST['usuario']); 
              $UsuarioDao->setSenha($_POST['senha']); 
              $_SESSION['login'] = $UsuarioDao->login(); 
              if($_SESSION['login']) 
              { 
                  header("Location: Home.controller.php?opcao=listAll");
              } 
              else 
              { 
                   header("Location: ../view/backend/erro.html"); 
              } 
              break; 
          case "logout": 
              session_destroy();
              header("Location: ../view/backend/logout.html"); 
              break; 
      } 
  }
}
/**
 * cria o objeto 
 */
$Login = new LoginController(); 
