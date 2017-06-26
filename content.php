<?php
	$image = getProductImageObject(get_the_ID());
?>

<a href="<?php echo the_permalink(); ?>" class="tile">
	<figure>
		<div class="thumb-wrapper">
			<div class="thumb-inner">
				<img src="<?php echo $image['image']; ?>" alt="<?php echo get_the_title(); ?>">
			</div>
		</div>
	</figure>
	<figcaption>
		<strong><?php echo get_the_title(); ?></strong>
		<span>€</span><?php echo get_field('price', get_the_ID()); ?>
	</figcaption>
</a>