<?php
   include('session.php');
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $sql = "SELECT ID FROM usuarios WHERE LOGIN = '$login_session'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = isset($row['active']);
      $id = $row['ID'];
      $count = mysqli_num_rows($result);
      
      if($count == 1) {  
        $sql = "DELETE FROM usuarios WHERE (ID = '$id')";
        $result = mysqli_query($db,$sql);
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
         <div style = "width:150px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>¿Eliminar cuenta?</b></div>
				
            <div style = "margin:20px">
               
               <form action = "" method = "post">
                    <input type = "submit" value = " Si "/> <button><a href="ModificarPerfil.php">No</a></Button><br/><br/>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
				
         </div>
			
      </div>

   </body>
</html>