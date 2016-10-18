<?php



if ( ! function_exists( 'aat_main_slider_type_choices' ) ) :

	/**
	 * Returns the featured slider type.
	 *
	 * @return array Options array.
	 */
	function aat_main_slider_type_choices() {

		$choices = array(
			'from-page'     => __( 'From Pages', 'aat-reavel' ),
			'from-category' => __( 'From Category', 'aat-reavel' ),
			'from-post'     => __( 'From Posts', 'aat-reavel' ),
			'from-image'    => __( 'Static Images', 'aat-reavel' ),
		);
		$output = apply_filters( 'aat_filter_main_slider_type', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

