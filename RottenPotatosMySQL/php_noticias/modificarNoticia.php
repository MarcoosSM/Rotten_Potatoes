<?php
   
	require('../MySQLUtils.php');
    
    MySQLUtils::StartSession();
    $id = 0;
    $noticias = MySQLUtils::getNew();
    foreach($noticias as &$noticia){
        if($_POST[$noticia[0]] == $noticia[0]){
            echo '<input type="text" name="titulo" value="'.$noticia[1].'"/>';
            echo '<input type="text" name="titulo" value="'.$noticia[2].'"/>';
        }
    }
    MySQLUtils::CloseSesssion();

	
		
		
?>