<?php
   include("config.php");
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT PASS, PRIVILEGES FROM usuarios WHERE LOGIN = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $hashedpass = $row['PASS'];
      $privileges = $row['PRIVILEGES'];

      if (password_verify($mypassword, $hashedpass)) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_privileges'] = $privileges;
        header("location: Contenido.php");
      } else {
         $error = "Usuario o contraseña incorrectos";
      }
   }

   require('../views/login/login.view.php');
?>