<?php session_start();

if(isset($_SESSION['login_user'])){
    header('Location: ./php_login/Contenido.php');
}else {
    header('Location: ./php_login/Login.php');
}
?>