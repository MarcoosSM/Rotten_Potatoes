<?php
require('../BaseXUtils.php');
BaseXUtils::StartSession();
$noticias = BaseXUtils::getNew();

if(!empty($_POST)){
    if(isset($_POST['Modificar'])){
        BaseXUtils::modifyNew($_POST['id'], $_POST['titulo'], $_POST['noticia']);
        header('Location: ../index.php');
    }elseif(isset($_POST['Eliminar'])){
        BaseXUtils::deleteNew($_POST['id']);
        header('Location: ../index.php');
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
                echo '<form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">';
                echo '<input type="text" value="'.$noticia[0].'" name="id" style="display:none;"/>';
                echo '<label>'.$noticia[1].'</label>';
                echo '<input type=submit value="Enviar" name="Eliminar"/>';
                echo '</form>';
            }
        }
        
    }
    MySQLUtils::CloseSesssion();
?>