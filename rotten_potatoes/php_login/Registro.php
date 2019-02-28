<?php
   include("config.php");
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $hashedpass = password_hash($mypassword, PASSWORD_DEFAULT);
      
      $sql = "SELECT ID FROM usuarios WHERE LOGIN = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = isset($row['active']);
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
        $error = "Ya estás registrado";
      } else if (empty($_POST['username']) or empty($_POST['password']) or empty($_POST['password2'])) {
        $error = "Rellena los campos vacios";
      } else if ($_POST['password'] != $_POST['password2']) {
        $error = "Las contraseñas no coinciden";
      }else {          
        $sql = "INSERT INTO usuarios (LOGIN, PASS) VALUES ('$myusername', '$hashedpass')";
        $result = mysqli_query($db,$sql);
        $_SESSION['login_user'] = $myusername;
        header("location: Login.php");
      }
   }
   require('../views/login/registro.view.php');
?>