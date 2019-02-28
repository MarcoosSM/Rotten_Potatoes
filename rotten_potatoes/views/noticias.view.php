<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				require('../php_noticias/MySQLUtils.php');
				MySQLUtils::StartSession();
			
				$noticias = MySQLUtils::getNew();
			
				#$noticias = array(array("Titulo1","contenido1"),array("Titulo2","contenido2"));
			
				foreach ($noticias as &$noticia) {
					echo '<noticias class="noticia">';
					echo '	<h3>'. $noticia[0].'</h3>';
					echo '	<p>'.$noticia[1].'</p>';
					echo '</noticias>';
					echo '<hr/>';
				}
			
				MySQLUtils::CloseSesssion();
					
			?>
        </div>
</div>