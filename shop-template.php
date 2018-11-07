<?php
	/* Template Name: Shop Form */
?>

<?php
	$args = array(
		'post_type' => 'shop_inputs',
		'order'     => 'ASC',
		'orderby'   => 'title',
	);

	$all_shop_inputs = new WP_Query($args);
?>

<?php get_header(); ?>
	<div class="row mt-2">
		<div class="col">
			<h1><?php bloginfo( 'name' ); wp_title( '-', true, 'left'); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ): the_post(); ?>
					<form class="" action="confirm-buy-template.php" method="post">
						<?php if ( $all_shop_inputs->have_posts() ):  ?>
							<?php while ( $all_shop_inputs->have_posts() ): $all_shop_inputs->the_post(); ?>
								<div class="card text-light bg-secondary">
									<div class="card-body">
										<h5 class="card-title"><?php the_title(); ?></h5>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</form>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
