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
            <?php 
                if(isset($numPaginas)){
                    for ($i = 1; $i <= $numPaginas; $i++) {
                        if($i==$paginaActual){
                           echo " <a class='active' href='?pagina=$i'>$i</a></li>";
                        }else{
                            echo " <a href='?pagina=$i'>$i</a></li>";
                        }
                    }
                }
            ?>
        </div>
</div>