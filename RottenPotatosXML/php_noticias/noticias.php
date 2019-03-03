<?php 

    require('MySQLUtils.php');

    MySQLUtils::StartSession();
    

    $paginaActual = 1;
    $postPorPagina = 5;
    $numTotalPaginas = MySQLUtils::numeroDeNoticias();
        
    if (isset($_GET["pagina"])) {
        if(ctype_digit($_GET["pagina"])){           
            $paginaActual = $_GET["pagina"];
        }

    }

    $numPaginas = ceil ($numTotalPaginas  / $postPorPagina); 
   
    $noticias = MySQLUtils::getNewPaginacion(($paginaActual-1)*$postPorPagina,($paginaActual-1)*$postPorPagina+$postPorPagina );

    MySQLUtils::CloseSesssion();

    require('views/noticias.view.php')

?>