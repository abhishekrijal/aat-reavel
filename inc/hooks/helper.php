<?php

/**
 * helper functions
 */

function aat_reavel_is_pagination(){
	global $wp_query;
	$post_per_page = get_option('posts_per_page');
	return ($wp_query->found_posts > $post_per_page);
}

function aat_reavel_create_breadcrumb(){
	if(is_archive()) : 

		$breadcrumbs = '';
		$breadcrumbs .= '<nav class="breadcrumbs">';
		$breadcrumbs .=	'<ul>';
		$breadcrumbs .= '<li><a href="/"><span class="icon-home"></span></a></li>';

		if(is_category()) :
			$breadcrumbs .= '<li>Category</li>';
		elseif(is_tax('country')) : 
			$tax = 'country';
			$current_term = get_query_var('term');
			$term = get_term_by('slug',$current_term,$tax);
			// $breadcrumbs .= is_wp_error($term) ? '' : '<li><a href="' . get_term_link($current_term) . '">' . $term->name . '</a></li>';
		endif;
		$breadcrumbs .= '</ul>';
		$breadcrumbs .= '</nav>';

		return $breadcrumbs;

	elseif(is_page()) :
		$breadcrumbs = '';
		$breadcrumbs .= '<nav class="breadcrumbs">';
		$breadcrumbs .=	'<ul>';
		$breadcrumbs .= '<li><a href="#"><span class="icon-home"></span></a></li>';
		$breadcrumbs .= '<li>Trekking</li>';
		$breadcrumbs .= '</ul>';
		$breadcrumbs .= '</nav>';

		return $breadcrumbs;
	endif;
}

function get_package_grade(){
	$grade = CFS()->get('grade');
	$g = '';
	if(isset($grade)){
		foreach($grade as $v){
			$g .= $v;
		}
	}
	return $g;
}

if(!function_exists('aat_reavel_main_search_form')):
	function aat_reavel_main_search_form(){

        $form = '<form class="search-form" ';
		$form .= 'method = "get" ';
		$form .= 'action = "';
		$form .= esc_url( home_url( '/' ) ) . '">';
		$form .= '<fieldset>';
		$form .= '<a href="#" class="search-opener hidden-md hidden-lg"><span class="icon-search"></span></a>';
		$form .= '<div class="search-wrap"><a href="#" class="search-opener close"><span class="icon-cross"></span></a>';
		$form .= '<div class="form-group"><input type="text" class="form-control" placeholder="Search whole site" id="search-input" name="s"></div></div>';
		$form .= '</fieldset>';
		$form .= '</form>';
		$result = apply_filters('get_search_form',$form);
		return $result;
	}
endif;
/*
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function get_discounted_price($original_price = '',$discount = 0){
	$original_price = intval($original_price);
	$discount = intval($discount);

	$discounted_price = $original_price * (1 - ($discount/100));
	return $discounted_price;
}

//check if all needles are present in the  haystack
function aat_reavel_in_array_all($needles,$haystack){
	return (count(array_intersect($haystack,$needles)) == count($needles)) ? true : false;
}

function aat_reavel_primary_menu($theme_location){
	if(($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])):
		$menu = get_term($locations[$theme_location],'nav_menu'); //get all the menu term from given menu location
		$menu_items = wp_get_nav_menu_items($menu->term_id,array( 'order' => 'DESC' )); //nav menu items

		echo '<nav class="navbar navbar-default">';
		echo '<div class="navbar-header">';
		echo '<button type="button" class="navbar-toggle nav-opener" data-toggle="collapse" data-target="#nav" aria-expanded="true">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 </button>';
		echo '</div>';
		echo '<div class="collapse navbar-collapse" id="nav">';
		echo '<ul class="nav navbar-nav">';

		foreach($menu_items as $item):
			$link = $item->url;
			$title = $item->title;

			if(aat_reavel_in_array_all(array('dropdown','has-mega-dropdown'),$item->classes)):
				echo '<li class="dropdown has-mega-dropdown">';
				echo '<a href="' . $link . '" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'. $title . '<b class="icon-angle-down"></b></a>';
				if(is_active_sidebar('mega-dropdown-widget-area' . $item->ID)):
					echo '<div class="dropdown-menu">';
					echo '<div class="drop-wrap">';
					echo '<div class="five-col">';
						dynamic_sidebar('mega-dropdown-widget-area' . $item->ID);
					echo '</div>';
					echo '</div>';
					echo '</div>';
				endif;
				echo '</li>';
			else:
				if($children = aat_reavel_item_has_children($item->ID,$menu_items)):
					echo '<li class="dropdown">';
					echo '<a href="' . $link . '" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' . $title . '<b class="icon-angle-down"></b></a>';
					echo '<div class="dropdown-menu">';
					echo '<ul>';
					foreach ($children as $child) :
						echo '<li>';
						echo '<a href="' . $child['link'] . '">' . $child['title'] . '</a>';
						echo '</li>';
					endforeach;
					echo '</ul>';
					echo '</div>';
					echo '</li>';
				elseif(!$item->menu_item_parent):
					echo '<li>';
					echo '<a href="' . $link . '">' . $title .'</a>';
					echo '</li>';
				endif;
			endif;
		endforeach;
		echo '<li class="visible-md visible-lg nav-visible v-divider"><a href="#" class="search-opener"><span class="icon icon-search"></span></a></li>';
		echo '</ul></div></nav>';
	endif;
}

function aat_reavel_footer_social_menu($theme_location){
	if(($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])):
		$menu = get_term($locations[$theme_location],'nav_menu'); //get all the menu term from given menu location
		$menu_items = wp_get_nav_menu_items($menu->term_id,array( 'order' => 'DESC' )); //nav menu items
		echo '<ul class="social-wrapper">';

		foreach($menu_items as $item):
			$link = $item->url;
			$title = $item->title;
			$classes = implode(' ', $item->classes);

			echo '<li>';
			echo '<a href="' . $link . '">';
			echo '<span class="' . $classes . '">';
			echo '</span>';
			echo '</a>';
			echo '</li>';
		endforeach;
		echo '</ul>';
	endif;
}

function aat_reavel_item_has_children($parent_id,$menu_items){
	if(count($menu_items) == 0):
		return;
	endif;

	$children = array();
	$i = 0;
	foreach($menu_items as $item):
		if($item->menu_item_parent == $parent_id):
			$children[$i] = array('link' => $item->url, 'title' => $item->title);
		endif;
		$i++;
	endforeach;
	return (count($children) <= 0) ? false : $children;
}

function get_package_taxonomies_term_id($package_id){
		$id = $package_id;
		$taxonomy = array('country','category');
		$data = array();
		$price = CFS()->get('package_price');
		$grade = get_package_grade();
		foreach($taxonomy as $tax) :
			$terms = get_the_terms($id,$tax);
			foreach($terms as $term){
				$data[$term->taxonomy] = array(
					'id' => $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug
				);
			}
		endforeach;
		return $data;
	}

function aat_reavel_get_term_link($term_name, $taxonomy){
	$name = $term_name;
	$tax = $taxonomy;
	$term_link = get_term_link($name,$tax);

	if(!is_wp_error($term_link)){
		return $term_link;
	}else {
		return '#';
	}
}

/**
 *
 * Structure for archive-page
 * 
 */

function aat_reavel_get_archive_banner(){

	global $wp_query;

	if(is_archive()){
		$tax_term = $wp_query->get_queried_object()->slug;
		$banner_id = 'banner_' . $tax_term;

	}elseif(is_singular_page()){
		$tax_term = $wp_query->get_queried_object()->post_name;
		$banner_id = 'banner_' . $tax_term;
	}

	$html .= '<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="' . $banner_id .'">';
	$html .= '<div class="banner-text">';
	$html .= '<div class="center-text">';
	$html .= '<div class="container">';
	$html .= $title;
	$html .= $subtitle;
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</section>';
	echo $html;
}

