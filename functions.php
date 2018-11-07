<?php
	/* Table of Contents:
		1.0:- Plugins
		2.0:- Stylesheets and Scripts
		3.0:- Init
			3.1:- Menus
			3.2:- Post Thumbnails
	*/


	// 1.0:- Plugins
	require_once get_template_directory().'/includes/class-wp-bootstrap-navwalker.php';

	require get_parent_theme_file_path( './includes/custom_customiser.php' );

	// 2.0:- Stylesheets and Scripts
	add_action( 'wp_enqueue_scripts', function() {
		$css_directory = get_template_directory_uri().'/assets/css/';
		$js_directory = get_template_directory_uri().'/assets/js/';

		// Stylesheets
		wp_enqueue_style( 'bootstrap', $css_directory.'bootstrap.min.css', array(), '4.1.3', 'all' );
		wp_enqueue_style( 'master', $css_directory.'master.css', array(), '0.0.1', 'all' );

		// Scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrapjs', $js_directory.'bootstrap.min.js', array(), '4.1.3', true );
	});

	// 3.0:- Init
	function custom_theme_init() {
		// 3.1:- Menus
		register_nav_menu( 'defaultnav', __( 'Default Navigation' ) );


		// 3.2:- Custom Post Types

		// 3.2.2:- Carousel Images
		$carousel_images_labels = array(
			'name'               => _x( 'Carousel Images', 'Post type name', '18wdwu02theme' ),
			'singular_name'      => _x( 'Carousel Image', 'Post type singular name', '18wdwu02theme' ),
			'add_new_item'       => _x( 'Add New Carousel Image', 'Adding new carousel image', '18wdwu02theme' ),
			'edit_item'          => _x( 'Edit Carousel Image', 'Editing carousel image', '18wdwu02theme' ),
			'new_item'           => _x( 'New Carousel Image', 'New carousel image', '18wdwu02theme' ),
			'view_item'          => _x( 'View Carousel Image', 'Viewing carousel image', '18wdwu02theme' ),
			'view_items'         => _x( 'View Carousel Images', 'Viewing carousel images', '18wdwu02theme' ),
			'search_items'       => _x( 'Search Carousel Images', 'Searching carousel images', '18wdwu02theme' ),
			'not_found'          => _x( 'No Carousel Images found', 'No carousel images found', '18wdwu02theme' ),
			'not_found_in_trash' => _x( 'No Carousel Images found in Trash', 'No Carousel Images found in Trash', '18wdwu02theme' ),
			'all_items'          => _x( 'All Carousel Images', 'All carousel images', '18wdwu02theme' ),
		);

		$carousel_images_supports = array(
			'title',
			'thumbnail',
		);

		$carousel_images_args = array(
			'labels'              => $carousel_images_labels,
			'description'         => 'Carousel images for the front-page carousel',
			'public'              => true,
			'hierarchical'        => true,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'menu_position'       => 57,
			'menu_icon'           => 'dashicons-images-alt2',
			'supports'            => $carousel_images_supports,
			'query_var'           => true,
		);

		register_post_type( 'carousel', $carousel_images_args );


		// 3.2:- Theme Support
		add_theme_support( 'post-thumbnails' );
	}

	add_action( 'init', 'custom_theme_init' );
