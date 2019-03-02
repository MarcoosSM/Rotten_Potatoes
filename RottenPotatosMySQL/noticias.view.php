<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				foreach ($noticias as &$noticia) {
					echo '<noticias class="noticia">';
					echo '	<h3>'. $noticia[0].'</h3>';
					echo '	<p>'.$noticia[1].'</p>';
					echo '</noticias>';
					echo '<hr/>';
				}
			
				
					
			?>
        </div>
</div>