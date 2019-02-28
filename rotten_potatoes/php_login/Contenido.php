<?php
   include('session.php');
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcos Solance Martín</title>
    <link rel="stylesheet" href="../content/styles.css">
    <script src="java.js"></script>
</head>
    <div id="content">
        <div id="header">
            <div id="logo">
                <img alt="" src="../content/images/logo.png">
            </div>       
            <div id="menu">
                <p>Bienvenido, <?php echo $login_session; ?> (<a href="ModificarPerfil.php">Modificar Perfil </a>/ <a href="cerrarSesion.php">Cerrar Sesión</a>)</p>    
            </div>
            <div id="search">
                <form id="searchform">
                    <input type="text" id="searchbox">
                    <input type="button" id="boton">
                </form>
            </div>
            <table id="menu">
                <tr>
                    <td class="celda menuHover">    
                        <a class="hipervinculos menuHover">Inicio</a>
                    </td>
                    <td class="celda menuHover">   
                        <a class="hipervinculos menuHover">Quienes somos</a>
                    </td>    
                    <td class="celda menuHover">    
                        <a class="hipervinculos menuHover">Nuestros servicios</a>
                    </td>
                    <td class="celda menuHover">    
                        <a class="hipervinculos menuHover">Contacto</a>
                    </td>
                </tr>
            </table>
        </div>
        <div id="slider">
            <img alt="" src="../content/images/foto1.jpg">
            <img id="fIzq" class="flechas" alt="" src="../content/images/leftarrow.png" width="100px" height="100px" >
            <img id="fDer" class="flechas" alt="" src="../content/images/rightarrow.png" width="100px" height="100px" >
        </div>
        <div class="items">
            <img class="itemsImg" alt="" src="../content/images/mechanic.png">
            <h2>Una empresa puntera</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
            laborum.</p>
        </div>
        <div class="items">
            <img class="itemsImg" alt="" src="../content/images/money.png">
            <h2>Generándote los mayores beneficios</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
            laborum.</p>
        </div>
        <div class="items">
            <img class="itemsImg" src="../content/images/people.png">
            <h2>Evolucionamos contigo</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
            laborum.</p>
        </div>
        <div id="footer">
            <p>Plantilla desarrollada por Marcos Solance Martín</p>
        </div>
    </div>
<body>
</body>
</html>