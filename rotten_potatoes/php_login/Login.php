<?php
   include("config.php");
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $sql = "SELECT PASS FROM usuarios WHERE LOGIN = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $hashedpass = $row['PASS'];

      if (password_verify($mypassword, $hashedpass)) {
        $_SESSION['login_user'] = $myusername;
        header("location: Contenido.php");
      } else {
         $error = "Usuario o contraseña incorrectos";
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Inicio de sesión</b></div>
				
            <div style = "margin:35px">
               
               <form action = "" method = "post">
                  <label>Usuario: </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Contraseña: </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Iniciar Sesión "/><br />
               
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
               <p> 
                ¿Aún no tienes cuenta? <a href="Registro.php">Registrate</a>
               </p>
            </div>
				
         </div>
			
      </div>

   </body>
</html>