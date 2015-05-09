<?php /*
		Выдача ссылки на скачивание. Указывается при помощи FILE = адрес_в_папке_wp-content\uploads\
*/?>

<?php
	//получение ссылки на скачивание
	$val = get_post_meta($post->ID, 'FILE', true);
	if($val !=""){ ?>
		<h3><a href="<?php echo "/wp-content/uploads/".$val; ?>" title="<?php the_title(); ?> Скачать бесплатно без регистрации">[<?php the_title(); ?> Скачать бесплатно без регистрации]</a></h3>	
<?php } ?>
