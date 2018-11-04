<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<title><?php wp_title( '-', true, 'right'); bloginfo( 'name' ); ?></title>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php if ( has_nav_menu( 'defaultnav' ) ): ?>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#default-nav-container" aria-controls="default-nav-container" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="#">Navbar</a>

				<?php
					wp_nav_menu(array(
						'theme_location'  => 'defaultnav',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'default-nav-container',
						'menu_class'      => 'navbar-nav mr-auto',
						'menu_id'         => 'default-nav-menu',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					));
				?>
			</nav>
		<?php endif; ?>
