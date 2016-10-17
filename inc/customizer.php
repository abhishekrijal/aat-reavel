<?php
/**
 * AAT Reavel Theme Customizer.
 *
 * @package AAT_Reavel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aat_reavel_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	//custom customizer

	//create header background setting
	$wp_customize->add_setting( 'aat_reavel_all[header_color]',array(
			'default' => '',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 
			'aat_reavel_all[header_color]', array(
				'label' =>__('Header Background Color', 'aat-reavel'),
				'section' => 'aat_site_options_section'
			)
		)
	);

	//header background setting
	$wp_customize->add_setting( 'header_banner_image',array(
			'default' => '',
			'type' => 'theme_mod',
			'transport' => 'postMessage'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
        	$wp_customize,
    		'header_banner_image',
			array(
				'label'    => 'Header Banner Image',
				'settings' => 'header_banner_image',
				'section'  => 'aat_site_options_section'
    		)
    	)
	);

	/**
	 * AAT Theme Options Panel
	 */
	$wp_customize->add_panel( 'aat-options-panel', array(
	    'priority' => 3,
	    'capability' => 'edit_theme_options',
	    'title' => __( 'AAT Theme Options', 'aat-reavel' ),
	    'description' => __( 'All Theme Options', 'aat-reavel' ),
	) );
	/**
	 * Sections for site options inside panel 'aat-options-panel'
	 */
	$wp_customize->add_section(
		'aat_site_options_section',
		array(
			'title' => __('Site Options','aat-reavel'),
			'description' => __('Update Site Options', 'aat-reavel'),
			'priority' => 4,
			'panel' => 'aat-options-panel',
		)
	);
	/**
	 * Settings in the section Site Options
	 */
	$wp_customize->add_setting( 
		'aat_logo_upload', 
		array(
			'default' => '',
			'transport' => 'postMessage'
		) 
	);
	/**
	 * Controls for setting aat logo
	 */
 	$wp_customize->add_control(
    	new WP_Customize_Image_Control(
        	$wp_customize,
    		'aat_logo_upload',
			array(
				'label'    => __('LOGO image Upload','aat_reavel'),
				'settings' => 'aat_logo_upload',
				'section'  => 'aat_site_options_section'
    		)
    	)
	);

	$wp_customize->add_setting( 
		'aat_footer_text', 
		array(
			'default' => ''
		) 
	);

	$wp_customize->add_control(
    	new WP_Customize_Control(
        	$wp_customize,
    		'aat_footer_text',
			array(
				'label'    => __('AAT Footer copyright text','aat_reavel'),
				'settings' => 'aat_footer_text',
				'section'  => 'aat_site_options_section'
    		)
    	)
	);
			
		/**
		 * Section 
		 */

		$wp_customize->add_section(
			'aat_banner_update_section',
			array(
				'title' => __('Set Banner for Pages','aat_reavel'),
				'description' => __('Update banner for Pages', 'aat_reavel'),
				'priority' => 5,
				'panel' => 'aat-options-panel'
			)
		);


		$pages = get_pages();
		$page_title= array();
		for ($i=0; $i <= count($pages); $i++) { 

			$page_title[$i] = str_replace('-', '_' , $pages[$i]->post_name);
			
		}

		foreach($page_title as $v):

			$wp_customize->add_setting(
				'banner_' . $v,
				array(
					'default' => ''
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
		        	$wp_customize,
		    		'banner_' . $v,
					array(
						'label'    => $v .  ' Image',
						'settings' => 'banner_' . $v,
						'section'  => 'aat_banner_update_section'
		    		)
		    	)
			);

		endforeach;

		/**
		 * Section 
		 */

		$wp_customize->add_section(
			'aat_banner_update_section',
			array(
				'title' => __('Set Banner for Pages','aat_reavel'),
				'description' => __('Update banner for Pages', 'aat_reavel'),
				'priority' => 5,
				'panel' => 'aat-options-panel'
			)
		);


		$pages = get_pages();
		$page_title= array();
		foreach($pages as $i => $v):
			$page_title[$i] = array(
					'slug' => str_replace('-', '_' , $pages[$i]->post_name),
					'name' => $pages[$i]->post_title
				);
		endforeach;

		foreach($page_title as $v):

			$setting_id = 'banner_' . $v['slug'];
			$label = $v['name'] . ' Page Banner';
			$wp_customize->add_setting(
				$setting_id,
				array(
					'default' => ''
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
		        	$wp_customize,
		    		$setting_id,
					array(
						'label'    => $label,
						'settings' => $setting_id,
						'section'  => 'aat_banner_update_section'
		    		)
		    	)
			);

		endforeach;

		/**
		 * Section 
		 */

		$wp_customize->add_section(
			'aat_archive_banner_update_section',
			array(
				'title' => __('Set Banner for Archives','aat_reavel'),
				'description' => __('Update banner for Archives', 'aat_reavel'),
				'priority' => 5,
				'panel' => 'aat-options-panel',
				'active_callback' => 'is_archive'
			)
		);

		$categories = get_terms(array('taxonomy' => array('collection','category','country')));
		//print_r($categories);
		$categories_list = array();
		foreach($categories as $i => $v):
			$categories_list[$i] = array(
				'name' => $categories[$i]->name,
				'slug' => str_replace('-', '_' , $categories[$i]->slug)
				);
		endforeach;

		//print_r($categories_list);

		foreach($categories_list as $v):

			$setting_id = 'banner_' . $v['slug'];
			$label = $v['name'] . ' Archive Banner';

			$wp_customize->add_setting(
				$setting_id,
				array(
					'default' => ''
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
		        	$wp_customize,
		    		$setting_id,
					array(
						'label'    => $label,
						'settings' => $setting_id,
						'section'  => 'aat_archive_banner_update_section'
		    		)
		    	)
			);

		endforeach;



}
add_action( 'customize_register', 'aat_reavel_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aat_reavel_customize_preview_js() {
	wp_enqueue_script( 'aat_reavel_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aat_reavel_customize_preview_js' );


/**
 * Inject customizer when appropriate
 */

function aat_reavel_customizer_css(){

	$setting = get_theme_mods();
?>
<style type="text/css">
<?php
	foreach($setting as $i => $v) :
		if(preg_match('/banner_/',$i)) :
			echo "\t" . '#'. $i;
			echo '{' . "\n";
			echo "\t\t" . 'background : url("' . $v . '");' . "\n\t" . '}';
			echo "\n";
		endif;
	endforeach;
?>
</style>
<?php }
add_action('wp_head','aat_reavel_customizer_css');