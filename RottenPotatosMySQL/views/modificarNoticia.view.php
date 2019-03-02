<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../php_noticias/style.css">
    <title>Rotten Potatoes</title>
</head>
<body>
    <div class="header">
        <a href="#default" class="logo">ROTTEN POTATOES</a>
        <div class="header-right">
            <div class="search-container">
                <form action="../php_noticias/buscarNoticias.php" method="get">
                    <input type="text" placeholder="Search..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <a class="active" href="../Index.php">Home</a>
            <a href="#news">Noticias</a>
        </div>
    </div>

    <div class="articles">
        <?php
            require('../php_noticias/modificarNoticia.php');
        ?>
    </div>
    
    <div class="footer">
    <h5 class="textFooter">Copyright © Alumnos de DAM - 2019</h5>
    </div>
</body>
</html>