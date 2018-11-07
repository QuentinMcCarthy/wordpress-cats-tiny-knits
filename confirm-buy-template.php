<?php
	/* Template Name: Shop Confirmation */
?>

<?php get_header(); ?>
	<div class="row mt-2">
		<div class="col">
			<h1><?php bloginfo( 'name' ); wp_title( '-', true, 'left'); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<form class="" action="confirm-buy-template.php" method="post">
				<div class="form-group">

				</div>
			</form>

			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ): the_post(); ?>
					<div class="row mt-1 border-top pt-1">
						<?php if ( has_post_thumbnail() ): ?>
							<div class="col-4 pr-0">
								<?php the_post_thumbnail( 'medium', ['class' => 'img-fluid img-thumbnail'] ); ?>
							</div>

							<?php $contentClass = 'col pl-0' ?>
						<?php else: ?>
							<?php $contentClass = 'col'; ?>
						<?php endif; ?>

						<div class="<?php echo $contentClass ?>">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
