<?php 

/**
 * fallback functions
 */

if(!function_exists('aat_primary_menu_fallback')):
	/**
	 * fallback for primary menu
	 */
	function  aat_primary_menu_fallback(){
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'new_aat' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 8,
		) );
		echo '</ul>';
	}
endif;