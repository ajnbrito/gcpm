    <?php  
      /** 
       * @author Marcelo Jaques  
       * @version 1.0  
       * @package models  
       * @name  
       */ 
    class Menu  
    { 
      /** 
       * @method __construct  
       */ 
       function __construct() 
       { 
          echo "<div class=\"sidebarmenu\">";  
          echo "    <a class=\"menuitem submenuheader\" href=\"\"><b>Menu Principal</b></a>";  
          echo "    <div class=\"submenu\">";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Banner.controller.php?opcao=listAll\">Banner</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Cases.controller.php?opcao=listAll\">Cases</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Empresa.controller.php?opcao=listAll\">Empresa</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Evento.controller.php?opcao=listAll\">Evento</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Home.controller.php?opcao=listAll\">Home</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Noticia.controller.php?opcao=listAll\">Noticia</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Parceiro.controller.php?opcao=listAll\">Parceiro</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Servico.controller.php?opcao=listAll\">Servico</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Treinamento.controller.php?opcao=listAll\">Treinamento</a></li>";  
          echo "        </ul>";  
          echo "        <ul>";  
          echo "           <li><a href=\"../../controller/Usuario.controller.php?opcao=listAll\">Usuario</a></li>";  
          echo "        </ul>";  
          echo "    </div>";  
          echo "</div>";  
       } 
    } 
