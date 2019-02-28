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
?>
<html>
   <head>
      <title>Marcos Solance Martín</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Registro</b></div>
				
            <div style = "margin:37px">
               
               <form action = "" method = "post">
                  <label>Usuario:</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Contraseña:</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <label>Repetir Contraseña:</label><input type = "password" name = "password2" class = "box" /><br/><br />
                  <input type = "submit" value = " Registrarse "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
               <p> 
                ¿Ya tienes cuenta? <a href="Login.php">Iniciar Sesión</a>
               </p>

            </div>
				
         </div>
			
      </div>

   </body>
</html>