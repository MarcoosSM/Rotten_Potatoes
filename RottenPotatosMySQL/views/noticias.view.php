<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				foreach ($noticias as &$noticia) {
					echo '<div class="noticia">';
					echo '	<h3>'. $noticia[1].'</h3>';
					echo '	<p>'.$noticia[2].'</p>';
					echo '</div>';
					echo '<hr/>';
				}
			
			?>
        </div>
</div>