<?php
	/* Table of Contents:
		1.0:- Plugins
		2.0:- Stylesheets and Scripts
		3.0:- Init
			3.1:- Menus
			3.2:- Custom Post Types
				3.2.1:- Carousel Images
				3.2.2:- Shop Form Inputs
			3.3:- Post Thumbnails
		4.0:- Sidebars
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

		// 3.2.1:- Carousel Images
		$carousel_images_labels = array(
			'name'               => _x( 'Carousel Images', 'Post type name', 'catstinyknits' ),
			'singular_name'      => _x( 'Carousel Image', 'Post type singular name', 'catstinyknits' ),
			'add_new_item'       => _x( 'Add New Carousel Image', 'Adding new carousel image', 'catstinyknits' ),
			'edit_item'          => _x( 'Edit Carousel Image', 'Editing carousel image', 'catstinyknits' ),
			'new_item'           => _x( 'New Carousel Image', 'New carousel image', 'catstinyknits' ),
			'view_item'          => _x( 'View Carousel Image', 'Viewing carousel image', 'catstinyknits' ),
			'view_items'         => _x( 'View Carousel Images', 'Viewing carousel images', 'catstinyknits' ),
			'search_items'       => _x( 'Search Carousel Images', 'Searching carousel images', 'catstinyknits' ),
			'not_found'          => _x( 'No Carousel Images found', 'No carousel images found', 'catstinyknits' ),
			'not_found_in_trash' => _x( 'No Carousel Images found in Trash', 'No Carousel Images found in Trash', 'catstinyknits' ),
			'all_items'          => _x( 'All Carousel Images', 'All carousel images', 'catstinyknits' ),
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
			'menu_position'       => 25,
			'menu_icon'           => 'dashicons-images-alt2',
			'supports'            => $carousel_images_supports,
			'query_var'           => true,
		);

		register_post_type( 'carousel_images', $carousel_images_args );

		// 3.2.2:- Shop Form Inputs
		$shop_inputs_labels = array(
			'name'               => _x( 'Shop Inputs', 'Post type name', 'catstinyknits' ),
			'singular_name'      => _x( 'Shop Option', 'Post type singular name', 'catstinyknits' ),
			'add_new_item'       => _x( 'Add New Shop Option', 'Adding new shop option', 'catstinyknits' ),
			'edit_item'          => _x( 'Edit Shop Option', 'Editing shop option', 'catstinyknits' ),
			'new_item'           => _x( 'New Shop Option', 'New shop option', 'catstinyknits' ),
			'view_item'          => _x( 'View Shop Option', 'Viewing shop option', 'catstinyknits' ),
			'view_items'         => _x( 'View Shop Inputs', 'Viewing shop inputs', 'catstinyknits' ),
			'search_items'       => _x( 'Search Shop Inputs', 'Searching shop inputs', 'catstinyknits' ),
			'not_found'          => _x( 'No Shop Inputs found', 'No shop inputs found', 'catstinyknits' ),
			'not_found_in_trash' => _x( 'No Shop Inputs found in Trash', 'No Shop Inputs found in Trash', 'catstinyknits' ),
			'all_items'          => _x( 'All Shop Inputs', 'All shop inputs', 'catstinyknits' ),
		);

		$shop_inputs_supports = array(
			'title',
			'custom-fields',
		);

		$shop_inputs_args = array(
			'labels'              => $shop_inputs_labels,
			'description'         => 'Inputs for the shop form',
			'public'              => true,
			'hierarchical'        => true,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'menu_position'       => 26,
			'menu_icon'           => 'dashicons-feedback',
			'supports'            => $shop_inputs_supports,
			'query_var'           => true,
		);

		register_post_type( 'shop_inputs', $shop_inputs_args );


		// 3.3:- Post Thumbnails
		add_theme_support( 'post-thumbnails' );
	}

	add_action( 'init', 'custom_theme_init' );

	// 4.0:- Sidebars
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
