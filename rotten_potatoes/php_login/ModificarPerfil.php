<?php
   include('session.php');
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['changePassword'])) {
         $oldpassword = mysqli_real_escape_string($db,$_POST['old_password']);
         $newpassword = mysqli_real_escape_string($db,$_POST['password']); 
         $sql = "SELECT PASS FROM usuarios WHERE LOGIN = '$login_session'";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $hashedpass = $row['PASS'];
         $sql = "SELECT ID FROM usuarios WHERE LOGIN = '$login_session'";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $id = $row['ID'];
         if (empty($_POST['old_password']) or empty($_POST['password']) or empty($_POST['password2'])){
         $error = "Rellena los campos vacios";
         } else if (password_verify($oldpassword, $hashedpass) && $_POST['password'] == $_POST['password2']) {
         $hashednewpass = password_hash($newpassword, PASSWORD_DEFAULT);
         $sql = "UPDATE usuarios SET PASS = '$hashednewpass' WHERE (ID = '$id')";
         $result = mysqli_query($db,$sql);
         } else if ($_POST['password'] != $_POST['password2']){
         $error = "Las contraseñas no coinciden";
         } else {    
         $error = "Contraseña original erronea";
         }
      }
      if (isset($_POST['changeStyle'])) {
         $letraSize = $_POST['size'];
         $letraStyle = $_POST['letra'];
         setcookie('font-size', $letraSize, time() + 60 * 60 * 24 * 30, '/');
         setcookie('font-family', $letraStyle, time() + 60 * 60 * 24 * 30, '/');
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Modificar Perfil</b></div>
				
            <div style = "margin:30px">
               
               <form name="changePass" action = "" method = "post">
                  <label>Contraseña original:</label><input type = "password" name = "old_password" class = "box" /><br/><br />
                  <label>Contraseña nueva:</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <label>Repetir Contraseña nueva:</label><input type = "password" name = "password2" class = "box" /><br/><br />
                  <input type = "submit" name = "changePassword" value = " Modificar Contraseña "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               <hr>
               
               <form name="changeStyle" action = "" method = "post">
                    <label>Cambiar estetica:</label><br/><br />

                    <label>-Tamaño de letra:</label><br>
                    <input type="radio" name="size" value="5px" checked>5px<br>
                    <input type="radio" name="size" value="20px">20px<br/>
                    <input type="radio" name="size" value="35px">35px<br/><br />

                    <label>-Fuente de letra:</label><br>
                    <input type="radio" name="letra" value="Impact" checked>Impact<br>
                    <input type="radio" name="letra" value="'Times New Roman'">Times New Roman<br/>
                    <input type="radio" name="letra" value="'Comic Sans'">Comic Sans<br/><br />

                    <input type = "submit" name = "changeStyle" value = " Cambiar estetica "/><br />
               </form>
               <hr>	
               <p> 
                    <label>Eliminar cuenta: </label><a href="Baja.php">Darse de baja</a>
               </p><hr>	
               <button><a href="Contenido.php">Volver</a></Button><br />
            </div>
				
         </div>
			
      </div>

   </body>
</html>