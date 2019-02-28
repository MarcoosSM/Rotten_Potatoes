<?php session_start();

if(isset($_SESSION['login_user'])){
    header('Location: ./php/Contenido.php');
}else {
    header('Location: ./php/Login.php');
}
?>