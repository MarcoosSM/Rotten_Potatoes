<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="../views/login/login.css">
</head>
<body>
    <div class="div_body">
        <div class="div_container">
            <div class="div_titulo">
                <b>Registro</b>
            </div>	
            <div class="div_form">
                <form action = "" method = "post">
                    <label>Usuario: </label>
                    <input type="text" name="username" class="inputBox"/><br/><br/>
                    <label>Contraseña:</label>
                    <input type="password" name="password" class="inputBox"/><br/><br/>
                    <label>Repetir Contraseña:</label>
                    <input type="password" name="password2" class="inputBox"/><br/><br/>
                    <input type = "submit" value = " Registrarse "/><br/>
                </form>
                <div class="div_error">
                    <?php echo $error; ?>
                </div>
                <p>¿Ya tienes cuenta? <a href="Login.php">Iniciar Sesión</a></p>
            </div>
        </div>
    </div>
</body>
</html>