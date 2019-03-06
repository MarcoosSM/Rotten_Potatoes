<?php
require('../MySQLUtils.php');
MySQLUtils::StartSession();
$noticias = MySQLUtils::getNew();

if(!empty($_POST)){
    if(isset($_POST['Enviar'])){
        MySQLUtils::insertNew($_POST['titulo'],$_POST['noticia']);
		header('Location: ../index.php');
    }
}

    echo '<form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="POST">';
    echo '<input type="text" class="textModifyArticles" name="titulo"/>';
    echo '<textarea class="textModifyArticles" row="4" cols="50" name="noticia"></textarea>';
    echo '<input type=submit class ="buttonsModifyArticles" value="Enviar" name="Enviar"/>';
    echo '</form>';
        
 MySQLUtils::CloseSesssion();

?>