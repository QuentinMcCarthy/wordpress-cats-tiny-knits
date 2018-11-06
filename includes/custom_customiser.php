<?php
	/* Table of Contents:
		1.0:- Customizer Settings
			1.1:- Carousel Section
			1.2:- Carousel Height Settings
			1.3:- Carousel Height Control
		2.0:- Customizer Styles
			2.1:- Carousel Height Styles
	*/


	// 1.0:- Customizeer Settings
	function custom_theme_customizer( $wp_customize ) {
		// 1.5:- Carousel Section
		$carousel_styles_section_args = array(
			'title'    => __( 'Carousel Options', 'catstinyknits' ),
			'priority' => 20,
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
			/* 2.1:- Carousel Height Styles */
			.carousel-image {
				padding-top: <?php echo get_theme_mod( 'carousel_height_setting', '50' ).'%'; ?> !important;
			}
		</style>
		<?php
	}

	add_action( 'wp_head', 'custom_theme_customizer_styles' );
