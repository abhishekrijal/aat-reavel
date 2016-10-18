
<?php


if ( ! function_exists( 'aat_main_slider_is_from_page_active' ) ) :

	/**
	 * Check if from page is active in slider is active.
	 *
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function aat_main_slider_is_from_page_active() {

		if (
		'from-page' === get_theme_mod('aat_main_slider_type')
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'aat_main_slider_is_from_category_active' ) ) :

	/**
	 * Check if from Category is active in slider is active.
	 *
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function aat_main_slider_is_from_category_active() {

		if (
		'from-category' === get_theme_mod('aat_main_slider_type')
		) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'aat_main_slider_is_from_images_active' ) ) :

	/**
	 * Check if from Images is active in slider is active.
	 *
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function aat_main_slider_is_from_images_active() {

		if (
		'from-image' === get_theme_mod('aat_main_slider_type')
		) {
			return true;
		} else {
			return false;
		}

	}

endif;


