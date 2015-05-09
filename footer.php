<?php
/*
	Выбор популярных тем, обозначенных при помощи ТOP = true 
	и их смешение с ссылками Sape.ru
*/
?>
<?php $p=$post;
	$title=$post->post_title;?>
	<?php
	//Вывод Смотрите также
	$link[128];
	$cnt=0;  //количество избранных статей в категории
	$all=0; //Общее количество статей в категории
	$link[0]=-1;
	//поиск ссылок
	$category = get_the_category();
	$posts = get_posts('numberposts=-1&category='.$category[0]->cat_ID);
	foreach($posts as $post) :
		$all++;
		$val = get_post_meta($post->ID, 'TOP', true); 
		if($val == 'true' && $title !==$post->post_title)
			$link[$cnt++] =$post->ID;
			 
	endforeach;
	global $sape;
	$total_links = 0;
	if (is_array($sape->_links_page)) 
		$total_links = count($sape->_links_page);
	if($link[0]!=-1 || $total_links !=0){ ?>
		<h3>Смотрите также:</h3>
		<ul>
	<?php }
	if($link[0]!=-1){ ?>
		<?php 
		//выбор выводимых сылок
		$x0=$p->ID + $page;
		$ferst=$x0 % $cnt;
		$tic = (int)($x0 / 1000);
		$x0=$x0 - $tic*1000;
		$cot = (int)($x0/100);
		$x0=$x0 - $cot*100;
		$dec = (int)($x0/10);
		$x0=$x0 - $dec*10;
		$ed = $x0;
		//
		$second = ($ferst+$dec)%$cnt;
		$third = ($ferst+$dec+$ed)%$cnt;
		//
		global $post;
		$post = get_post($link[$ferst], OBJECT);
		?>
		<a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a><br>
	
		<?php $post = get_post($link[$second], OBJECT);
		if($second != $ferst){ ?>
			<a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a><br>
	
			<?php }; 
		echo $sape->return_links(1)."<br>"; 
		$post = get_post($link[$third], OBJECT);
		if($third != $ferst && $third != $second){ ?>
			<a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a><br>
		
	<?php 
			}
		}
	echo $sape->return_links();
	 ?>
	<br>
	</ul>