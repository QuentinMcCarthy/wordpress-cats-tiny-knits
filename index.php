<?php get_header(); ?>
		<div class="container mt-2">
			<div class="row">
				<div class="col">
					<h1><?php bloginfo( 'name' ); wp_title( '-', true, 'left'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<?php if ( have_posts() ): ?>
						<?php while ( have_posts() ): the_post(); ?>
							<div class="row">
								<?php if ( has_post_thumbnail() ): ?>
									<div class="col-4 pr-0">
										<?php the_post_thumbnail( 'medium', ['class' => 'img-fluid img-thumbnail'] ); ?>
									</div>
								<?php endif; ?>

								<div class="col pl-0">
									<?php the_content(); ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>
