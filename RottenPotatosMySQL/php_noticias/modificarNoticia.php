<?php
require('../MySQLUtils.php');
MySQLUtils::StartSession();
$noticias = MySQLUtils::getNew();

if(!empty($_POST)){
    if(isset($_POST['Modificar'])){
        MySQLUtils::modifyNew($_POST['id'], $_POST['titulo'], $_POST['noticia']);
        header('Location: ../index.php');
    }elseif(isset($_POST['Eliminar'])){
        MySQLUtils::deleteNew($_POST['id']);
        header('Location: ../index.php');
    }
}

   foreach($noticias as &$noticia){
        if(isset($_POST[$noticia[0]])){
            if($_POST[$noticia[0]] == "Modificar"){
                
                echo '<form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">';
                echo '<input type="text" class="textModifyArticles" value="'.$noticia[0].'" name="id" disabled/>';
                echo '<input type="text" class="textModifyArticles" name="titulo" value="'.$noticia[1].'"/>';
                echo '<textarea class="textModifyArticles" row="4" cols="50" name="noticia">'.$noticia[2].'</textarea>';
                echo '<input type=submit class ="buttonsModifyArticles" value="Enviar" name="Modificar"/>';
                echo '</form>';
                
            }elseif($_POST[$noticia[0]] == "Eliminar"){
                echo '<form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">';
                echo '<input type="text" class="textModifyArticles" value="'.$noticia[0].'" name="id" disabled/>';
                echo '<label>'.$noticia[1].'</label>';
                echo '<input type=submit class ="buttonsModifyArticles" value="Enviar" name="Eliminar"/>';
                echo '</form>';
            }
        }
        
    }
    MySQLUtils::CloseSesssion();
?>