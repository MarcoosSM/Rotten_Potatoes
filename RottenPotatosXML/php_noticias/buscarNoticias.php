<?php 
    if( $_GET["search"]){

        require('../BaseXUtils.php');

        BaseXUtils::StartSession();

        $noticias = BaseXUtils::getNewByKeyWords($_GET["search"]);

        BaseXUtils::CloseSesssion();

      
    }
      require('../views/buscarNoticias.view.php');  

?>