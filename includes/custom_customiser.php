<?php
	/* Table of Contents:
		1.0:- Customizer Settings
			1.1:- Header Styles Section
			1.2:- Header Background Styles Settings
			1.3:- Header Background Styles Control
			1.4:- Header Text Styles Settings
			1.5:- Header Text Styles Control
			1.6:- Carousel Section
			1.7:- Carousel Height Settings
			1.8:- Carousel Height Control
		2.0:- Customizer Styles
			2.1:- Header Background Styles
			2.2:- Header Text Styles
			2.3:- Carousel Height Styles
	*/


	// 1.0:- Customizeer Settings
	function custom_theme_customizer( $wp_customize ) {
		// 1.1:- Header Styles Section
		$header_styles_section_args = array(
			'title'    => __( 'Header Styles', 'catstinyknits' ),
			'priority' => 20,
		);

		$wp_customize->add_section( 'custom_theme_header_info', $header_styles_section_args );

		// 1.2:- Header Background Styles Settings
		$header_background_colour_setting_args = array(
			'default'   => '#343a40',
			'transport' => 'refresh',
		);

		$wp_customize->add_setting( 'header_background_colour_setting', $header_background_colour_setting_args);

		// 1.3:- Header Background Styles Control
		$header_background_colour_control_args = array(
			'label'    => __( 'Header Background Colour', 'catstinyknits' ),
			'section'  => 'custom_theme_header_info',
			'settings' => 'header_background_colour_setting',
		);

		$header_background_colour_control = new WP_Customize_Color_Control( $wp_customize, 'header_background_colour_control', $header_background_colour_control_args );

		$wp_customize->add_control( $header_background_colour_control );


		// 1.4:- Header Text Styles Settings
		$header_link_colour_control_args_colour_setting_args = array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
		);

		$wp_customize->add_setting( 'header_link_colour_setting', $header_link_colour_control_args_colour_setting_args );

		// 1.5:- Header Text Styles Control
		$header_link_colour_control_args = array(
			'label'   => __( 'Header Link Colour', 'catstinyknits' ),
			'section' => 'custom_theme_header_info',
			'settings' => 'header_link_colour_setting',
		);

		$header_link_colour_control_args_colour_control = new WP_Customize_Color_Control( $wp_customize, 'header_link_colour_control', $header_link_colour_control_args );

		$wp_customize->add_control( $header_link_colour_control_args_colour_control );


		// 1.5:- Carousel Section
		$carousel_styles_section_args = array(
			'title'    => __( 'Carousel Options', 'catstinyknits' ),
			'priority' => 21,
		);

		$wp_customize->add_section( 'custom_theme_carousel_info', $carousel_styles_section_args );

		// 1.6:- Carousel Height Settings
		$carousel_height_setting_args = array(
			'default'   => '50',
			'transport' => 'refresh',
		);

		$wp_customize->add_setting( 'carousel_height_setting', $carousel_height_setting_args );

		// 1.7:- Carousel Height Control
		$input_attrs = array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		);

		$carousel_height_control_args = array(
			'label'       => __( 'Carousel Height', 'catstinyknits' ),
			'section'     => 'custom_theme_carousel_info',
			'settings'    => 'carousel_height_setting',
			'type'        => 'number',
			'input_attrs' => $input_attrs,
		);

		$carousel_height_control = new WP_Customize_Control( $wp_customize, 'carousel_height_control', $carousel_height_control_args );

		$wp_customize->add_control( $carousel_height_control );
	}

	add_action( 'customize_register', 'custom_theme_customizer' );


	// 2.0:- Customizer Styles
	function custom_theme_customizer_styles() {
		?>
		<style type="text/css">
			/* 2.1:- Header Background Styles */
			.header-bg {
				background-color: <?php echo get_theme_mod( 'header_background_colour_setting', '#343a40' ); ?> !important;
			}

			/* 2.2:- Header Text Styles */
			.navbar-dark .navbar-nav .nav-link {
				color: <?php echo get_theme_mod( 'header_link_colour_setting', '#ffffff' ); ?> !important;
				opacity: 0.5;
			}

			.navbar-dark .navbar-nav .active>.nav-link,
			.navbar-dark .navbar-nav .nav-link.active,
			.navbar-dark .navbar-nav .nav-link.show,
			.navbar-dark .navbar-nav .show>.nav-link {
				color: <?php echo get_theme_mod( 'header_link_colour_setting', '#ffffff'); ?> !important;
				opacity: 1;
			}

			/* Carousel Height Styles */
			.carousel-image {
				padding-top: <?php echo get_theme_mod( 'carousel_height_setting', '50' ).'%'; ?> !important;
			}
		</style>
		<?php
	}

	add_action( 'wp_head', 'custom_theme_customizer_styles' );
