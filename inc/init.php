<?php	

	!defined('TEMP_DIR') ?  define('TEMP_DIR', get_template_directory()) : '';  
	/**
	* Implement the Custom Header feature.
	*/
	require TEMP_DIR . '/inc/custom-header.php';
	/**
	* Custom template tags for this theme.
	*/
	require TEMP_DIR . '/inc/template-tags.php';
	/**
	* Custom functions that act independently of the theme templates.
	*/
	require TEMP_DIR . '/inc/extras.php';
	/**
	* Customizer additions.
	*/
	require TEMP_DIR . '/inc/customizer.php';
	/**
	* Load Jetpack compatibility file.
	*/
	require TEMP_DIR . '/inc/jetpack.php';
	/**
	* Load Custom Post Type file.
	*/
	require TEMP_DIR . '/inc/custom-post.php';
	/**
	* Load custom meta box */
	require TEMP_DIR . '/inc/metabox.php';
	/**
	 * load hooks
	 */
	require TEMP_DIR . '/inc/custom-taxonomies.php';
	require TEMP_DIR . '/inc/hooks/helper.php';
	require TEMP_DIR . '/inc/hooks/structure.php';
	require TEMP_DIR . '/inc/hooks/custom.php';
	require TEMP_DIR . '/inc/ajax.php';