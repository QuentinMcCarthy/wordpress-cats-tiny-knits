<?php
	/* Template Name: Carousel */
?>

<?php
	$args = array(
		'post_type' => 'carousel',
		'order'     => 'ASC',
		'orderby'   => 'date',
	);

	$all_carousel_images = new WP_Query($args);
?>

<?php if ( $all_carousel_images->have_posts() ): ?>
	<div id="front-page-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php $iterator = 0; ?>
			<?php while ( $all_carousel_images->have_posts() ): $all_carousel_images->the_post(); ?>
				<?php
					if ( $iterator == 0 ) {
						$class = 'active';
					} else {
						$class = '';
					}
				?>

				<?php if ( has_post_thumbnail() ): ?>
					<li data-target="#front-page-carousel" data-slide-to="<?php echo $iterator; ?>" class="<?php echo $class; ?>"></li>

					<?php $iterator++; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</ol>

		<div class="carousel-inner">
			<?php $iterator = 0; ?>
			<?php while ( $all_carousel_images->have_posts() ): $all_carousel_images->the_post(); ?>
				<?php
					if ( $iterator == 0 ) {
						$class = 'carousel-item active';
					} else {
						$class = 'carousel-item';
					}
				?>

				<?php if ( has_post_thumbnail() ): ?>
					<div class="<?php echo $class ?>">
						<div class="carousel-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
					</div>

					<?php $iterator++; ?>
				<?php endif; ?>

				<?php $iterator++; ?>
			<?php endwhile; ?>
		</div>
		<a class="carousel-control-prev" href="#front-page-carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#front-page-carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
<?php endif; ?>
