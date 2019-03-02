<?php 

    require('MySQLUtils.php');

    MySQLUtils::StartSession();
    

    $paginaActual = 1;
    $postPorPagina = 5;
        
    if (isset($_GET["pagina"])) {
        if(ctype_digit($_GET["pagina"])){           
            $paginaActual = $_GET["pagina"];
        }

    }
   
    $noticias = MySQLUtils::getNewPaginacion(($paginaActual-1)*$postPorPagina,($paginaActual-1)*$postPorPagina+$postPorPagina );

    MySQLUtils::CloseSesssion();

    require('views/noticias.view.php')

?>