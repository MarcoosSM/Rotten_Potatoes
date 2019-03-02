<div class="noticiasRecientes paginacion">
    <section class="paginacion">
        <ul>
            <li class="disabled"><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
            
        </ul>
    </section>
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
</div>