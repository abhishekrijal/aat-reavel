<?php 

//Customizer Setting for the Main Slider.

// Add Panel.
$wp_customize->add_section(
		'aat_main_slider_options_section',
		array(
			'title' => __('Front Page Slider','aat-reavel'),
			'description' => __('Update Front Page Main Slider Options', 'aat-reavel'),
			'priority' => 3,
			'panel' => 'aat-options-panel',
		)
	);
	// Setting featured_slider_type.
$wp_customize->add_setting( 'aat_main_slider_type',
	array(
	'default'           => 'from-page',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => '',
	)
);
$wp_customize->add_control( 'aat_main_slider_type',
	array(
	'label'           => __( 'Select Slider Type', 'aat-reavel' ),
	'section'         => 'aat_main_slider_options_section',
	'type'            => 'select',
	'priority'        => 100,
	'choices'         => aat_main_slider_type_choices(),
	
	)
);

// Setting Main Front Page_slider_number.
$wp_customize->add_setting( 'aat_main_slider_no_of_slides',
	array(
	'default'           => 3,
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'sanitize_callback' => '',
	)
);
$wp_customize->add_control( 'aat_main_slider_no_of_slides',
	array(
	'label'           => __( 'No of Slides', 'aat-reavel' ),
	'description'     => __( 'Between 1 and 20. Save and refresh the page if No of Slides is changed. ', 'aat-reavel' ),
	'section'         => 'aat_main_slider_options_section',
	'type'            => 'number',
	'priority'        => 100,
	'input_attrs'     => array( 'min' => 1, 'max' => 20, 'step' => 1, 'style' => 'width: 55px;' ),
	)
);

$main_slider_no_of_slides = get_theme_mod('aat_main_slider_no_of_slides');

//For Multiple Pages
if ( $main_slider_no_of_slides > 0 ) {
	for ( $i = 1; $i <= $main_slider_no_of_slides; $i++ ) {
		$wp_customize->add_setting( "aat_main_slider_page_$i",
			array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => '',
			'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( "aat_main_slider_page_$i",
			array(
			'label'           => __( 'Page', 'aat-reavel' ) . ' #' . $i,
			'section'         => 'aat_main_slider_options_section',
			'type'            => 'dropdown-pages',
			'priority'        => 100,
			'active_callback' => 'aat_main_slider_is_from_page_active',
			)
		);

		$wp_customize->add_setting( "aat_main_slider_image_heading_$i",
			array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			)
		);
			$wp_customize->add_control( "aat_main_slider_image_heading_$i",
				array(
					'label'           => __( 'Slide', 'aat-reavel' ) . ' #' . $i,
					'section'         => 'aat_main_slider_options_section',
					'settings'        => "aat_main_slider_image_heading_$i",
					'priority'        => 100,
					'active_callback' => 'aat_main_slider_is_from_images_active',
				)
		);

		$wp_customize->add_setting( "aat_main_slider_static_image_$i",
			array(
			'default'           => 	'',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, "aat_main_slider_static_image_$i",
				array(
					'label'           => __( 'Image', 'aat-reavel' ),
					'section'         => 'aat_main_slider_options_section',
					'settings'        => "aat_main_slider_static_image_$i",
					'priority'        => 100,
					'active_callback' => 'aat_main_slider_is_from_images_active',
				)
			)
		);

		$wp_customize->add_setting( "aat_main_slider_image_title_$i",
			array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( "aat_main_slider_image_title_$i",
			array(
			'label'           => __( 'Title', 'aat-reavel' ),
			'section'         => 'aat_main_slider_options_section',
			'type'            => 'text',
			'priority'        => 100,
			'active_callback' => 'aat_main_slider_is_from_images_active',
			)
		);

		$wp_customize->add_setting( "aat_main_slider_image_caption_$i",
			array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => '',
			)
		);
		$wp_customize->add_control( "aat_main_slider_image_caption_$i",
			array(
			'label'           => __( 'Caption', 'aat-reavel' ),
			'section'         => 'aat_main_slider_options_section',
			'type'            => 'textarea',
			'priority'        => 100,
			'active_callback' => 'aat_main_slider_is_from_images_active',
			)
		);

		$wp_customize->add_setting( "aat_main_slider_image_url_$i",
			array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control( "aat_main_slider_image_url_$i",
			array(
			'label'           => __( 'Link', 'aat-reavel' ),
			'section'         => 'aat_main_slider_options_section',
			'type'            => 'url',
			'priority'        => 100,
			'active_callback' => 'aat_main_slider_is_from_images_active',
			)
		);
	} // End for loop.
}

//For Categories



$wp_customize->add_setting( 'main_slider_category_dropdown',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new AAT_WEBSITE_TAXONOMY_CONTROL( $wp_customize, 'main_slider_category_dropdown',
		array(
			'label'           => __( 'Select Category', 'aat-reavel' ),
			'section'         => 'aat_main_slider_options_section',
			'settings'        => 'main_slider_category_dropdown',
			'priority'        => 100,
			'active_callback' => 'aat_main_slider_is_from_category_active',
		)
	)
);