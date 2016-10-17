<?php 

/**
 * custom hooks and actions
 */

if(!function_exists('aat_start_header_container')) :
	function aat_start_header_container(){
		echo '<div class="container-fluid">';
	}
endif;
add_action('aat_action_header', 'aat_start_header_container', 1);

if(!function_exists('aat_site_logo')):
	function aat_site_logo(){ ?>
	<div class="logo">
        <a href="<?= get_bloginfo('url'); ?>">
            <img id="logo-img" src="<?= get_theme_mod('aat_logo_upload'); ?>" alt="" class="normal" />
            <!-- <img src="<?php  //get_template_directory_uri() . '/img/logos/aat-logo.png'; ?>" alt="" class="gray-logo" /> -->
        </a>
    </div>	
	<?php } endif;
add_action('aat_action_header','aat_site_logo', 2);

if(!function_exists('aat_add_primary_navigation')):
	function aat_add_primary_navigation(){
		aat_reavel_primary_menu('primary');
	}
endif;
add_action('aat_action_header','aat_add_primary_navigation', 3);

if(!function_exists('aat_end_header_container')) :
	function aat_end_header_container(){
		echo '</div>';
	}
endif;
add_action('aat_action_header', 'aat_end_header_container', 4);

if(!function_exists('aat_primary_search_form')) :
	function aat_primary_search_form(){ ?>
		<form class="search-form" action="<?= get_bloginfo('url'); ?>">
		    <fieldset>
		        <a href="#" class="search-opener hidden-md hidden-lg">
		            <span class="icon-search"></span>
		        </a>
		        <div class="search-wrap">
		            <a href="#" class="search-opener close">
		                <span class="icon-cross"></span>
		            </a>
		            <div class="form-group">
		                <input type="text" name="s" class="form-control" placeholder="Search for Tours and Destinations" id="search-input">
		            </div>
		        </div>
		    </fieldset>
		</form>
<?php } endif;
add_action('aat_action_header', 'aat_primary_search_form', 5);

if(!function_exists('aat_reavel_footer_subscribe_form')){
	function aat_reavel_footer_subscribe_form(){
		echo do_shortcode('[contact-form-7 id="176" title="Contact form 1"]');
	}
}
add_action('aat_action_footer','aat_reavel_footer_subscribe_form',2);

if(!function_exists('aat_reavel_footer_social_links')){
	function aat_reavel_footer_social_links(){
		aat_reavel_footer_social_menu('footer_social_menu');
	}
}
//add_action('aat_action_footer','aat_reavel_footer_social_links',4);

if(!function_exists('aat_reavel_footer_buttom_content')){
	function aat_reavel_footer_buttom_content(){ ?>
			<div class="container footer-bottom">
				<div class="col-lg-6">
				<strong>
					<?php
						$copyright_text = get_theme_mod('aat_footer_text');
						echo $copyright_text;
					?>	
				</strong>
				</div> 
				<div class="col-lg-6">
				<?php aat_reavel_footer_social_menu('footer_social_menu'); ?>
				</div>
			</div><!-- end of container -->
	<?php
	}
}
add_action('aat_action_footer','aat_reavel_footer_buttom_content',50);