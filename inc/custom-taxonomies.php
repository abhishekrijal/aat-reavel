<?php

//register new taxonomies
function create_package_region_tax() {
    register_taxonomy(
        'region',
        'packages',
        array(
            'label' => __( 'Region', 'aat-reavel' ),
            'public' => true,
            'rewrite' => true,
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'create_package_region_tax' );

function create_package_countries_tax() {
    register_taxonomy(
        'country',
        'packages',
        array(
            'label' => __( 'Countries', 'aat-reavel' ),
            'public' => true,
            'rewrite' => true,
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'create_package_countries_tax' );

function create_package_bundle_tax() {
    register_taxonomy(
        'collection',
        'packages',
        array(
            'label' => __( 'Package Collection', 'aat-reavel' ),
            'public' => true,
            'rewrite' => true,
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'create_package_bundle_tax' );