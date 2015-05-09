<?php /*
		Выдача перелинковки внутри статьи
*/?>

<p align="center">- <?php echo $page;?> -</p>
<?php if($numpages>=2){ ?>
<p><strong>Страницы: 
<a href="<?php echo the_permalink()."&page=".($page%$numpages+1)."\">".($page%$numpages+1);?></a>
<a href="<?php echo the_permalink()."&page=".(($page+1)%$numpages+1)."\">".(($page+1)%$numpages+1);?></a>
<?php if($numpages>=3){ ?>				
<a href="<?php echo the_permalink()."&page=".(($page+2)%$numpages+1)."\">".(($page+2)%$numpages+1);?></a>
<?php }} ?>
</strong></p>

<div class="SearchBox">
	<form method="GET" action="<?php the_permalink(); ?>">
		
			<p align="center">
			<input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
			<input id="pagebox" type="text" value="<?php echo ($page+1); ?>" name="page" alt="<?php the_title(); ?> Выберите страницу."> <input type="submit" id="pagebutton" value="Переидти" alt="<?php the_title(); ?> Переидти на страницу.">
			</p>
		
	</form>
</div>