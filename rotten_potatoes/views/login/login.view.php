<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
   <div>
      <div style = "width:300px; border: solid 1px #333333;">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;">
            <b>Inicio de sesión</b>
         </div>
         
         <div style = "margin:35px">
            <form action = "" method = "post">
               <label>Usuario:</label>
               <input type = "text" name = "username" class = "box"/><br/>
               <br/>
               <label>Contraseña:</label>
               <input type = "password" name = "password" class = "box" /><br/>
               <br/>
               <input type = "submit" value = " Iniciar Sesión "/><br/>
            </form>
            
            <div style = "font-size:11px; color:#cc0000; margin-top:10px">
               <?php echo $error; ?>
            </div>
            
            <p>¿Aún no tienes cuenta? <a href="Registro.php">Registrate</a></p>
         </div>	
      </div>
   </div>
</body>
</html>