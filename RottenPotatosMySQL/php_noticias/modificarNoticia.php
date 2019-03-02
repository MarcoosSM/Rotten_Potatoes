<?php
require('../MySQLUtils.php');
MySQLUtils::StartSession();
$noticias = MySQLUtils::getNew();

if(!empty($_POST)){
    if(isset($_POST['Modificar'])){
        MySQLUtils::modifyNew($_POST['id'], $_POST['titulo'], $_POST['noticia']);
        echo $_POST['id']."  ".$_POST['titulo']."    ".$_POST['noticia'];
        #header('Location: ../index.php');
    }elseif(isset($_POST['Eliminar'])){
        
    }
}

   foreach($noticias as &$noticia){
        if(isset($_POST[$noticia[0]])){
            if($_POST[$noticia[0]] == "Modificar"){
                
                echo '<form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">';
                echo '<input type="text" value="'.$noticia[0].'" name="id" style="display:none;"/>';
                echo '<input type="text" name="titulo" value="'.$noticia[1].'"/>';
                echo '<textarea row="4" cols="50" name="noticia">'.$noticia[2].'</textarea>';
                echo '<input type=submit value="Enviar" name="Modificar"/>';
                echo '</form>';
                
            }elseif($_POST[$noticia[0]] == "Eliminar"){
                $id = $_POST[$noticia[0]];
                echo '<input type="text" name="titulo" value="'.$noticia[1].'"/>';
                echo '<input type=submit value="Enviar" name="Eliminar"/>';
            }
        }
        
    }
    MySQLUtils::CloseSesssion();
?>