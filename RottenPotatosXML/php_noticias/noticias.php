<?php 

    require('BaseXUtils.php');

    BaseXUtils::StartSession();
    

    $paginaActual = 1;
    $postPorPagina = 5;
    $numTotalPaginas = BaseXUtils::numeroDeNoticias();
        
    if (isset($_GET["pagina"])) {
        if(ctype_digit($_GET["pagina"])){           
            $paginaActual = $_GET["pagina"];
        }

    }

    $numPaginas = ceil ($numTotalPaginas  / $postPorPagina); 
   
    $noticias = BaseXUtils::getNewPaginacion(($paginaActual-1)*$postPorPagina,($paginaActual-1)*$postPorPagina+$postPorPagina );

    BaseXUtils::CloseSesssion();

    require('views/noticias.view.php')

?>