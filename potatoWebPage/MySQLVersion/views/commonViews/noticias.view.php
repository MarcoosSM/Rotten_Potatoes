<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				require('./MySQLUtils.php');
				MySQLUtils::StartSession();
			
				$noticias = MySQLUtils::getNew();
			
				#$noticias = array(array("Titulo1","contenido1"),array("Titulo2","contenido2"));
			
				foreach ($noticias as &$noticia) {
					echo '<div class="noticia">';
					echo '	<h3>'. $noticia[0].'</h3>';
					echo '	<p>'.$noticia[1].'</p>';
					echo '</div>';
					echo '<hr/>';
				}
			
				MySQLUtils::CloseSesssion();
					
			?>
        </div>
</div>