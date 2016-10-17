<?php

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function aat_reavel_widgets_init() {

	//search sidebar
	register_sidebar( array(
		'name' => __( 'Search Sidebar', 'aat-reavel' ),
		'id' => 'search-sidebar-widget-1',
		'description' => __( 'The widgetized area Search Page Sidebar', 'aat-reavel' ),
		'before_widget' => '<div class="accordion-group" data-collapse>',
		'after_widget' => '</div></div></div>',
		'before_title' => '<div class="panel-heading"><h4 class="panel-title"><a role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse2">',
		'after_title' => '</a></h4></div><div id="collapse3" class="panel-collapse collapse in" role="tabpanel"><div class="panel-body">',
	) );

	//Blog Sidebar

	register_sidebar( array(
		'name' => __( 'Blog archive Sidebar', 'aat-reavel' ),
		'id' => 'blog-sidebar-widget-1',
		'description' => __( 'The widgetized area Search Page Sidebar', 'aat-reavel' ),
		'before_widget' => '<div class="accordion-group">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<div class="panel-heading"><h2 class="panel-title"><a role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse2">',
		'after_title' => '</a></h2></div><div id="collapse3" class="panel-collapse collapse in" role="tabpanel"><div class="panel-body">',
	) );

	//packages archive sidebar
	register_sidebar( array(
		'name' => __( 'Packages archive Sidebar', 'aat-reavel' ),
		'id' => 'package-sidebar-widget-1',
		'description' => __( 'The widgetized area Search Page Sidebar', 'aat-reavel' ),
		'before_widget' => '<div class="accordion-group">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<div class="panel-heading"><h4 class="panel-title"><a role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse2">',
		'after_title' => '</a></h4></div><div id="collapse3" class="panel-collapse collapse in" role="tabpanel"><div class="panel-body">',
	) );

	//footer-widget-sidebar
	register_sidebar( array(
		'name' => __( 'Footer Sidebar Widget', 'aat-reavel' ),
		'id' => 'footere-sidebar-widget-1',
		'description' => __( 'The widgetized area Search Page Sidebar', 'aat-reavel' ),
		'before_widget' => '<nav class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-nav">',
		'after_widget' => '</nav>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	//Primary menu mega menu widget
	$location = 'primary'; //menu location
	$css_class = 'has-mega-dropdown';
	$locations = get_nav_menu_locations();
	if(isset($locations[ $location ])) :
		$menu = get_term($locations[ $location ], 'nav_menu'); //gettting terms
		$items = wp_get_nav_menu_items($menu->name);
		if($items):
			foreach($items as $item):
				if(in_array($css_class, $item->classes)):
					register_sidebar(array(
						'id' => 'mega-dropdown-widget-area' . $item->ID,
						'name' => $item->title . ' - Mega DropDown',
						'before_widget' => '<div class="column">',
						'after_widget' => '</div>',
						'before_title' => '<strong class="title sub-link-opener">',
						'after_title' => '</strong>'
					));
				endif;
			endforeach;
		endif;
	endif;
}
add_action( 'widgets_init', 'aat_reavel_widgets_init' );