<div class="noticiaForm">
	<form action="modificarNoticia.php" method="post" class="formNoticia">
		<input type="submit">
		<input type="text" name="title" value="<?php echo $title ?>">
		<textarea name="content">
			<?php
				echo $content
			?>
		</textarea>
	</form>
</div>