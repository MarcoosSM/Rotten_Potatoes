<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				require('../php_noticias/MySQLUtils.php');
				MySQLUtils::StartSession();
			
				$noticias = MySQLUtils::getNew();
			
				#$noticias = array(array("Titulo1","contenido1"),array("Titulo2","contenido2"));
			
				foreach ($noticias as &$noticia) {
					echo '<div class="noticia">';
                    echo '<form action = "./php_noticias/modificarNoticia.php" method = "post">';
                    echo '	<h3>'. $noticia[0].'</h3>';
					echo '	<p>'.$noticia[1].'</p>';
                    echo '	<input type="submit" value="Modificar" name='.$noticia[0]'/>';
                    echo '</form>';
					echo '</div>';
					echo '<hr/>';
				}
			
				MySQLUtils::CloseSesssion();
					
			?>
        </div>
</div>