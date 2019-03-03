<?php 

    require('BaseXUtils.php');

    BaseXUtils::StartSession();
    
    $noticias = BaseXUtils::getNew();

    BaseXUtils::CloseSesssion();

    require('views/noticiasAdmin.view.php')

?>