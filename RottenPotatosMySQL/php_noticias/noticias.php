<?php 

    require('MySQLUtils.php');

    MySQLUtils::StartSession();
    
    $noticias = MySQLUtils::getNew();

    MySQLUtils::CloseSesssion();

    require('views/noticias.view.php')

?>