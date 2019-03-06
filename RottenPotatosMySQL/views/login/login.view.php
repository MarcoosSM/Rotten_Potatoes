<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../views/login/login.css">
</head>
<body>
   <div class="div_body">
      <div class="div_container">
         <div class="div_titulo">
            <b>Inicio de sesión</b>
         </div>
      <div class="div_form">
         <form action = "" method = "post">
            <label>Usuario:</label><br/>
            <input type = "text" name = "username" class = "inputBox"/><br/><br/>
            <label>Contraseña:</label>
            <input type = "password" name = "password" class = "inputBox" /><br/><br/>
            <input type = "submit" value = " Iniciar Sesión "/><br/>
         </form>   
         <div class="div_error">
            <?php echo $error; ?>
         </div>
         <p>¿Aún no tienes cuenta? <a href="Registro.php">Registrate</a></p>
      </div>	
   </div>
</body>
</html>