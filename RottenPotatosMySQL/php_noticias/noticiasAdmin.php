<?php 

    require('MySQLUtils.php');

    MySQLUtils::StartSession();
    
    $noticias = MySQLUtils::getNew();

    MySQLUtils::CloseSesssion();

    require('views/noticiasAdmin.view.php')

?>