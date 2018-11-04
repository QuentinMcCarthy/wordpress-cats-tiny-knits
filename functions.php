<?php
	/* Table of Contents:
		1.0 Plugins
		2.0 Theme Actions
			2.1 Stylesheets and Scripts
			2.2 Menus
			2.3 Sidebars
		3.0 Theme Support
	*/


	// 1.0 Plugins
	require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';

	// 2.0 Theme Actions

	// 2.1 Stylesheets and Scripts
	add_action( 'wp_enqueue_scripts', function() {
		$css_directory = get_template_directory_uri().'/assets/css/';
		$js_directory = get_template_directory_uri().'/assets/js/';

		// Stylesheets
		wp_enqueue_style( 'bootstrap', $css_directory.'bootstrap.min.css', array(), '4.1.3', 'all' );

		// Scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrapjs', $js_directory.'bootstrap.min.js', array(), '4.1.3', true );
	});

	// 2.2 Menus
	add_action( 'init', function() {
		// Default navigation menu
		register_nav_menu( 'defaultnav', __( 'Default Navigation' ) );
	});

	// 2.3 Sidebars
	add_action( 'widgets_init', function() {
		register_sidebar(array(
			'id'            => 'sidebar-main',
			'name'          => __( 'Main Sidebar', 'theme-slug' ),
			'description'   => __( 'Main sidebar appears on all pages', 'theme-slug' ),
			'before_widget' => '<div id="%1$s" class="custom-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	});


	// 3.0 Theme Support
	add_theme_support( 'post-thumbnails' );
