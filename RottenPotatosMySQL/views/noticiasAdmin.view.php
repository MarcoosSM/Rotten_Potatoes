<div class="noticiasRecientes">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
				foreach ($noticias as &$noticia) {
					echo '<div class="noticia">';
					echo '<form action="./views/modificarNoticia.view.php" method="POST" name="">';
                    echo '<h3>'.$noticia[1].'</h3>';
					echo '<p>'.$noticia[2].'</p>';
                    echo '<input type="submit" value="Modificar" name="'.$noticia[0].'"/>';
                    echo '<input type="submit" value="Eliminar" name="'.$noticia[0].'"/>';
                    echo '</form>';   
					echo '</div>';
					echo '<hr/>';
				}
			
			?>
        </div>
</div>