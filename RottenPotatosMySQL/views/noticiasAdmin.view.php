<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				foreach ($noticias as &$noticia) {
					echo '<div class="noticia">';
					echo '<form action="./php_noticias/modificarNoticia.php" method="POST">';
                    echo '<h3>'.$noticia[1].'</h3>';
					echo '<p>'.$noticia[2].'</p>';
                    echo '<input type="submit" value="Modificar" name="'.$noticia[0].'"/>';
                    echo '</form>';   
					echo '</div>';
					echo '<hr/>';
				}
			
			?>
        </div>
</div>