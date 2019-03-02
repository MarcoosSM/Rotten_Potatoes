<?php session_start();
#consulta a bbdd para saber que privilegios tiene el usuario
if(isset($_SESSION['login_user'])){
    header('Location: Contenido.php');
}else {
    header('Location: ./php_login/Login.php');
}
?>