<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package aat
 */


if(! function_exists('aat_doctype')):
	/**
	 * Doctype Declaration
	 */
	function aat_doctype(){ ?>
		<!DOCTYPE html><html <?php language_attributes(); ?>>

<?php } endif;
add_action('aat_action_doctype','aat_doctype',10);

if(!function_exists('aat_head')):

 	function aat_head(){ ?>
 		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } endif;
add_action('aat_action_head', 'aat_head',10);

if(!function_exists('aat_page_start')):
	function aat_page_start(){ ?>
			<div id="wrapper">
<?php } endif;
add_action('aat_action_before','aat_page_start');

if(!function_exists('aat_page_end')):
 	function aat_page_end(){ ?>
 	</div><!--div#wrapper-->
<?php } endif;
add_action('aat_action_after', 'aat_page_end');

if (!function_exists('aat_page_inner_start')): 
	function aat_page_inner_start(){ ?>
 		<div id="page-wrapper">
<?php } endif;
add_action('aat_action_before_content', 'aat_page_inner_start');

if (!function_exists('aat_page_inner_end')): 

 	function aat_page_inner_end(){ ?>
 		</div><!-- end div#page-wrapper -->
<?php } endif;
add_action('aat_action_after_content', 'aat_page_inner_end');

//header's hooks

if(!function_exists('aat_header_start')):
	function aat_header_start(){

		$all_customizer = get_theme_mod('aat_reavel_all');


		echo '<header id="header" style="background-color:'.$all_customizer['header_color'].'" >';
	}
endif;
add_action('aat_action_before_header','aat_header_start');

if(!function_exists('aat_header_end')) : 
	function aat_header_end(){
		echo '</header><!-- end of header#header -->';
	}
endif;
add_action('aat_action_after_header','aat_header_end');

//footer hooks
if(!function_exists('aat_footer_start')):
	function aat_footer_start(){ ?>
		<footer id="footer">
<?php } endif;
add_action('aat_action_before_footer','aat_footer_start');

if(!function_exists('aat_reavel_start_footer_main_content')):
	function aat_reavel_start_footer_main_content(){ ?>
		<div class="container">
			<div class="footer-content">
<?php } endif;
add_action('aat_action_footer','aat_reavel_start_footer_main_content',1);

if(!function_exists('aat_reavel_footer_widgets')):
	function aat_reavel_footer_widgets(){ ?>
			<div class="row footer-holder">
				<?php 
					/**
					 * @description - aat contact detail widget
					 */
					if(is_active_sidebar('footere-sidebar-widget-1')){
						dynamic_sidebar('footere-sidebar-widget-1');
					}
				?>
			</div><!-- end .footer-holder -->
<?php } endif;
add_action('aat_action_footer','aat_reavel_footer_widgets',3);

if(!function_exists('aat_reavel_end_footer_main_content')):
	function aat_reavel_end_footer_main_content(){
		echo '</div></div><!-- end of container -->';
	}
endif;
add_action('aat_action_footer','aat_reavel_end_footer_main_content',10);

if(!function_exists('aat_footer_end')) : 
	function aat_footer_end(){ ?>
		</footer>
<?php } endif;
add_action('aat_action_after_footer','aat_footer_end');
