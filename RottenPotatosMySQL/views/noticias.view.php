<div class="noticiasRecientes paginacion">
        <h2>Noticias Recientes</h2>
        <div class="contenidoCentral">
            <?php
            if(isset($noticias)){
                if((sizeof ($noticias))>0){
                    foreach ($noticias as &$noticia) {
                        echo '<div class="noticia">';
                        echo '	<h3>'. $noticia[1].'</h3>';
                        echo '	<p>'.$noticia[2].'</p>';
                        echo '</div>';
                        echo '<hr/>';
                    }
                        
                }else{
                    echo "No se han encontrado noticias";
                }

            }else{
               echo "No se han encontrado noticias";
            }
			?>
        </div>
        <div class="paginacion">
            <a href="#">&laquo;</a>
            <a class="active" href="#">1</a></li>
            <a href="#">2</a></li>
            <a href="#">3</a></li>
            <a href="#">4</a></li>
            <a href="#">5</a></li>
            <a href="#">&raquo;</a>
        </div>
</div>