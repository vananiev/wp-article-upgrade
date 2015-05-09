<?php /*
		Выдача ссылки на изображение. Указывается при помощи IMAGE = адрес_в_папке_wp-content\uploads\
*/?>

<?php
		//получение изображения
		$val = get_post_meta($post->ID, 'IMAGE', true);
		if($val !="" && ($page==0 || $page==1)){
	 ?>
			<img border="1" src="<?php echo "/wp-content/uploads/".$val; ?>" width="100" height="100" align="left" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">	
<?php 	} ?>