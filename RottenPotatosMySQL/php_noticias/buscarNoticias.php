<?php 
    if( $_GET["search"]){

        require('../MySQLUtils.php');

        MySQLUtils::StartSession();

        $noticias = MySQLUtils::getNewByKeyWords($_GET["search"]);

        MySQLUtils::CloseSesssion();

      
    }
      require('../views/buscarNoticias.view.php');  

?>