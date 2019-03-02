<?php session_start();
if(isset($_SESSION['login_user'])){
   if($_SESSION['login_privileges'] == 1){
        header('Location: Contenido.php');
   }elseif($_SESSION['login_privileges'] == 2){
   }
}else {
    header('Location: php_login/Login.php');
}
?>